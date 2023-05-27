<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relation\BelongsTo;
use Illuminate\Database\Eloquent\Relation\BelongsToMany;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'content', 'category_id', 'thumbnail'];

    public function blog_tags()
    {
        return $this->belongsToMany(BlogTag::class);
    }

    public function blog_category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
     public function sluggable(): array
    {
        return [
        'slug' => [
        'source' => 'title'
    ]
    ];
    }
}
