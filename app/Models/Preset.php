<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Preset extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name' => 'string',
    ];

    /**
     * Get the user that owns the preset.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the country associated with the preset.
     */
    public function country(): HasOne
    {
        return $this->hasOne(Country::class);
    }

    /**
     * Get the vehicles associated with the preset.
     */
    public function vehicles(): BelongsToMany
    {
        return $this->BelongsToMany(Vehicle::class)->withTimestamps();
    }
}
