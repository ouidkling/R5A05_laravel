<?php

namespace App\Livewire\Presets;

use Livewire\Attributes\On;
use Livewire\Component;

class PresetsList extends Component
{
    public $presets;

    #[On('preset-created')]
    public function mount()
    {
        $this->presets = auth()->user()->presets()->get();
    }

    public function render()
    {
        return view('livewire.presets.presets-list');
    }
}
