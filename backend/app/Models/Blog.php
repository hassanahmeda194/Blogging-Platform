<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'banner',
        'views',
        'publish_date',
        'is_published',
        'featured_blog',
        'user_id',
        'active',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id');
    }

    public function likes()
    {
        return $this->hasMany(BlogLike::class, 'blog_id');
    }

    // Accessors (Recommended)
   public function commentCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->comments()->count()
        );
    }

    public function likeCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->likes()->count()
        );
    }
}
