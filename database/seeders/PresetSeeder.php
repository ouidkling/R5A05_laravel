<?php

namespace Database\Seeders;

use App\Models\Preset;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Preset::factory(20)->create();

        $vehicles = Vehicle::all();

        Preset::all()->each(function (Preset $preset) use ($vehicles) {
            $preset->vehicles()->attach(
                $vehicles->where('country_id', $preset->country_id)->random(random_int(1, 10))->pluck('id')
            );
        });
    }
}
