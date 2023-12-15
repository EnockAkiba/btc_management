<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use PDO;

class RegisterComponent extends Component
{

    use WithPagination;

    protected $users=[];
    public $search = '';


    public function mount(){
        return $this->users=User::where('roleUser',0) 
        ->whereNotIn('id', function($query) {
            $query->select('user_id')
            ->from('registers');
        })
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
        
        return view('livewire.register-component2', [
            'users' => $this->users
        ]);
    }


    public function searchUser()
    {
        return User::query()
        ->where('name', 'like', '%' . $this->search . '%')
        ->orWhere('lastName', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%'.$this->search .'%')
        ->where('id','<>',1)
        ->orderBy('name')->paginate(8);

    }

    public function register(){
        // \dd("dwe");
        echo "colled";
        return \view('livewire.register');
    }

    public function search()
    {
        $this->resetPage();
    }
}
