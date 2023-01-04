<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $table='evenements';
    protected $primaryKey= 'id';
    //public $timestamps= false;
    protected $fillable=[
        'titre_event',
        'date_debut',
        'date_fin',
        'place',
        'description',
        'createur'
    ];
    public function clubs(){
        return $this->belongsToMany(Club::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
