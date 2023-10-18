<?php

namespace App\Http\Livewire;

use App\Models\Message as ModelsMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Message extends Component
{
    public $distinator;
    public $conversation;


    public function mount(){
        // je dois venir changer 
        $this->distinator=User::get();

    }
    public function render()
    {
        return view('livewire.message');
    }

    public function getConversation($d){
        $conversation=Message::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                  ->orWhere('destinator');
        })->where(function ($query) {
            $query->where('destinator',Auth::user()->id)
                  ->orWhere('d', '=',);
        });
    }
}
