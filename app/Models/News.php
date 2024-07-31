<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        "title_new",
        "image",
        "short_content",
        "category_id",
        "status_new",
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
