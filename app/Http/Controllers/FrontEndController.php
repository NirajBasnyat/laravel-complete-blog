<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
    	return view('index')->with('title',Setting::first()->site_name)
    						->with('categories',Category::take(5)->get())
    						->with('first_post',Post::orderBy('created_at','Desc')->first())
    						->with('second_post',Post::orderBy('created_at','Desc')->skip(1)->take(1)->get()->first())
    						->with('third_post',Post::orderBy('created_at','Desc')->skip(2)->take(1)->get()->first())
    						->with('first_category',Category::take(3)->get()->first())
    						->with('second_category',Category::skip(1)->take(3)->get()->first())
    						->with('settings',Setting::all());

    }

    public function singlePost($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $next_id = Post::where('id', '>', $post->id )->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('single')->with('post_title',$post->title)
                             ->with('title',Setting::first()->site_name)
                             ->with('tags',Tag::all())
                             ->with('categories',Category::take(5)->get())
                             ->with('settings',Setting::all())
                             ->with('post',$post)
                             ->with('next',Post::find($next_id))
                             ->with('prev',Post::find($prev_id));


    }

    public function category($id)
    {
        $category = Category::find($id);

        return view('category')->with('category',$category)
                               ->with('title',Setting::first()->site_name)
                               ->with('settings',Setting::all())
                               ->with('categories',Category::take(5)->get());

    }
    
}
