<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = 'goods';
    protected $fillable = ['name', 'model', 'price', 'description', 'panel', 'details'];
}
