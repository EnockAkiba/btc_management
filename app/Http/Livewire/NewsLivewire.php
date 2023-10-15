<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsLivewire extends Component
{
    protected $news;
    public function mount(){
        $this->news=News::orderBy('created_at','DESC')->paginate(30);
    }
    
    public function render()
    {
        return view('livewire.news-livewire',['news'=>$this->news]);
    }

    
}
