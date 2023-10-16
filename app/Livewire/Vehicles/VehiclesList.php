<?php

namespace App\Livewire\Vehicles;

use App\Models\Country;
use App\Models\Vehicle;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class VehiclesList extends Component
{
    use WithPagination;

    public $countries;

    public $country_id;

    public $query;

    public function mount()
    {
        $this->countries = Country::all();
        $this->country_id = $this->countries->first()->id;
    }

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.vehicles.vehicles-list',[
            'vehicles' => Vehicle::where([
                ['country_id', $this->country_id],
                ['name', 'like', '%'.$this->query.'%']
            ])->paginate(20),
        ]);
    }
}
