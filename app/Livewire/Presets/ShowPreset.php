<?php

namespace App\Livewire\Presets;

use Livewire\Component;

class ShowPreset extends Component
{
    public $preset;

    public function render()
    {
        return view('livewire.presets.show-preset');
    }
}
