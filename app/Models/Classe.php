<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table= 'classes';
    protected $primaryKey= 'id';
    public $timestamps = false;
    protected $fillable=[
        'nom',
        'max_capacity',
        'type',
        'niveau',
        'classe_id'
    ];

    public function ratings(){
        return $this->hasMany(Rating::class);
    }
}
