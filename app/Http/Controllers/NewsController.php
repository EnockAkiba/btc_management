<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::paginate(8);
        return view('new.index', compact('news'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('news.create');
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
            'title'=>'required',
            'description'=> 'required',
        ]);

        if($request->picture==NULL and $request->video==NULL){
            \redirect()->back()->with('info','Veuillez inserer un fichier photo ou vidéo');
        }
        elseif($request->picture){
            $picture=\imageUsage("news",$request->picture);
            $video=NULL;
        }
        else{
            $picture=NULL;
            $video=videoStatement('news',$request->video);
            
        }
        
        $data['user_id']=Auth::user()->id;
        $data['picture']=$picture;
        $data['video']=$video;
        $data['slug']=\slug("NEW");

        News::create(
            $data
        );

        return \redirect()->back()->with('success','Publié avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return \view('news.show', \compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('promotion.edit', \compact('news'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        
        if($request->picture)  $picture=\imageUsage("news",$request->picture);
        else $picture=$request->pictureOld;

        if($request->video) $video=videoStatement('news',$request->video);
        else $video=$request->videoOld;
        

        $data['picture']=$picture;
        $data['video']=$video;

        $news->update([
            $data
        ]);

        return \redirect()->back()->with('success','Modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return \redirect()->route('news.create')->with('success','Suppression reussie');
    }

    public function setType(News $news){
        $type=($news->type==0)? 1 : 0;
        $news->update(
            ['type'=>$type]
        );
    }
}
