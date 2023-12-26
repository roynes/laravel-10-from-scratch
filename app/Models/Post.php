<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'published_at', 'user_id', 'category_id'];

    protected $guarded = ['id'];

    protected $casts = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false, 
            fn($query, $search) => 
                $query->where(fn($query) =>
                    $query->where('title', 'like', '%' . $search . '%')
                          ->orWhere('body', 'like', '%' . $search . '%')
        ));

        // Query is same as the one below
        // $query->when($filters['category'] ?? false, fn($query, $category) =>
        //     $query->whereExists(
        //         fn($query) =>
        //             $query->from('categories')
        //                   ->whereColumn('categories.id', 'posts.category_id')
        //                   ->where('categories.slug', $category)
        //     )
        // );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) => 
                $query->whereHas('category', fn($query) =>
                    $query->where('slug', $category)
        ));

        $query->when(
            $filters['author'] ?? false, 
            fn($query, $author) => 
                $query->whereHas('author', fn($query) => 
                    $query->where('username', $author)
        ));

        return $query;
    }
}
