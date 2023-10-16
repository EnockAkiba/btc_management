<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeLivewire extends Component
{

    public $ids = null;
    public $count;


    public function mount(){

    }

    public function render()
    {
        return view('livewire.like-livewire' );
    }

    public function like($news_id){
        $news=Like::Where('news_id',$news_id)->Where('user_id',Auth::user()->id)->first();

        if($news){
            $news->delete();
        }
        else{
            News::create(['news_id'=>$news_id, 'user_id'=>Auth::user()->id]);
        }
        $this->count=\count($news->like);
    }

}
