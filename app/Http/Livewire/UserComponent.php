<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{

    use WithPagination;

    protected $users=[];
    public $search = '';


    public function mount(){
        return $this->users=User::orderBy('name')
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
        ->where('id','<>',1)
        ->orderBy('name')->paginate(8);

    }

    public function setAdmin(User $user){

        $role=($user->roleUser==='2')	? 0:2;
        $user->update(['roleUser'=>$role]);

    }

    public function setApparitor(User $user){

        $role=($user->roleUser==='1')	? 0:1;
        $user->update(['roleUser'=>$role]);

    }

    public function setBlocked(User $user){

        $role=($user->statut==='2')	? 0:2;
        $user->update(['statut'=>$role]);
    }

    public function setTeaecher(User $user){
        
        $data['slug']=\slug('TEA');

        Teacher::updateOrCreate(
            ['user_id'=>$user->id],
            $data
        );
    }

    public function destroy(User $user){

        $user->delete();

    }

    public function search()
    {
        $this->resetPage();
    }
}