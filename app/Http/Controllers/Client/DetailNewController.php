<?php

namespace App\Http\Controllers\client;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DetailNewController extends Controller
{
    public function getDetailNew(string $id)
    {
        $new = News::with('category')->find($id);
        $detailNew = DB::table('detail_new')
            ->where('new_id', $new->id)
            ->get();

        if ($new && $detailNew) {
            return response()->json([
                'new' => $new,
                'detailNew' => $detailNew,
            ]);
        } else {
            return response()->json(['message' => 'News not found'], 404);
        }
    }
}
