<?php

namespace App\Http\Livewire;

use App\Models\Message as ModelsMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Message extends Component
{

    use WithPagination;


    public $destinator;
    public $listDestinator;
    public $userName;
    public $conversation;

    // je vais envoyer ces donnees dans un tableau
    public $destinatorPicture;
    public $destinatorName;



    public function mount()
    {
        // je dois venir changer 

        $this->getDestinators();
    }

    public function render()
    {
        return view('livewire.message');
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

        return $this->conversation;
    }

    public function searchUser()
    {
        $this->listDestinator = User::where('name', 'like', '%' . $this->userName . '%')->paginate(50);
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

        $this->listDestinator = User::select('id', 'name', 'lastName', 'picture')
            ->whereIn('id',  $merge)
            ->get();

        if (!$this->listDestinator) {
            $this->listDestinator = User::select('id', 'name', 'lastName', 'picture')
                ->orderBy('lastTimeLog', 'DESC')
                ->paginate(50);
        }
    }
}
