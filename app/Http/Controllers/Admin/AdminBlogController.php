<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Post;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('blog_category', 'blog_tags')->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = BlogCategory::pluck('title', 'id')->all();
        $blog_tags = BlogTag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('blog_categories', 'blog_tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'category_id' => 'required|integer',
            'description' => 'required',
            'content' => 'required',
            // 'tags' => 'required',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail'))
        {
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("images/{$folder}");
        }
//
        // $data['thumbnail'] = Post::uploadImage($request);

        $post = Post::create($data);

        
        // $post->tags()->sync($request->tags);
        // dd($request->all());
        return redirect()->route('blogs.index')->with('success', 'Товар добавлен');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $blog_categories = Post::pluck('title', 'id')->all();
        $blog_tags = BlogTag::pluck('title', 'id')->all();
//        $post = Post::find($id);
        return  view('admin.posts.edit', compact('blog_categories', 'blog_tags', 'post'));
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
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'thumbnail' => 'nullable|image',
        ]);

        $post = Post::find($id);
        $data = $request->all();

        $data['thumbnail'] = Post::uploadImage($request, $post->thumbnail);
//        if($file = Post::uploadImage($request, $post->thumbnail))
//        {
//            $data['thumbnail'] = $file;
//        }


        $post->update($data);
        $post->tags()->sync($request->tags);
        return  redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $post = Post::find($id);
        $post->tags()->sync($request->tags);
        Storage::delete($post->thumbnail);
        $post->delete();
//        Post::destroy($id);
        return redirect()->route('posts.index')->with('success', 'Товар успешно удален');
    }
}
