<?php

/**
 * @author      Aroldo de Moura Santos
 * @copyright   2023 Aroldo de Moura Santos
 * @license     GPL-3.0 license
 * @link        https://github.com/aroldosantos/LaravelSimpleCMS
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class Post Model
 */
class Post extends Model
{
    use HasFactory;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'featured_image',
        'content',
        'status',
        'category_id',
        'user_id',
    ];

    /**
     * GetSlugOptions method
     *
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Categoria method
     *
     * Get the post category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * User method
     *
     * Get the user of the post
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
