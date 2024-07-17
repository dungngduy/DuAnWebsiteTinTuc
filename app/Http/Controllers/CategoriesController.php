<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')
            ->select(
                'categories.*',
            )
            ->get();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('user_status')
            ->select('id as value', 'name as label')
            ->get();
        return response()->json([
            'status_cate' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
        ],
        [
            'status.required'=> 'Vui lòng chọn tình trạng',
            'title.required'=> 'Vui lòng điền tiêu đề',
        ]);

        // C1
        $categories = $request->all();
        Categories::create($categories);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Categories::find($id);
        $status_cate = DB::table('user_status')
            ->select('id as value', 'name as label')
            ->get();
        return response()->json([
            'categories'=> $categories,
            'status_cate'=> $status_cate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
        ],
        [
            'status.required'=> 'Vui lòng chọn tình trạng',
            'title.required'=> 'Vui lòng điền tiêu đề',
        ]);

        Categories::find($id)->update([
            'title'=> $request['title'],
            'status' => $request['status'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::find($id) ->delete();
    }
}
