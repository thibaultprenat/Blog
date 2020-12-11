<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
     }
     
    protected $table = 'post';
    protected $fillable = ['title', 'content','user_id'];
    

    public function comments(){

        return $this->morphMany('App\Models\Commentaire', 'commentable')->latest();
    }
}
