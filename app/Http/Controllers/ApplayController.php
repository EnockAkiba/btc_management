<?php

namespace App\Http\Controllers;

use App\Models\Applay;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        if(!Auth::user()->registers->first()) return \redirect()->back()->with('warning','Vous n\'êtes apprenant');

        $applays=Applay::orderBy('id','DESC')
        ->where('applays.register_id', Auth::user()->registers->first()->id)
        ->paginate(8);

        $quizCurrents=Quiz::where('dateEnd','>',\now())
        ->where('promotion_id',Auth::user()->registers()->orderBy('id','DESC')->first()->promotion_id)
        ->paginate(8);

        $quizLoses=Quiz::leftJoin('applays', function ($join) {
            $join->on('quizzes.id', '=', 'applays.quiz_id')
            ->where('applays.register_id', '=',  Auth::user()->registers()->first()->id);
        })
        ->where('quizzes.dateEnd', '<', now())
        ->where('quizzes.promotion_id', '=', Auth::user()->registers()->orderBy('id','DESC')->first()->promotion_id)
        ->whereNull('applays.id')
        ->select('quizzes.*')
        ->paginate(8);
        return \view('applay.index', \compact('applays','quizCurrents','quizLoses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Quiz $quiz)
    {
        return \view('applay.create', \compact('quiz'));
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
            'quiz_id'=>'required'
        ]);

        if(! $request->file() AND !$request->content){
            return \redirect()->back()->with('error','Reponse vide !');
        }

        if($request->file) $file=\docStatement('quiz/applay',$request->file);
        else $file=NULL;

        if($request->content) $content=$request->file;
        else $content=NULL;
    
        
        $data['register_id']=Auth::user()->registers()->orderBy('registers.id','DESC')->first()->id;
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
