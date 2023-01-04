<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Models\Evenement;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clubs= Club::paginate(3);
       return view('FrontOfficeLayout.Pages.Club.index', compact('clubs'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listClub()
    {
       $clubs= Club::paginate(3);
       return view('BackOfficeLayout.Pages.Club.index', compact('clubs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evenements= Evenement::all();
        //$users= User::all();
        return view('FrontOfficeLayout.Pages.Club.create',
            compact('evenements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClubRequest $request)
    {
        $validated= $request->validated();
        $club= Club::create($request->all());
        /*$club = new Club;
        $club->nom = $request->nom;
        $club->type = $request->type;
        $club->date_creation = $request->date_creation;
        $club->fondateur= $request->fondateur;
        $club->save();*/
        $club->evenements()->attach($request->events);
        //$club->users()->attach($request->users);
        return redirect()->route('clubs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        return view('FrontOfficeLayout.Pages.Club.show',compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        return view('FrontOfficeLayout.Pages.Club.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClubRequest $request, $id)
    {
        $validated= $request->validated();
        $club = ['nom'=>$request->nom,
            'type'=>$request->type,
            'date_creation'=>$request->date_creation,
            'fondateur'=>$request->fondateur
            ];
        Club::whereId($id)->update($club);
        return redirect()->route('clubs.index')
            ->with('info','Club modifié avec succés!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club= Club::find($id);
        $club->delete();
        return redirect()->route('clubs.index')
            ->with('success','Club deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAdmin($id)
    {
        $club= Club::find($id);
        $club->delete();
        return redirect()->route('clubadmin')
            ->with('success','Club deleted successfully!');
    }
}
