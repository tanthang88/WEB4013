<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Posts
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property string $slug
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $sub_categories_id
 * @property int $user_id
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PostsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts query()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereSubCategoriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\SubCategories $subCategories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comments[] $comments
 * @property-read int|null $comments_count
 * @property int $categories_id
 * @property-read \App\Models\Categories $categories
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereCategoriesId($value)
 */
class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'short_content',
        'content',
        'image',
        'slug',
        'is_active',
        'sub_categories_id',
        'user_id',
        'categories_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function subCategories(){
        return $this->belongsTo(SubCategories::class);
    }
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
