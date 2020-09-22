<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    public $timestamps = true;

    protected $fillable = ['text', 'user_id', 'post_id'];

    public function Post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    use HasFactory;
}
