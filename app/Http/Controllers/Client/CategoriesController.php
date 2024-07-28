<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function getAllNews(Request $request)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 4);

        $query = DB::table('news')
            ->join('categories', 'news.category_id' , '=', 'categories.id')
            ->select('news.*', 'categories.title')
            ->orderByDesc('news.id');

        $totalNew = $query->count();
        $news = $query->skip(($page - 1) * $pageSize)->take($pageSize)->get();

        return response()->json([
            'news' => $news,
            'totalNew' => $totalNew
        ]);
    }

    public function getAllCategories(){
        $categories = DB::table('categories')
        ->leftJoin('news', 'categories.id', '=', 'news.category_id')
        ->select('categories.id', 'categories.title', DB::raw('count(news.id) as new_count'))
        ->groupBy('categories.id', 'categories.title')
        ->get();

        return response()->json($categories);
    }

    public function getCategoriesNewsSearch(Request $request){
        $categoryId = $request->input('category_id');
        $news = DB::table('news')
            ->where('category_id', $categoryId)
            ->get();

        return response()->json([
            'news' => $news
        ]);
    }
}
