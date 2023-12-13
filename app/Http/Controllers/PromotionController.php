<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Extension;
use App\Models\Promotion;
use App\Models\User;
use Dflydev\DotAccessData\Data;
// use \Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $extensions=Extension::get();
        $departements=Departement::get();
        $promotions=Promotion::whereDate('dateEnd','>=', now())->paginate(8);
        
        // $promotions=Promotion::whereDate('dateEnd','>=', now())->get();
        
        return view('promotion.index', \compact('extensions','promotions','departements'));
        
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

        $validator=Validator::make($request->all()
        ,[
            'departement_id'=>'required',
            'extension_id'=>'required',
            'designation'=>'required',
            'price'=>'required',
            'dateBegin'=>'required|date',
            'dateEnd'=>'required|date|after:dateBegin'
        ]
        );

        if($validator->fails()){
            
            return redirect()->back()->with('error','Complètez les champs obligatoires');
        }

        $data=$request->only(['departement_id','extension_id','designation','price','dateBegin','dateEnd']);
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

        $departements=Departement::get();
        $extensions=Extension::get();
        $students=User::select('name','lastName','email','sex','phone','picture')
        ->join('registers','users.id','user_id')
        ->where('promotion_id',$promotion->id)
        ->paginate(8);
        return \view('promotion.show', \compact('promotion','students','extensions','departements'));
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
