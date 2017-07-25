<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['title', 'content', 'reply', 'user_id', 'valid'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
