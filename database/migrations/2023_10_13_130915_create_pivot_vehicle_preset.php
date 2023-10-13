<?php

use App\Models\Preset;
use App\Models\Vehicle;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('preset_vehicle', function (Blueprint $table) {
            $table->foreignIdFor(Preset::class);
            $table->foreignIdFor(Vehicle::class);
            $table->primary(['preset_id', 'vehicle_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Schema::dropIfExists('preset_vehicle');
        });
    }
};
