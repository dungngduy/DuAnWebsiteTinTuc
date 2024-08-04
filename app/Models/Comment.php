<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'new_id',
        'user_id',
    ];

    public function new(){
        return $this->belongsTo(News::class, 'new_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
