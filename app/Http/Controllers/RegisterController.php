<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers=Register::orderBy('id','DESC')->paginate(8);
        $promotions=Promotion::whereDate('dateEnd','>=', now())->get();
        return view('register.index',\compact('registers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        
        $promotions=Promotion::whereDate('dateEnd','>=', now())->get();
        return \view('register.create', \compact('user','promotions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'promotion_id'=>'required',
            'vacation'=>'required',
        ]);

        $modele=Register::where('user_id',$request->user_id)
        ->where('promotion_id',$request->promotion_id)
        ->first();
        if($modele) return \redirect()->route('register')->with('warning','Apprenant déjà inscit');

        $index=Register::select('index')->where('user_id',$request->user_id)->first();

        if(!$index and !$request->index) return \redirect()->back()->with('warning','l\'index est vide ');
        
        $index=!empty($index) ? $index->index : $request->index;


        if($request->respoName)  $respoName=$request->respoName;
        else $respoName=NULL;

        if($request->respoNumber)  $respoNumber=$request->respoNumber;
        else $respoNumber=NULL;

        $data['index']=$index;
        $data['respoName']=$respoName;
        $data['respoNumber']=$respoNumber;
        $data['slug']=\slug('Re');
        
        Register::create($data);

        return \redirect()->route('register_user')->with('success','Ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        // $user=User::where('users.id',$register->user_id)->first();
        // \dd($user->register);
        // if(\collect($user->registers)->isNotEmpty()){
        //     $registers=$user->registers;
        // }
        // else{
        //     $registers=[];
        // }
        $promotions=Promotion::whereDate('dateEnd','>=', now())->get();

        return \view('register.show', \compact('register','promotions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        $users=User::paginate(8);
        $promotions=Promotion::get();
        return view('register.edit', \compact('register','users','promotions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'promotion_id'=>'required',
            'index'=>'required',
            'vacation'=>'required',
        ]);

        if($request->respoName)  $respoName=$request->respoName;
        else $respoName=$request->respoNameOld;

        if($request->respoNumber)  $respoNumber=$request->respoNumber;
        else $respoNumber=$request->respoNumberOld;
        

        $data['respoName']=$respoName;
        $data['respoNumber']=$respoNumber;
        $register->update($data);
        return \redirect()->route('register')->with('success','Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        $register->delete();
        return \redirect()->back()->with('success','Supprimé');
    }
}
