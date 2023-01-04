<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingControlleur extends Controller
{
    public function add(Request $request): \Illuminate\Http\RedirectResponse
    {
        $stars_rated = $request->input('product_rating');
        $classe_id=$request->input('class_id');
        $exist=Rating::where('class_id',$classe_id)->first();
       // if($exist){
         //   $exist->stars_rated=$stars_rated;
           // $exist->update();
        //}
      //  else{
        Rating::create([
            'class_id'=>  $classe_id,
            'stars_rated'=>$stars_rated,
            'comment'=>"ff"


        ]);
       // }
        return redirect("/classes")->with('status',"thank you for rating");
    }
}
