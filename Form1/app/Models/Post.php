<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['title','body','is_published','slug','category_id','user_id'];

    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
