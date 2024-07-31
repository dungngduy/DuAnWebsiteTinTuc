<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->join('user_status', 'news.status_new', '=', 'user_status.id')
            ->select(
                'news.*',
                'categories.title as title_cate',
                'user_status.name as status_name'
            )
            ->get();
        $totalNew = DB::table('news')
            ->selectRaw('COUNT(*) as totalNew')
            ->first();
        return response()->json([
            'news' => $news,
            'totalNew' => $totalNew,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = DB::table('user_status')
            ->select('id as value', 'name as label')
            ->get();
        $categories = DB::table('categories')
            ->select('id as value', 'title as label')
            ->get();
        return response()->json([
            'status' => $status,
            'categories'=> $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_new' => 'required|string',
            'image' => 'required|array|min:1',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'short_content' => 'required|string',
            'category_id' => 'required',
            'status_new' => 'required',
        ], [
            'title_new.required' => 'Vui lòng nhập tiêu đề bài viết.',
            'image.required' => 'Vui lòng chọn ảnh bài viết.',
            'image.*.image' => 'Tệp tải lên không phải là hình ảnh.',
            'image.*.mimes' => 'Chỉ chấp nhận các định dạng JPG, PNG, JPEG.',
            'image.*.max' => 'Dung lượng tối đa cho mỗi ảnh là 2MB.',
            'short_content.required' => 'Vui lòng nhập đoạn tóm tắt bài viết.',
            'category_id.required' => 'Vui lòng chọn danh mục bài viết.',
            'status_new.required' => 'Vui lòng chọn trạng thái bài viết.',
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/news', $fileName);
            }
        }

        News::create([
            'title_new' => $request['title_new'],
            'image' => json_encode($fileName),
            'short_content' => $request['short_content'],
            'category_id' => $request['category_id'],
            'status_new' => $request['status_new'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = News::findOrFail($id);
        return redirect()->route('detailNew.index', ['idNew'=> $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::find($id);
        $categories = DB::table('categories')
            ->select('id as value', 'title as label')
            ->get();
        $status = DB::table('User_status')
            ->select('id as value', 'name as label')
            ->get();
        return response()->json([
            'news' => $news,
            'categories' => $categories,
            'status'=> $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'title_new' => 'required',
            // 'image' => 'required|min:1',
            // 'image.*' => 'image|max:2048',
            'short_content' => 'required',
            'category_id' => 'required',
            'status_new' => 'required',
        ], [
            'title_new.required' => 'Vui lòng nhập tiêu đề bài viết.',
            // 'image.required' => 'Vui lòng chọn ảnh bài viết.',
            // 'image.*.image' => 'Tệp tải lên không phải là hình ảnh.',
            // 'image.*.max' => 'Dung lượng tối đa cho mỗi ảnh là 2MB.',
            'short_content.required' => 'Vui lòng nhập đoạn tóm tắt bài viết.',
            'category_id.required' => 'Vui lòng chọn danh mục bài viết.',
            'status_new.required' => 'Vui lòng chọn trạng thái bài viết.',
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/news', $fileName);
                $fileNames = $fileName;
            }
        } else {
            $fileNames = $request->input('imageExist');
        }

        News::find($id)->update([
            'title_new' => $request['title_new'],
            'image' => json_encode($fileNames),
            'short_content' => $request['short_content'],
            'category_id' => $request['category_id'],
            'status_new' => $request['status_new'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::find($id)->delete();
    }
}
