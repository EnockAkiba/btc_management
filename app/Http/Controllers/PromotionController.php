<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Extension;
use App\Models\Promotion;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements=Departement::get();
        $extensions=Extension::get();

        return view('promotion.index', \compact('departements','extensions'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements=Departement::get();
        $extensions=Extension::get();
        return \view('promotion.create',\compact('departements','extensions'));
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
            'departement_id'=>'required',
            'extension_id'=>'required',
            'designation'=>'required',
            'price'=>'required',
            'dateBegin'=>'required',
            'dateEnd'=>'required'
        ]);
        $data['slug']=\slug('pr');

        Promotion::create($data);

        return \redirect()->back()->with('success','Ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        return \view('promotion.show', \compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $departements=Departement::get();
        $extensions=Extension::get();
        return view('promotion.edit', \compact('promotion','departements','extensions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        
        $data=$request->validate([
            'departement_id'=>'required',
            'extension_id'=>'required',
            'designation'=>'required',
            'price'=>'required',
            'dateBegin'=>'required|date',
            'dateEnd'=>'required|date|after:dateBegin'
        ]);

        $promotion->update($data);

        return \redirect()->back()->with('success','Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return \redirect()->back()->with('success','Supprimé');
    }

    public function messages(){
        return [
            'dateEnd.after' => "La date doit être supérieure à la date du début.",
        ];
    }
}
