<?php

namespace App\Livewire\Vehicles;

use Livewire\Component;

class ShowVehicle extends Component
{
    public $vehicle;

    public function render()
    {
        return view('livewire.vehicles.show-vehicle');
    }
}
