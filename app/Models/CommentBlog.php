<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    use HasFactory;

    protected $table= 'comment_blogs';
    protected $primaryKey= 'id';
    public $timestamps = false;
    protected $fillable=[
        'contenu'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function blogs (){
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
