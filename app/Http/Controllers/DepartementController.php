<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Extension;
use App\Models\Promotion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements=Departement::paginate(8);
        return view('departement.index',\compact('departements'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('departement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make(
            $request->all(),[
            'title'=>'required',
            'description'=>'required'
        ]);

        if($validator->fails()){
            return \redirect()->back()->with('error','complètez tous les champs');
        }

        if($request->picture)  $picture=\imageConvert("departement",$request->picture);
        else $picture=NULL;

        $data=$request->only(['title','description']);
        $data['picture']=$picture;
        $data['slug']=\slug('De');

        Departement::create($data);

        return \redirect()->back()->with('success','Ajouté');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        $promotions=Promotion::whereDate('dateEnd','>',NOW())->where('departement_id',$departement->id)->get();
        $extensions=Extension::get();
        return \view('departement.show',\compact('departement','extensions','promotions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        return view('departement.index', \compact('departement'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        $data=$request->validate(
            [
                'title'=>'required',
                'description'=>'required'
            ]
        );

        if($request->picture)  $picture=\imageConvert("departement",$request->picture);
        else $picture=$request->pictureOld;

        $data['picture']=$picture;

        $departement->update($data);

        return \redirect()->back()->with('success','Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return \redirect()->back()->with('sucess','Supprimé');
    }
}
