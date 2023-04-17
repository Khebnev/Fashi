<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index()
    {
        // $blog_tags = new BlogTag();
        // $blog_tags->title = 'Hello world';
        // $blog_tags->save();
        return view('admin.index');
    }
}
