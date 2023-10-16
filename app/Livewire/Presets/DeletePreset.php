<?php

namespace App\Livewire\Presets;

use Livewire\Component;

class DeletePreset extends Component
{
    public $preset;

    public function delete()
    {
        $this->preset->delete();
        $this->emit('presetDeleted');
    }

    public function render()
    {
        return view('livewire.presets.delete-preset');
    }
}
