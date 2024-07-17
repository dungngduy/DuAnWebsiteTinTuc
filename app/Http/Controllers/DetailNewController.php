<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\DetailNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailNewController extends Controller
{
    public function index($id)
    {
        $idNew = News::find($id);
        $detailNew = DB::table('detail_new')
            ->join('news', 'detail_new.new_id', '=', 'news.id')
            ->where('detail_new.new_id','=', $idNew->id)
            ->select(
                'detail_new.*',
            )
            ->get();
        return response()->json($detailNew);
    }
}
