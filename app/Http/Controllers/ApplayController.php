<?php

namespace App\Http\Controllers;

use App\Models\Applay;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ApplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applays=Applay::orderBy('id','DESC')->paginate(8);
        return \view('applay.index', \compact('applays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return \view('applay.create', \compact());
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
            'quiz_id'=>'required',
            'register_id'=>'required',
        ]);

        if(! $request->file() AND !$request->content){
            return \redirect()->back()->with('error','Veillez repondre par un fichier pdf/commentaire');
        }

        if($request->file) $file=\docStatement('quiz/applay',$request->file);
        else $file=NULL;

        if($request->content) $content=$request->file;
        else $content=NULL;
        
        $data['content']=$content;
        $data['file']=$file;
        $data['slug']=\slug('Ap');

        Applay::create($data);
        return \redirect()->back()->with('success','Travail remis avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applay  $applay
     * @return \Illuminate\Http\Response
     */
    public function show(Applay $applay)
    {
        return \view('applay.show', \compact('applay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applay  $applay
     * @return \Illuminate\Http\Response
     */
    public function edit(Applay $applay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applay  $applay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applay $applay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applay  $applay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applay $applay)
    {
        $applay->delete();
        return \redirect()->back()->with('success','supprimé avec succès');
    }
}
