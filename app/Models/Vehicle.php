<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle extends Model
{
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
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the category associated with the vehicle.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the naval category associated with the vehicle.
     */
    public function navalCategory(): BelongsTo
    {
        return $this->belongsTo(NavalCategory::class);
    }

    /**
     * Get the presets associated with the vehicle.
     */
    public function preset(): BelongsToMany
    {
        return $this->belongsToMany(Preset::class)->withTimestamps();
    }
}
