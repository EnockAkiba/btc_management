<?php

namespace App\Http\Livewire;

use App\Models\Register;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class RegisterComponent extends Component
{

    use WithPagination;

    protected $registers=[];
    public $search = '';


    public function mount(){
        return $this->registers=Register::
        orderBy('registers.id','DESC')
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
        return Register::query()
        ->join('users','registers.user_id','users.id')
        ->where('name', 'like', '%' . $this->search . '%')
        ->orWhere('lastName', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%'.$this->search .'%')
        ->orderBy('registers.id','DESC')
        ->orderBy('name')->paginate(8);

    }

    public function search()
    {
        $this->resetPage();
    }
}
