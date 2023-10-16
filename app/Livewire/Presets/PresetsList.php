<?php

namespace App\Livewire\Presets;

use Livewire\Attributes\On;
use Livewire\Component;

class PresetsList extends Component
{
    public $presets;

    public $editing = null;

    #[On(['preset-created', 'preset-updated', 'preset-edit-canceled'])]
    public function mount()
    {
        $this->editing = null;
        $this->presets = auth()->user()->presets()->get();
    }

    public function render()
    {
        return view('livewire.presets.presets-list');
    }
}
