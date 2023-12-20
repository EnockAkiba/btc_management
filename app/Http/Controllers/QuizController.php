<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Quiz;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $promotion_id=Auth::user()->
        if(!Auth::user()->teachers->first()){
            return \redirect()->back()->with('warning','vous n\'êtes pas formateur');
        }

        // $promotionId=Auth::user()->register()->orderByDesc('id')->first()->promotion_id;
        // $myQuezzes=Quiz::where('promotion_id', $promotionId)
        // ->where('dateEnd','>', \now())
        // ->get();

        // tp remis dans la dernieres promotion
        // $myQuezzes=Auth::user()->register()->orderByDesc('id')->first()->applay;

        $promotions=Promotion::whereDate('dateEnd','>=', now())->get();

        $quizzes=Quiz::where('quizzes.teacher_id',Auth::user()->teachers()->first()->id)
        ->paginate(8);
        return \view('quiz.index',\compact('quizzes','promotions'));
    }

    public function myQuizzes(){
        if(!Auth::user()->registers->first()) return \redirect()->back()->with('warning','Vous n\'êtes apprenant');

        $myQuezzes=Quiz::where('promotion_id',Auth::user()->registers->promotion_id)
        ->where('dateEnd','>',\now())
        ->paginate(8);
        // $id=Auth::user()->register()->orderBy('regist');
        return \view('Quizzes.myQuizzes', \compact('myQuezzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promotions=Promotion::whereDate('dateEnd','>=', now())->get();
        return \view('quiz.create', \compact('promotions'));
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
            'promotion_id'=>'required',
            'dateBigin'=>'required|date',
            'dateEnd'=>'required|date|after:dateBigin'
        ]);

        if(!$request->content and ! $request->file) {
            return back()->with('error','Le tp est vide');
        } 

        if($request->content) $content=$request->content ;
        else $content=null;

        if($request->file) $file=docStatement('quiz',$request->file );
        else $file=null;

        $data['teacher_id']=Auth::user()->registers()->first()->id;
        $data['slug']=\slug('Qz');
        $data['content']=$content;
        $data['file']=$file;

        Quiz::create(
            $data
        );

        return \redirect()->route('quiz')->with('success','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return \view('quiz.show', \compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        
        $promotions=Promotion::whereDate('dateEnd','>=', now())->get();

        return \view('quiz.edit', \compact('quiz','promotions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $data=$request->validate([
            'promotion_id'=>'required',
            'dateBigin'=>'required|date',
            'dateEnd'=>'required|date|after:dateBigin'
        ]);

        if(!$request->content and ! $request->file) {
            return back()->with('error','le tp est vide');
        } 

        if($request->content) $content=$request->content ;
        else $content=$request->contentOld;

        if($request->file) $file=$request->file ;
        else $file=$request->fileOld;
        
        $data['content']=$content;
        $data['file']=$file;

        $quiz->update($data);

        return \redirect()->back()->with('success','Modifié');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return \redirect()->back()->with('success','Supprimé');
    }


}
