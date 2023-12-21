<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use function PHPUnit\Framework\isEmpty;

class MessageLivewire extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $search = '';
    protected $conversations = [];
    public $page1 = true;
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
        if ($this->search) {
            $destinators = $this->searchUser();
        } else {
            $destinators = $this->mount();
        }

        if ($this->destinator) {
            $this->conversations = $this->getConversation();
        }

        $rendd = $this->page1 ? 'message-livewire' : 'send-sms-component';
        return view('livewire.' . $rendd, [
            'destinators' => $destinators,
            'conversations' => $this->conversations,
            'destinator' => $this->destinator
            //'contenu' => $this->page1? view('livewire.message-livewire'):view('livewire.send-sms-component')
        ]);
    }

    public function test(User $destinator)
    {
        $this->page1 = !$this->page1;
        $this->destinator = $destinator;
    }

    public function getConversation()
    {

        $message= Message::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->orWhere('destinator', Auth::user()->id);
        })->where(function ($query) {
            $query->where('user_id', $this->destinator->id)
                ->orWhere('destinator', $this->destinator->id);
        })->orderBy('id', 'DESC')
            ->paginate(8);
            return $message->reverse();
    }

    public function searchUser()
    {
        return User::select('id', 'picture','slug', DB::raw('concat(name," ", lastName) as names'))
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '$')
            ->orWhere('lastName', 'like', '%' . $this->search . '%')
            ->where('id', '<>', 1)
            ->where('id','!=',Auth::user()->id)
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

        $listDestinator = User::select('id', 'picture','slug', DB::raw('concat(name," ", lastName) as names'))
            ->whereIn('id',  $merge)
            ->paginate(30);

        // si jamais la liste est vide on l'affiche les users recement connected
        if (isEmpty($listDestinator)) {

            $listDestinator = User::select('id', 'picture','slug', DB::raw('concat(name," ", lastName) as names'))
                ->orderBy('lastTimeLog', 'DESC')
                ->paginate(30);
        }
        return $listDestinator;
    }

    public function destroy(Message $message)
    {
        $message->delete();
        \session('success', 'Effacé');
    }

    public function store()
    {
        if (!isset($this->picture) and !isset($this->content)) {
            \session()->flash('error', 'Le message est vide !');
        } else {

            if ($this->picture) $this->picture = \imageConvert("chat/", $this->picture);
           
            Message::create([
                'destinator' => $this->destinator->id,
                'user_id' => Auth::user()->id,
                'slug' => \slug('MS'),
                'content' => $this->content,
                'picture' => $this->picture
            ]);
            \session()->flash('success', 'Envoyé');
            $this->content=null;
            return $this->getConversation();
        }
    }
}
