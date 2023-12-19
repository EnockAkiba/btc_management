<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extensions=Extension::paginate(8);
        return \view('extension.index', \compact('extensions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $request->all(),

            [
            'designation'=>'required'
        ]);
        
        if($validator->fails()){
            return \redirect()->back()->with('error','complètez tous les champs');
        }

        // $data['slug']=\slug('Ex');
        Extension::create($validator->validated());

        return \redirect()->back()->with('success','Ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function show(Extension $extension)
    {
        return \view('extension.show', \compact('extension'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function edit(Extension $extension)
    {
        return \view('extension.edit', \compact('extension'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extension $extension)
    {
        $validator=Validator::make(
            $request->all(),

            [
            'designation'=>'required'
        ]);
        
        $extension->update($validator->validated());

        return \redirect()->back()->with('success','Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extension $extension)
    {
        $extension->delete();
        return \redirect('extension')->with('success','Supprimé');
    }
}
