<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(!Auth::user())
         return redirect()->route('login')  ;
        if(Auth::user()->user_type==='admin')
        return view('BackOfficeLayout/Pages/dashboard') ;
        else  return view('FrontOfficeLayout.Pages.home') ;

    }
}
