<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Quiz;
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
        return \view('quiz.index',\compact(''));
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
            return back()->with('error','Veuillez inserer le contenu ou un doc');
        } 

        if($request->content) $content=$request->content ;
        else $content=null;

        if($request->file) $file=$request->file ;
        else $file=null;

        $data['slug']=\slug('Qz');
        $data['teacher_id']= Auth::user()->teacher->id;
        $data['content']=$content;
        $data['file']=$file;

        Quiz::create(
            $data
        );

        return \redirect()->back()->with('success','success');
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
            return back()->with('error','Veuillez inserer le contenu ou un doc');
        } 

        if($request->content) $content=$request->content ;
        else $content=$request->contentOld;

        if($request->file) $file=$request->file ;
        else $file=$request->fileOld;
        
        $data['teacher_id']= Auth::user()->teacher->id;
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

    public function myQuizzes(){
        // $id=Auth::user()->register()->orderBy('regist');
    }
}
