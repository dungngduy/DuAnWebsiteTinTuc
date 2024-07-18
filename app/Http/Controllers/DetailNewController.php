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
            ->where('detail_new.new_id','=', $idNew->id)
            ->select(
                'detail_new.*',
            )
            ->get();
        return response()->json($detailNew);
    }

    public function create(String $id)
    {
        $idNew = News::find($id);
        return response()->json([
            'idNew' => $idNew->id,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_content' => 'required|string',
            'order_index' => 'required',
        ], [
            'main_content.required' => 'Vui lòng nhập nội dung của bài viết.',
            'order_index.required' => 'Vui lòng chọn bài viết.',
        ]);

        DetailNew::create([
            'main_content' => $request['main_content'],
            'order_index' => $request['order_index'],
            'new_id'=> $request['new_id'],
        ]);
    }

    public function edit(String $id, String $idNew)
    {
        $idNew = News::find($idNew);
        $detailNew = DetailNew::find($id);
        return response()->json([
            'detailNew' => $detailNew,
            'idNew' => $idNew->id,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'main_content' => 'required|string',
            'order_index' => 'required',
        ], [
            'main_content.required' => 'Vui lòng nhập nội dung của bài viết.',
            'order_index.required' => 'Vui lòng chọn bài viết.',
        ]);

        DetailNew::find($id)->update([
            'main_content' => $request['main_content'],
            'order_index' => $request['order_index'],
        ]);
    }

    public function destroy(string $id)
    {
        DetailNew::find($id)->delete();
    }
}
