<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Post;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count()== 0 || $tags->count() == 0) //check if we've categories and redirects if no category
        {
            Session::flash('info','You need to have a category or tags');
            return redirect('/home');
        }
        return view('admin.posts.create')->with('categories',$categories)
                                         ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
       
        // Validation for the create form
        $this->validate($request,[
            'title' => 'required',
            'content' =>'required',
            'featured' =>'image',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        //Handle file upload
        if($request->hasFile('featured'))
        {
            //get the file name with ext
            $filenameWithExt = $request->file('featured')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('featured')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //upload
            $path = $request->file('featured')->storeAs('public/uploads/posts',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

       /* //for the featured image
        $featured = $request->file('featured');

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->storeAs('uploads/posts',$featured_new_name);*/

        $post = Post::create([

            'title' => $request->input('title'),
            'slug' => str_slug($request->input('title')),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'featured' => $fileNameToStore
        ]);

        $post->tags()->attach($request->input('tags'));

        Session::flash('success','Post created successfully');
        return redirect('/home');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);

        return view('admin.posts.edit')->with('post',$post)
                                       ->with('categories',Category::all())
                                       ->with('tags',Tag::all());
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Validation for the create form
         $this->validate($request,[
             'title' => 'required',
             'content' =>'required',
             'category_id' => 'required'
         ]);

        //Handle file upload
        if($request->hasFile('featured'))
        {
            //get the file name with ext
            $filenameWithExt = $request->file('featured')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('featured')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //upload
            $path = $request->file('featured')->storeAs('public/uploads/posts',$fileNameToStore);
        }
        

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id =$request->input('category_id');
        if($request->hasFile('featured'))
        {
           $post->featured = $fileNameToStore;
        }

        $post->tags()->sync($request->input('tags'));
        $post->save();

        Session::flash('success','Post updated successfully');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success','Post deleted successfully');
        return redirect()->route('posts');
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get(); //get only trashed to display

        return view('admin.posts.trash')->with('posts',$posts);

        //dd($posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first(); //get every post inc trash which is normally hidden
        $post->forceDelete();

        Session::flash('success','Post deleted permanently');
        return redirect()->route('post.trash');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();

        Session::flash('success','Post restored successfully');
        return redirect()->route('posts');
    }
}
