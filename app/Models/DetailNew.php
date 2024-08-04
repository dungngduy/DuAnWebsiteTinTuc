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
        'new_id'
    ];

    public function new(){
        return $this->belongsTo(News::class, 'new_id', 'id');
    }

    public function getTable()
    {
        return 'detail_new'; // Trả về tên bảng cụ thể
    }
}
