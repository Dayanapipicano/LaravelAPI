<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::all();

    $users = User::pluck('name', 'id'); 


    return view('comment.index', compact('comment','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
      
        return view('comment.create',['users'=> $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->comment_id=$request->comment_id;
        $comment->comment_type=$request->comment_type;
        $comment->mensaje=$request->mensaje;
        $comment->idUser=$request->idUser;

        $comment->save();


        return Redirect()->route('comment.index',$comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('comment.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment){

        $users = User::all();

        return view('comment.edit', compact('comment', 'users'));

       
     }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->comment_id=$request->comment_id;
        $comment->comment_type=$request->comment_type;
        $comment->mensaje=$request->mensaje;
        $comment->idUser=$request->idUser;

        $comment->save();


        return Redirect()->route('comment.index',$comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }
}
