<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationData;

class UserController extends Controller
{    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(8);

        return view('users.index', compact('users'));
    }

    
    public function edit(User $user)
    {
        return view('users.edit', \compact('user'));
    }


    public function show(User $user)
    {
        return \view('users.edit', \compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'adress'=>'required',
            'lastName'=>'required'
        ]);

        $user->update([
            'name'=>$request->name,
            'sex'=>$request->sex,
            'adress'=>$request->adress,
            'phone'=>$request->phone,
            'lastName'=>$request->lastName
        ]);
        
        return \redirect()->back()->with('success','Profile modifié');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return \redirect()->back()->with('success','Compte supprimé !');
    }

    public function setProfilePicture(Request $request){
    
        $user=Auth::user();
        $request->validate([
            'picture'=>'required'
        ]);
        
        // ici je vais envoyer le path et l'image a compresser
        $picture=\imageConvert('profilUser',$request->picture);

        $user->update([
            'picture' =>$picture
        ]);
        
        return \redirect()->back()->with('success','Photo modifiée');
    }
}
