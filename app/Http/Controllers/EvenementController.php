<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $evenements= Evenement::paginate(3);
        return view('FrontOfficeLayout.Pages.Evenement.index', compact('evenements'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listEvent(Request $request)
    {
        $evenements= Evenement::paginate(3);
        return view('BackOfficeLayout.Pages.Events.index', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs= Club::all();
        return view('FrontOfficeLayout.Pages.Evenement.create',
            compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evenement= new Evenement;
        $evenement->titre_event= $request->titre_event;
        $evenement->date_debut= $request->date_debut;
        $evenement->date_fin= $request->date_fin;
        $evenement->place= $request->place;
        $evenement->description= $request->description;
        $evenement->createur= $request->createur;
        $request->validate([
            'titre_event'=>'required',
            'date_debut'=>'required|date_format:Y-m-d',
            'date_fin'=>'required|date_format:Y-m-d',
            'place'=>'required',
            'description'=>'required|max:300',
            'createur'=>'required'
        ],[
            'titre_event.required'=>"Le titre est obligatoire.",
            'date_debut.required'=>"La date de début est obligatoire.",
            'date_debut.date_format'=>"La date de début doit avoir le format: Y-m-d",
            'date_fin.required'=>"La date de fin est obligatoire.",
            'date_fin.date_format'=>"La date de fin doit avoir le format: Y-m-d",
            'place.required'=>"La place est obligatoire.",
            'description.required'=>"La description est obligatoire.",
            'description.max'=>"La description a un maximum de 300 caractères.",
            'createur.required'=>"Le créateur est obligatoire."
        ]);
        $evenement->save();
        $evenement->clubs()->attach($request->clubs);
        return redirect()->route('evenements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evenement= Evenement::find($id);
        return view('FrontOfficeLayout.Pages.Evenement.show',
            compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
        return view('FrontOfficeLayout.Pages.Evenement.edit',
            compact('evenement'));
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
        $evenement= ['titre_event'=>$request->titre_event,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'place'=>$request->place,
            'description'=>$request->description,
            'createur'=>$request->createur
        ];
        $validate= Validator::make($request->all(),[
            'titre_event'=>'required',
            'date_debut'=>'required|date_format:Y-m-d',
            'date_fin'=>'required|date_format:Y-m-d',
            'place'=>'required',
            'description'=>'required|max:300',
            'createur'=>'required'
        ],[
            'titre_event.required'=>"Le titre est obligatoire.",
            'date_debut.required'=>"La date de début est obligatoire.",
            'date_debut.date_format'=>"La date de début doit avoir le format: Y-m-d",
            'date_fin.required'=>"La date de fin est obligatoire.",
            'date_fin.date_format'=>"La date de fin doit avoir le format: Y-m-d",
            'place.required'=>"La place est obligatoire.",
            'description.required'=>"La description est obligatoire.",
            'description.max'=>"La description a un maximum de 300 caractères.",
            'createur.required'=>"Le créateur est obligatoire."

        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }

        Evenement::whereId($id)->update($evenement);
        return redirect()->route('evenements.index')
            ->with('info','Evenement modifié avec succés!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evenement= Evenement::find($id);
        $evenement->delete();
        return redirect()->route('evenements.index')
            ->with('success','Event deleted successfully!');
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyEventAdmin($id)
    {
        $evenement= Evenement::find($id);
        $evenement->delete();
        return redirect()->route('eventadmin')
            ->with('success','Event deleted successfully!');
    }
}
