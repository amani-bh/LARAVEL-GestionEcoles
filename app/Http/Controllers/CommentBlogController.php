<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentBlogRequest;
use App\Models\Blog;
use App\Models\CommentBlog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CommentBlogController extends Controller
{
    private $connectedUserId;
    public function __construct()
    {
        $this->connectedUserId=1;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("FrontOfficeLayout.Pages.Blog.CommentBlog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $idBlog
     * @return \Illuminate\Http\Response
     */
    public function addComment(CommentBlogRequest $request, int $idBlog)
    {
        $isValidated= $request->contenu;
        $commentBlog= new CommentBlog();
        $commentBlog->contenu = $request->contenu;
        $commentBlog->user_id =Auth::user()->id;
        $commentBlog->blog_id = $idBlog;
        $commentBlog->save();
        return redirect()->route('blog.show',$idBlog)
            ->with('success','Commentaire ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommentBlog  $commentBlog
     * @return \Illuminate\Http\Response
     */
    public function show(CommentBlog $commentBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $comment= CommentBlog::find($id);
        return view('FrontOfficeLayout.Pages.Blog.CommentBlog.edit',compact('comment'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idComment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentBlogRequest $request,$idComment)
    {
        $comment=['contenu'=>$request->contenu];
        CommentBlog::where('id',$idComment)->update($comment);
        $updatedComment= CommentBlog::find($idComment);
        return redirect()->route('blog.show',$updatedComment->blog_id)
            ->with('success','Commentaire modifier avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($idComment)
    {
        $comment= CommentBlog::find($idComment);
        $comment->delete();
        return redirect()->route('blog.show',$comment->blog_id)
            ->with('success','Commentaire supprimé avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idComment
     * @return \Illuminate\Http\Response
     */
    public function destroyAdmin($idComment)
    {
        $comment= CommentBlog::find($idComment);
        $comment->delete();
        return redirect()->route('showblogadmin',$comment->blog_id)
            ->with('success','Commentaire supprimé avec succès!');
    }
}
