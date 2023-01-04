<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseRequest;
use App\Models\Classe;
use App\Models\Rating;
use Illuminate\Http\Request;

class ClasseBackController extends Controller
{


    public function index()
    {
        $classes= Classe::all();


        return view('BackOfficeLayout.Pages.Classe.index', compact('classes'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackOfficeLayout.Pages.Classe.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClasseRequest $request)
    {
        $validated= $request->validated();
        $classe = new Classe();
        $classe->nom = $request->nom;
        $classe->type = $request->type;
        $classe->max_capacity = $request->max_capacity;
        $classe->niveau = $request->niveau;
        $classe->save();
        return redirect()->route('back.index')
            ->with('success','Classe added succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe= Classe::find($id);
        $rating= Rating::where('class_id',$classe->id);
        $rating->delete();

        $classe->delete();
        return redirect()->route('back.index')
            ->with('success','clsse deleted successfully!');
    }
    /**
     * Show the form for editing the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function edit(Classe $class)
    {
        return view('BackOfficeLayout.Pages.Classe.edit', compact('class'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Classe::where('id',$id)->update($request->except('_method','_token'));
        return redirect()->route('back.index')
            ->with('success','class updated successfully!');
    }

}
