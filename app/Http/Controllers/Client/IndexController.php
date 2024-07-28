<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getTrendingTopNews(){
        $query = DB::table('news')
            ->join('categories', 'news.category_id' , '=', 'categories.id')
            ->select('news.*', 'categories.title')
            ->orderByDesc('id')
            ->limit(1)
            ->get();
        return response()->json($query);
    }

    public function getTrendingBottomNews(){
        $query = DB::table('news')
            ->join('categories', 'news.category_id' , '=', 'categories.id')
            ->select('news.*', 'categories.title')
            ->orderByDesc('id')
            ->skip(1)
            ->limit(3)
            ->get();
        return response()->json($query);
    }

    public function getTrendingRightNews(){
        $query = DB::table('news')
            ->join('categories', 'news.category_id' , '=', 'categories.id')
            ->select('news.*', 'categories.title')
            ->orderByDesc('id')
            ->skip(4)
            ->limit(5)
            ->get();
        return response()->json($query);
    }

    public function getPopularOnWeekNews(){
        $query = DB::table('news')
            ->join('categories', 'news.category_id' , '=', 'categories.id')
            ->select('news.*', 'categories.title')
            ->limit(4)
            ->get();
        return response()->json($query);
    }

    public function getCategoriesNewsHomeTab(){
        $query = DB::table('news')
            ->join('categories', 'news.category_id' , '=', 'categories.id')
            ->select('news.*', 'categories.title')
            ->orderByDesc('news.id')
            ->limit(4)
            ->get();
        return response()->json($query);
    }

    public function getCategoriesNews(){
        $categories = DB::table('categories')
            ->limit(5)
            ->get();

        $results = [];

        foreach ($categories as $category) {
            $posts = DB::table('news')
                ->where('category_id', $category->id)
                ->orderByDesc('id')
                ->limit(4)
                ->get();

            $results[] = [
                'category' => $category,
                'news' => $posts
            ];
        }

        return response()->json([
            'categories' => $results
        ]);
    }

    public function getNewsRecent(){
        $query = DB::table('news')
            ->join('categories', 'news.category_id' , '=', 'categories.id')
            ->select('news.*', 'categories.title')
            ->orderByDesc('news.id')
            ->limit(4)
            ->get();
        return response()->json($query);
    }
}
