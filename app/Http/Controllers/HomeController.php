<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Promotion;
use App\Models\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return \redirect(\route("news"));
    }

    public function welcome(){

        $promotions=Promotion::whereDate('dateEnd','>=', now())->get();
        $news=News::where('type','1')->orderBy('id','DESC')->take(10)->get();
        return \view('welcome.index', \compact('news','promotions'));
    }

    public function blog(){
        $blogs=News::where('type','1')->orderBy('id','DESC')->take(30)->paginate(10);
        return \view('welcome.blog', \compact('blogs'));
    }

    public function show(News $news){

        return \view('welcome.show', \compact('news'));
    }

    public function teachers(){
        $teachers=Teacher::paginate(8);
        return \view('welcome.teachers',\compact('teachers'));
    }
}
