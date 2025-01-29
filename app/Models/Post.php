<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'cover',
        'rooms',
        'bedrooms',
        'floor',
        'surface',
        'price',
        'city',
        'address',
        'user_id',
        'sold'
    ];
    public function scopeSolded($query)
    {
        return $query->where(column: 'sold', operator: '=', value: 1);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'commentable_id');
    }
    public function getSlug(): string
    {
        return Str::limit(Str::slug($this->description, '-', 'fr'), 20, '');
    }
    public function getDescription(): string
    {
        return Str::limit($this->description, 30);
    }
    public function getCover(): string
    {
        return $this->cover ?
            Storage::disk('public')->url($this->cover) :
            url(asset('assets/images/bg.jpg'));
    }
    public function scopePostPopular(): array|Collection
    {
        return self::latest()->limit(6)->get();
    }
    public function scopeWithCategories($query, $category)
    {
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('name', 'LIKE', "%{$category}%");
        });
    }
}
