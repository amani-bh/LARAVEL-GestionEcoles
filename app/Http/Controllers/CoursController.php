<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Section;
use App\Http\Requests\CoursRequest;
use App\Models\Commentaire;


class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $listCours= Cours::all();
        $listCours= Cours::where('user_id',Auth::user()->id)->get();
        
       return view('FrontOfficeLayout.Pages.Courses.List_cours_teacher', compact('listCours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FrontOfficeLayout.Pages.Courses.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cours = Cours::find($id);
        $commentaires= Commentaire::where('cours_id',$id)->get();
        return view ('FrontOfficeLayout.Pages.Courses.show_course')->with('cours',$cours)->with('listCommentaires',$commentaires);
        // return view('FrontOfficeLayout.Pages.Courses.show_course',compact('cours'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cours = Cours::find($id);

        return view('FrontOfficeLayout.Pages.Courses.edit', compact('cours'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $c = $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'duree'=>'required',
            'description' => 'required'
                ]);
        //  dd(json_encode($cours));
        $cours = Cours::find($id);
        $cours->update(['title'=>$request->title,
            'details'=>$request->details,
            'duree'=>$request->duree,
            'description'=>$request->description
            ]);
        //  dd(json_encode($request->title));

        $cours->save();
        return redirect()->route('cours_teacher.index')
            ->with('info','Course modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cours = Cours::find($id);
        Section ::where('cours_id',$id)->delete();
        Commentaire ::where('cours_id',$id)->delete();
        $cours->delete();
        return redirect()->route('cours_teacher.index')
            ->with('success','Cours deleted successfully!');
    }

    public function all()
    {
        $listCours= Cours::all();
        
       return view('FrontOfficeLayout/Pages/Courses/List_cours_student', compact('listCours'));
    }

    public function allAdmin()
    {
        $listCours= Cours::all();
        
       return view('BackOfficeLayout/Pages/Courses/course', compact('listCours'));
    }
    public function destroyAdmin( $id)
    {
        $cours = Cours::find($id);
        Section ::where('cours_id',$id)->delete();;
        $cours->delete();
        $listCours= Cours::all();

        return view('BackOfficeLayout/Pages/Courses/course', compact('listCours'));

    }

}
