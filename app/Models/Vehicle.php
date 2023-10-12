<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name' => 'string',
        'thumbnail_img_url' => 'string',
        'wiki_page' => 'string',
    ];

    /**
     * Get the country associated with the vehicle.
     */
    public function country(): HasOne
    {
        return $this->hasOne(Country::class);
    }

    /**
     * Get the category associated with the vehicle.
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    /**
     * Get the vehicles associated with the country
     */
    public function navalCategory(): HasOne
    {
        return $this->hasOne(NavalCategory::class);
    }
}
