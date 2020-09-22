<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'text'];

    use HasFactory;

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function commenti(){
        return $this->hasMany('App\Models\Comment');
    }
}
