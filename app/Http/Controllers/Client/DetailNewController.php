<?php

namespace App\Http\Controllers\client;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class DetailNewController extends Controller
{
    public function getDetailNew(string $id)
    {
        $new = News::with('category')->find($id);
        $detailNew = DB::table('detail_new')
            ->where('new_id', $new->id)
            ->get();
        $commentCount = Comment::where('new_id', $new->id)->count();

        if ($new && $detailNew) {
            return response()->json([
                'new' => $new,
                'detailNew' => $detailNew,
                'count' => $commentCount
            ]);
        } else {
            return response()->json(['message' => 'News not found'], 404);
        }
    }

    public function comments(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'content' => 'required|string',
        ], [
            'content.required' => 'Vui lòng nhập nội dung bình luận.',
        ]);

        Comment::create([
            'content' => $request['content'],
            'new_id' => $request['new_id'],
            'user_id' => $request['user_id'],
        ]);
    }

    public function getComments(string $id)
    {
        $comments = Comment::where('new_id', $id)
                ->with('user')
                ->get();

        return response()->json($comments);
    }
}
