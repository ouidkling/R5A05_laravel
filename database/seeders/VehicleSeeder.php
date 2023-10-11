<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://wt.scheenen.dev/v1/vehicles/all/all')->object();

        foreach ($response as $categoryData => $countries) {
            $category = Category::firstOrCreate(['name' => $categoryData]);

            if ($categoryData === 'naval') {
                continue;
            }

            foreach ($countries as $countryData => $vehicles) {
                 $country = Country::firstOrCreate(['name' => $countryData]);

                foreach ($vehicles->vehicles as $vehicleData) {
                    \App\Models\Vehicle::create([
                        'category_id' => $category->id,
                        'country_id' => $country->id,
                        'name' => $vehicleData->name,
                        'thumbnail_img_url' => $vehicleData->thumbnail_img_url,
                        'wiki_page' => $vehicleData->wiki_page,
                    ]);
                }
            }
        }
    }
}
