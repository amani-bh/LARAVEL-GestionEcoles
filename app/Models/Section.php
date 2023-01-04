<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    public function Cours()
    {
      return $this->belongsTo(Cours::class);
    }
    protected $fillable = [
      'name', 'details', 'file','cours_id'
     ];
}
