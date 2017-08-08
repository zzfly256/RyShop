<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'content', 'user_id', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
