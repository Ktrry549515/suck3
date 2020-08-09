<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class BlogController extends Controller
{

    public function Blog()
    {
        $post = DB::table('posts')
            ->join('post_category', 'posts.category_id', 'post_category.id')
            ->select('posts.*', 'post_category.category_name_en', 'post_category.category_name_tw')
            ->get();

        //return response()->json($post);

        return view('pages.blog', compact('post'));
    }

    public function English()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang', 'english');
        return redirect()->back();
    }

    public function Taiwan()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang', 'taiwan');
        return redirect()->back();
    }

    public function BlogSingle($id)
    {
        $posts = DB::table('posts')->where('id', $id)->get();
        return view('pages.blog_single', compact('posts'));
    }
}
