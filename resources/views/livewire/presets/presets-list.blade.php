<div>
    @if ($presets->isEmpty())
        <div class="bg-white dark:bg-gray-300 shadow-sm rounded-lg divide-y">
            <div class="px-4 py-4 sm:px-6">
                <p class="text-sm leading-5 text-gray-500">
                    {{ __('No presets yet.') }}
                </p>
            </div>
    </div>
    @else
        @foreach ($presets as $preset)
            @if ($preset->is($editing))
                <livewire:presets.edit-preset :preset="$preset">
            @else
{{--                <livewire:presets.show-preset :$preset>--}}
                <div class="mb-4 bg-white dark:bg-gray-300 shadow-sm rounded-lg divide-y">
                    <div class="px-4 py-4 sm:px-6">
                        <div class="p-6 flex space-x-2" wire:key="{{ $preset->id }}">
                            <img
                                src="{{asset('media/countries/'.$preset->country->name.'.png')}}"
                                alt="Flag of {{$preset->country->name}}" class="h-6 text-gray-600 scale-x-100"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            >
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-800">{{ $preset->name }}</span>
                                    </div>
                                    @if ($preset->user->is(auth()->user()))
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link wire:click="edit({{ $preset->id }})">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link wire:click="delete({{ $preset->id }})">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
</div>
