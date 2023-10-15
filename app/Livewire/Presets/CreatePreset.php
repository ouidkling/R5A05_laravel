<?php

namespace App\Livewire\Presets;

use Livewire\Attributes\Rule;
use Livewire\Component;

class CreatePreset extends Component
{
    #[Rule('required|integer')]
    public $country_id;

    #[Rule('required|string|max:15')]
    public $name;

    public function save()
    {
        $validated = $this->validate();

        auth()->user()->presets()->create($validated);

        return redirect('/presets/create')
            ->with('status', 'Preset created !');
    }

    public function render()
    {
        return view('livewire.presets.create-preset');
    }
}
