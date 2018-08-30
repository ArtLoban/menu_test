<?php

namespace App\Models;

use App\Services\Image\Contracts\HasImage;
use App\Services\Repositories\Contracts\HasMorphRelations;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model implements HasImage, HasMorphRelations
{
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'weight',
        ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients(){

        return $this->belongsToMany(
            Ingredient::class,
            'dish_ingredient',
            'dish_id',
            'ingredient_id'
        );
    }

    /**
     * Get all images of dish
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function getImage()
    {
        return $this->image;
    }

    public function ownerType(): string
    {
        return get_class($this);
    }

    public function ownerId(): int
    {
        return $this->getKey();
    }

    public function getMorphRelations(): array
    {
        return [
            'image'
        ];
    }


}
