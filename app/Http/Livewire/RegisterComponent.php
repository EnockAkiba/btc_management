<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterComponent extends Component
{
    public $searchTerm;
    public $users;

    public function mount(){
        $users=User::where('roleUser',0) 
        ->whereNotIn('id', function($query) {
            $query->select('user_id')
            ->from('registers');
        })
        ->paginate(8);
        return $users;
    }

    public function render()
    {
        return view('livewire.register-component', [
            'users' => $this->mount()
        ]);
    }

    public function searchUser()
    {
        $this->users = User::where('name', 'like', '%' . $this->searchTerm . '%')
        ->orWhere('lastName', 'like', '%' . $this->searchTerm . '%')->orderBy('name')->get();
    }

    public function search()
    {
        $this->resetPage();
    }
}
