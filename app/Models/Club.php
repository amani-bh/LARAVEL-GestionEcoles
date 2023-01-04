<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $table= 'clubs';
    protected $primaryKey= 'id';
    //public $timestamps = false;
    protected $fillable=[
        'nom',
        'date_creation',
        'type',
        'fondateur'
    ];

    public function evenements(){
        return $this->belongsToMany(Evenement::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
