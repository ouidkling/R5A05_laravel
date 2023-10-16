<?php

namespace App\Livewire\Presets;

use App\Models\Preset;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditPreset extends Component
{
    public $preset;

    #[Rule('required|string|max:15')]
    public $name;

    public function cancel() {
        $this->reset();
        $this->dispatch('preset-edit-canceled');
    }

    public function update() {
        $this->authorize('update', $this->preset);
        $validated = $this->validate();
        $this->preset->update($validated);

        $this->reset();
        $this->dispatch('preset-updated');
    }

    public function render()
    {
        return view('livewire.presets.edit-preset');
    }
}
