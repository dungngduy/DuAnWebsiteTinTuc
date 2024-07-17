<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailNew extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_content',
        'order_index',
    ];
}
