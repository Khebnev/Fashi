<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.products.create', compact('categories', 'tags'));
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
            'category_id' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'thumbnail' => 'nullable|image',
        ]);
        $data = $request->all();
//
        $data['thumbnail'] = Product::uploadImage($request);

        $product = Product::create($data);
//        Product::create($request->all());
        $product->tags()->sync($request->tags);
        return redirect()->route('products.index')->with('success', 'Товар добавлен');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
//        $product = Product::find($id);
        return  view('admin.products.edit', compact('categories', 'tags', 'product'));
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
            'brand' => 'required',
            'color' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'thumbnail' => 'nullable|image',
        ]);

        $product = Product::find($id);
        $data = $request->all();

        $data['thumbnail'] = Product::uploadImage($request, $product->thumbnail);

        $product->update($data);
        $product->tags()->sync($request->tags);
        return  redirect()->route('products.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Категория успешно удалена');
    }
}
