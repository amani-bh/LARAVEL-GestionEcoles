<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected  $table='ratings';
    protected  $fillable=[
        'class_id',
        'stars_rated',
         'comment'
    ];
    public function classe (){
        return $this->belongsTo(Classe::class,'class_id');
    }
}
