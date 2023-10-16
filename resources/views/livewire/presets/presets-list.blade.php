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
{{--            <livewire:presets.show-preset :$preset>--}}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
