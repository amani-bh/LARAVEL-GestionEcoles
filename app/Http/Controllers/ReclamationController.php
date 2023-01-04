<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Requests\ReclamationRequest;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
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
        $listReclamation= Reclamation::all();
        return view("BackOfficeLayout/Pages/Reclamation/reclamations",compact("listReclamation"));
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function reclamationPDF(int $id){
        $reclamation=Reclamation::find($id);
        $pdf = Pdf::loadView('BackOfficeLayout/Pages/Reclamation/reclamationPDF',['reclamation'=>$reclamation]);
        return $pdf->download('reclamationPDF.pdf');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clientList(Request $request)
    {
      $connectedUser= User::find(Auth::user()->id);
         $search = $request['search'] ?? "";
        if($search !=""){
         $listReclamation= Reclamation::where('user_id',Auth::user()->id)->where('titre', 'LIKE', "%$search%")->get();
        }else{
           $listReclamation=$connectedUser->reclamations()->get();
        }
        return view("FrontOfficeLayout/Pages/Reclamation/reclamations",compact("listReclamation",'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FrontOfficeLayout.Pages.Reclamation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReclamationRequest $request)
    {
        $isValidated= $request->validated();
        $reclamation = new Reclamation();
        $reclamation->titre = $request->titre;
        $reclamation->description = $request->description;
        $reclamation->user_id =Auth::user()->id;
        $reclamation->save();
        return redirect()->route('reclamation')
            ->with('success','Reclamation ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $reclamation=Reclamation::find($id);
        return view('BackOfficeLayout/Pages/Reclamation/show',compact('reclamation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function clientShow(int $id)
    {
        $reclamation=Reclamation::find($id);
        return view('FrontOfficeLayout.Pages.Reclamation.show',compact('reclamation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $reclamation = Reclamation::find($id);
        return view('FrontOfficeLayout.Pages.Reclamation.edit',compact('reclamation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReclamationRequest $request, int $id)
    {
        $reclamation=[
            'titre'=>$request->titre,
            'description'=>$request->description
        ];
        Reclamation::where('id',$id)->update($reclamation);
        return redirect()->route('reclamation')
            ->with('success','Reclamation modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $rec= Reclamation::find($id);
        $rec->delete();
        return redirect()->route('reclamationadmin.index')
            ->with('success','reclamation effacé!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyClient(int $id)
    {
        $rec= Reclamation::find($id);
        $rec->delete();
        return redirect()->route('reclamation')
            ->with('success','reclamation effacé!');
    }
}
