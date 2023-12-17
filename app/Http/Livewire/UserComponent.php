<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{

    use WithPagination;

    protected $users=[];
    public $search = '';


    public function mount(){
        return $this->users=User::join('registers','registers.user_id','users.id')
        ->orderBy('name')
        ->paginate(8);
    }

    public function render()
    {
        if($this->search){
            $this->users = $this->searchUser();
        }
        else{
            $this->users=$this->mount();
        }
        
        return view('livewire.user-component', [
            'users' => $this->users
        ]);
    }


    public function searchUser()
    {
        return User::query()
        ->where('name', 'like', '%' . $this->search . '%')
        ->orWhere('lastName', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%'.$this->search .'%')
        ->join('registers','registers.user_id','users.id')
        ->orderBy('name')->paginate(8);

    }


    public function search()
    {
        $this->resetPage();
    }
}