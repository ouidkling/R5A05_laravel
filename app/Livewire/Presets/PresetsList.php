<?php

namespace App\Livewire\Presets;

use App\Models\Preset;
use Livewire\Attributes\On;
use Livewire\Component;

class PresetsList extends Component
{
    public $presets;

    public $editing = null;

    public function delete(Preset $preset)
    {
        $this->authorize('delete', $preset);
        $preset->delete();
        $this->presets = auth()->user()->presets()->get();
    }

    public function edit(Preset $preset)
    {
        $this->editing = $preset;
    }

    #[On('preset-created')]
    #[On('preset-updated')]
    #[On('preset-edit-canceled')]
    public function getPresets()
    {
        $this->editing = null;
        $this->presets = auth()->user()->presets()->get();
    }

    public function mount()
    {
       $this->getPresets();
    }

    public function render()
    {
        return view('livewire.presets.presets-list');
    }
}
