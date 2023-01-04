<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $table= 'reclamations';
    protected $primaryKey= 'id';
    public $timestamps = false;
    protected $fillable=[
        'titre',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
