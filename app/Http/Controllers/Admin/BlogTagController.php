<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_tags = BlogTag::paginate(3);

        return view('admin.blogtags.index', compact('blog_tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogtags.create');
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
        ]);
        BlogTag::create($request->all());
        return redirect()->route('blog-tags.index')->with('success', 'Blog tag was added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog_tag = BlogTag::find($id);
        return  view('admin.blogtags.edit', compact('blog_tag'));
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
        ]);
        $blog_tag = BlogTag::find($id);
        $blog_tag->update($request->all());
        return  redirect()->route('blog-tags.index')->with('success', 'The changes were saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogTag::destroy($id);
        return redirect()->route('blog-tags.index')->with('success', 'Blog tag was successfully deleted');
    }
}
