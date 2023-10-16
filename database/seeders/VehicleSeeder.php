<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
use App\Models\NavalCategory;
use App\Models\Vehicle;
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
                $this->navalVehicles($countries, $category);
                continue;
            }

            foreach ($countries as $countryData => $vehicles) {
                 $country = Country::firstOrCreate(['name' => $countryData]);

                if (empty(get_object_vars($vehicles))) {
                    continue;
                }

                foreach ($vehicles->vehicles as $vehicleData) {
                    Vehicle::create([
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

    /**
     * Particular treatment for naval vehicles.
     *
     * @param $countries
     * @param Category $category
     */
    public function navalVehicles($countries, Category $category)
    {
        foreach ($countries as $countryData => $navalCategories) {
            $country = Country::firstOrCreate(['name' => $countryData]);

            foreach ($navalCategories as $navalCategoryData => $vehicles) {
                // to skip the 'updated_at' key & there can be no vehicles in a naval category
                if ($navalCategoryData === 'updated_at' || empty(get_object_vars($vehicles))) {
                    continue;
                }

                $navalCategory = NavalCategory::firstOrCreate(['name' => $navalCategoryData]);

                foreach ($vehicles->vehicles as $vehicleData) {
                    Vehicle::create([
                        'category_id' => $category->id,
                        'country_id' => $country->id,
                        'naval_category_id' => $navalCategory->id,
                        'name' => $vehicleData->name,
                        'thumbnail_img_url' => $vehicleData->thumbnail_img_url,
                        'wiki_page' => $vehicleData->wiki_page,
                    ]);
                }
            }
        }
    }
}
