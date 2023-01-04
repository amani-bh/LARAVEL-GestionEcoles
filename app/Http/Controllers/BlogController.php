<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
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
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search !=""){
         $listBlogs= Blog::where('user_id', Auth::user()->id)->where('titre', 'LIKE', "%$search%")->get();
        }else{
           $listBlogs= Blog::all()->where('user_id',Auth::user()->id);
        }
  
        $connectedUserId=Auth::user()->id;
        return view("FrontOfficeLayout/Pages/Blog/blogs",compact("listBlogs",'connectedUserId','search'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogList()
    {
        $listBlogs= Blog::all();
        return view("BackOfficeLayout/Pages/Blog/blogs",compact("listBlogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FrontOfficeLayout.Pages.Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $isValidated= $request->validated();
        $blog = new Blog();
        $blog->titre = $request->titre;
        $blog->description = $request->description;
        $blog->user_id =Auth::user()->id;
        $blog->save();
        return redirect()->route('blog.index')
            ->with('success','blog ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $owner=$blog->user;
        $connectedUserId=$this->connectedUserId;
        return view('FrontOfficeLayout.Pages.Blog.show',compact('blog','owner',"connectedUserId"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin(int $id)
    {
        $blog=Blog::find($id);
        $owner=$blog->user;
        return view('BackOfficeLayout.Pages.Blog.show',compact('blog','owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('FrontOfficeLayout.Pages.Blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $blog=['titre'=>$request->titre,
            'description'=>$request->description];
        Blog::where('id',$id)->update($blog);
        return redirect()->route('blog.index')
            ->with('success','Blog modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog= Blog::find($id);
        $blog->delete();
        return redirect()->route('blog.index')
            ->with('success','blog effacé!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyBlog($id)
    {
        $blog= Blog::find($id);
        $blog->delete();
        return redirect()->route('blogadmin')
            ->with('success','blog effacé!');
    }
}
