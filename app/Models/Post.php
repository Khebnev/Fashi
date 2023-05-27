<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'content', 'category_id', 'thumbnail'];

    public function blog_tags(): HasMany
    {
        return $this->hasMany(BlogTag::class);
    }

    public function blog_category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
      * Return the sluggable configuration array for this model.
      *
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
