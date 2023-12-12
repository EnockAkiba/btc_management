<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MessageLivewire extends Component
{

    use WithPagination;

    public $listDestinator;

    public $conversation;

    // Proprietes pour Send message
    public $content = NULL;
    public $picture = NULL;

    // Les info d'un destinateur
    public $destinator;
    public $destinatorPicture;
    public $destinatorNames;



    public function mount()
    {
        // je dois venir changer 

        return $this->getDestinators();
    }

    public function render()
    {
        return view('livewire.message-livewire');
    }

    public function getConversation()
    {
        $this->conversation = Message::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->orWhere('destinator', Auth::user()->id);
        })->where(function ($query) {
            $query->where('user_id', $this->destinator)
                ->orWhere('destinator', $this->destinator);
        })->paginate(8);
    }

    public function searchUser()
    {
        $this->this->listDestinator = User::where('name', 'like', '%' . $this->userName . '%')
            ->orWhere('lastName', 'like', '%' . $this->userName . '%')->orderBy('name')->paginate(50);
    }

    // cette fonction doit etre call quand on click sur submit du form de recherche, pour remetre la page a 0
    public function search()
    {
        $this->resetPage();
    }

    public function getDestinators()
    {
        $messagesSend = Message::select('destinator')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->groupBy('destinator')
            ->get();

        $messagesReceived =  Message::select('user_id')
            ->where('destinator', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->groupBy('user_id')
            ->get();

        $merge = array_merge($messagesSend->toArray(), $messagesReceived->toArray());

        $this->listDestinator = User::select('id', 'picture', DB::raw('concat(name," ", lastName) as names'))
            ->whereIn('id',  $merge)
            ->get();

        // si jamais la liste est vide on l'affiche les users recement connected
        if (!$this->listDestinator->toArray()) {

            $this->listDestinator = User::select('id', 'picture', DB::raw('concat(name," ", lastName) as names'))
                ->orderBy('lastTimeLog', 'DESC')
                ->paginate(50);
        }
        
    }

    public function store()
    {

        if (!isset($this->picture) and !isset($this->content)) {
            \session()->flash('error', 'Le message est vide !');
        } else {

            if ($this->picture) $this->picture = \imageConvert("chat/", $this->picture);

            Message::create([
                'destinator' => $this->destinator,
                'User_id' => Auth::user()->id,
                'slug' => \slug('MS'),
                'content' => $this->content,
                'picture' => $this->picture
            ]);
            \session()->flash('success', 'Envoyé');
        }
    }
}
