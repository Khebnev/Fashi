<?php

namespace App\Models;

use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Sluggable;
//use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;



class Product extends Model
{
    use HasFactory;

    use Sluggable;

    protected $fillable = ['title', 'description', 'price', 'category_id', 'thumbnail', 'brand', 'color', 'size'];
//    protected $fillable = ['title', 'price', 'category_id', 'thumbnail'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if($request->hasFile('thumbnail')) {
            if($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if(!$this->thumbnail) {
            return asset("no-image.png");
        }
        return asset("uploads/{$this->thumbnail}");
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
