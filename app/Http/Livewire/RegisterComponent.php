<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class RegisterComponent extends Component
{

    use WithPagination;

    protected $registers=[];
    public $search = '';


    public function mount(){
        return $this->registers=User::join('registers','registers.user_id','users.id')
        ->orderBy('name')
        ->paginate(8);

    }

    public function render()
    {
        if($this->search){
            $this->registers = $this->searchUser();
        }
        else{
            $this->registers=$this->mount();
        }
        
        return view('livewire.register-component', [
            'registers' => $this->registers
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
