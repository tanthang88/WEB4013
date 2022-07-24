<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SubCategories
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $categories_id
 * @method static \Database\Factories\SubCategoriesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereCategoriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereUrl($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Categories $categories
 */
class SubCategories extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'url',
      'categories_id'
    ];
    public $timestamps = true;
    public function categories(){
        return $this->belongsTo(Categories::class);
    }

}
