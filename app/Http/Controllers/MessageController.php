<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('message.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('message.create', \compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($request->picture) and !isset($request->content)) {
            return \redirect()->back()->with('error', 'Vous ne pouvez pas envoyer un message vide');
        } elseif ($request->picture and $request->content) {
            $content = $request->content;
            $picture = \imageConvert("chat/", $request->picture);
        } elseif ($request->picture) {
            $content = NULL;
            $picture = \imageConvert("chat/", $request->picture);
        } else {
            $content = $request->content;
            $picture = NULL;
        }

        $data = $request->validate([
            'destinator' => 'required',
        ]);

        $data['User_id'] = Auth::user()->id;
        $data['slug'] = \slug('MS');
        $data['content'] = $content;
        $data['picture'] = $picture;

        Message::create(
            $data
        );

        return back()->with('success', 'message envoyé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('message.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {

        if ($request->content) $content = $request->content;
        else $content = $request->contentOld;

        if ($request->picture) $picture = \imageConvert("chat/", $request->picture);
        else $picture = $request->pictureOld;

        $data['content'] = $content;
        $data['picture'] = $picture;

        $message->update(
            $data
        );
        return \redirect()->back()->with('success', 'Modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return \redirect()->back()->with('success', 'message supprimé avec succès');
    }

    public function setIsRead(Message $message)
    {
        $message->update([
            'isRead' => '1'
        ]);
    }
}
