<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','meta_title','meta_keywords','meta_desc','parent_id'];
    protected $table='category';

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class,
            'parent_id');
    }

    /**
     * @return HasMany
     */
    public function childrenRecursive(): HasMany
    {
        return $this->children()->with('childrenRecursive');
    }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function AttributeGroup(): HasMany
    {
        return $this->hasMany(AttributeGroup::class,'attributeGroup_id');
    }

}
