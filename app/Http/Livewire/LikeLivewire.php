<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeLivewire extends Component
{
    
    public function mount(){
        $news=News::orderByDesc('id')->where('type','0')->paginate(8);
        return $news;
    }

    public function render()
    {
      
        return view('livewire.like-livewire' , [
            "news"=>  $this->mount()
        ]);
    }

    public function like($news_id){
        $news=Like::Where('news_id',$news_id)->Where('user_id',Auth::user()->id)->first();

        if($news){
            $news->delete();
        }
        else{
            Like::create([
                'slug'=>\slug("Like"),
                'news_id'=>$news_id, 
                'user_id'=>Auth::user()->id
            ]);
        }
        // $this->count=\count($news->like);
    }
    public function setType($news_id){
        $news=News::Where('id' , $news_id)->first();
        
        $type=($news->type==0)? 1 : 0;
        $news->update(
            ['type'=>$type]
        );
    }

}
