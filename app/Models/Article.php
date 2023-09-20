<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

//    protected  $with = ['category','comments'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeGetArticles($query)
    {

       return $query
              ->orderBy('created_at','desc')
              ->with(['comments','category'])
              ->paginate(5)
              ->toJson();
    }

    public function scopeGetSingleArticle($query,$id)
    {
        return $query
               ->where('id',$id)
               ->with(['comments','category'])
               ->get()
               ->first()
               ->toJson();
    }
}
