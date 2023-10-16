<div>
    <div class="mb-4 bg-white dark:bg-gray-300 shadow-sm rounded-lg divide-y">
        <div class="px-4 py-4 sm:px-6">
            <form wire:submit="update">
                <div class="p-6 flex space-x-2" wire:key="{{ $preset?->id }}">
                    <img
                        src="{{asset('media/countries/'.$preset?->country->name.'.png')}}"
                        alt="Flag of {{$preset?->country->name}}" class="h-9 text-gray-600 scale-x-100"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                    >
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <x-text-input
                                    wire:model="name"
                                    placeholder="{{ __('Preset name') }}"
                                    class="w-full"
                                ></x-text-input>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <x-primary-button class="mt-4 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:active:bg-gray-900 dark:focus:ring-indigo-500 dark:focus:ring-offset-2">{{ __('Save') }}</x-primary-button>
                <button class="mt-4 ml-4 text-red-800" wire:click.prevent="cancel">{{ __('Cancel') }}</button>
            </form>
        </div>
    </div>
</div>
