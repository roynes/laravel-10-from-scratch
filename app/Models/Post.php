<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'excerpt', 'body', 'slug',
        'published_at', 'user_id', 'category_id'
    ];

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'published_at'
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
