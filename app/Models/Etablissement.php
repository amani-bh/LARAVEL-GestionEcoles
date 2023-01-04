<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    protected $table= 'etablissements';
    protected $primaryKey= 'id';
    public $timestamps = false;
    protected $fillable=[
        'name',
        'adress',
        'nmbrmax',
        'email',
        'tel'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
