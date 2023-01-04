<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\Club;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Requests\ClasseRequest;


class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function index()
   {
       $classe= Classe::all();
       $top_rate=Rating::where('stars_rated',5)->latest()->limit(1)->get();
       $tops=[];
       foreach ($top_rate as $t){
           $item=Classe::find($t->class_id);
           $tops[] = $item;

       }

       return view('FrontOfficeLayout.Pages.Classe.index', compact('classe','tops'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FrontOfficeLayout.Pages.Classe.create');
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
    return redirect()->route('classes.index')
        ->with('success','Classe added succès!');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $class)
    {   $ratings=Rating::where('class_id',$class->id)->get();
        $rating_sum=Rating::where('class_id',$class->id)->sum('stars_rated');
        if($ratings->count()>1){
        $rating_value= $rating_sum/ $ratings->count();

        }
        else{
            $rating_value= $rating_sum;
        }
        return view('FrontOfficeLayout.Pages.Classe.show',compact('class','ratings','rating_value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $class)
    {
        return view('FrontOfficeLayout.Pages.Classe.edit', compact('class'));
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
        return redirect()->route('classes.index')
            ->with('success','Classe updated successfully!');
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
        return redirect()->route('classes.index')
            ->with('success','clsse deleted successfully!');
    }
}
