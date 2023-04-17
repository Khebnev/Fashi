<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class);
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
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
