<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

use function PHPUnit\Framework\isEmpty;

class MessageLivewire extends Component
{

    use WithPagination;

    public $search = '';
    public $conversations=[];

    // Proprietes pour Send message
    public $content = NULL;
    public $picture = NULL;
    public $destinator;
    


    public function mount()
    {
        return $this->getDestinators();
    }

    public function render()
    {
        if($this->search){
            $destinators = $this->searchUser();
        }else{
            $destinators= $this->mount();
        }

        if($this->destinator){
            $this->conversations=$this->getConversation();
        }

        return view('livewire.message-livewire', [
            'destinators'=>$destinators,
            'conversations'=>$this->conversations
        ]);
    }

    public function getConversation()
    {
        return Message::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->orWhere('destinator', Auth::user()->id);
        })->where(function ($query) {
            $query->where('user_id', $this->destinator)
                ->orWhere('destinator', $this->destinator);
        })->orderBy('id','DESC')
        ->paginate(8);
    }

    public function searchUser()
    {
        return User::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email','like','%'. $this->search . '$')
        ->orWhere('lastName', 'like', '%' . $this->search . '%')
        ->where('id','<>',1)
        ->orderBy('name')->paginate(30);
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

        $listDestinator = User::select('id', 'picture', DB::raw('concat(name," ", lastName) as names'))
            ->whereIn('id',  $merge)
            ->paginate(30);

        // si jamais la liste est vide on l'affiche les users recement connected
        if (isEmpty($listDestinator)) {

            $listDestinator = User::select('id', 'picture', DB::raw('concat(name," ", lastName) as names'))
                ->orderBy('lastTimeLog', 'DESC')
                ->paginate(30);
        }
        return $listDestinator;
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
    public function destroy(Message $message){
        $message->delete();
        \session('success','Effacé');
    }
}
