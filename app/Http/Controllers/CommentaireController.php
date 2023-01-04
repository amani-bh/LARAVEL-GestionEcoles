<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $commentaire= Commentaire::all();
        // return view('Commentaire.index',compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Commentaire.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'commentaire'=>'required',
        ]);
        $commentaire= new Commentaire;
        $commentaire->commentaire = $request->commentaire;
        $commentaire->user_id= Auth::user()->id;
        $commentaire->cours_id=$request->cours_id;
        $commentaire->save();
        $mail_data=[
            'recipient'=>'amani.benhassine@esprit.tn',
            'fromEmail'=>Auth::user()->email,
            'subject'=>'new comment',
            'body'=>Auth::user()->name.": ".$commentaire->commentaire
        ];
        \Mail::send('email-template',$mail_data,function($message) use ($commentaire){
            $message->to(Auth::user()->email)
            ->from(Auth::user()->email)
            ->subject("new comment");
        });
        
        return redirect()->route('cours_teacher.show', $request->cours_id)
            ->with('success','Commentaire has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('Commentaire.show', compact('commentaires'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('Commentaire.edit', compact('commentaires'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $com= Commentaire::find($id);
        $com->commentaire= $request->commentaire;
        $com->date_creation= $request->date_creation;
        $com->save();
        return redirect()->route('Commentaire.index')
            ->with('success', 'Commentaire updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('Commentaire.index')
            ->with('success', 'Commentaire deleted successfully!');
    }
}
