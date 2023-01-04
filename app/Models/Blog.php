<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table= 'blogs';
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

    public function commentBlogs(){
        return $this->hasMany(CommentBlog::class);
    }
}
