<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SendSmsComponent extends Component
{
    use WithPagination;

    public $conversations=[];

    public $content = NULL;
    public $picture = NULL;
    public $destinator;

    public function render()
    {
        if($this->destinator){
            $this->conversations=$this->conversation();
        }
        else{
            $this->conversations=[];
        }

        return view('livewire.send-sms-component',[
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
            
            return $this->getConversation();
        }
    }

}
