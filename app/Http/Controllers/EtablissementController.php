<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtablissementRequest;
use App\Models\Etablissement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listEtablissement= Etablissement::all();
        return view("BackOfficeLayout/Pages/Etablissement/etablissements",compact("listEtablissement"));
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailEtabl()
    {
        $user=User::find(Auth::user()->id);
        return view("FrontOfficeLayout/Pages/Etablissement/detail",compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackOfficeLayout.Pages.Etablissement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtablissementRequest $request)
    {
        $isValidated= $request->validated();
        $etablissement = new Etablissement();
        $etablissement->name = $request->name;
        $etablissement->adress = $request->adress;
        $etablissement->nmbrmax = $request->nmbrmax;
        $etablissement->email = $request->email;
        $etablissement->tel = $request->tel;
        $etablissement->save();
        return redirect()->route('etablissement.index')
            ->with('success','Etablissement ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etablissement $etablissement)
    {
        return view('BackOfficeLayout.Pages.Etablissement.show',compact('etablissement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $etablissement = Etablissement::find($id);
        return view('BackOfficeLayout.Pages.Etablissement.edit',compact('etablissement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtablissementRequest $request, int $id)
    {
        $etablissement=[
            'name' => $request->name,
            'adress' => $request->adress,
            'nmbrmax' => $request->nmbrmax,
            'email' => $request->email,
            'tel' => $request->tel
            ];
        Etablissement::where('id',$id)->update($etablissement);
        return redirect()->route('etablissement.index')
            ->with('success','Etablissement modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $etablissement= Etablissement::find($id);
        $etablissement->delete();
        return redirect()->route('etablissement.index')
            ->with('success','Etablissement effacé!');
    }
}
