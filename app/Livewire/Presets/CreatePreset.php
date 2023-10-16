<?php

namespace App\Livewire\Presets;

use App\Models\Country;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreatePreset extends Component
{
    public $countries;

    #[Rule('required|integer')]
    public $country_id;

    #[Rule('required|string|max:15')]
    public $name;

    public function mount() {
        $this->countries = Country::all();
    }

    public function save()
    {
        $validated = $this->validate();
        auth()->user()->presets()->create($validated);

        $this->resetExcept('countries');
        $this->dispatch('preset-created');
    }

    public function render()
    {
        return view('livewire.presets.create-preset');
    }
}
