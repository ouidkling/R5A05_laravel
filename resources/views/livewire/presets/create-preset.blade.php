<form wire:submit="save">
    <h2 class="font-bold text-xl">{{ __('New preset') }}</h2>
    <select
        wire:model="country_id"
        class="mt-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        <option value="">-- Select Country --</option>
        @foreach ($countries as $country)
            <option value="{{$country->id}}">
                {{  ucwords(__($country->name)) }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('country_id')" class="mt-2" />

    <x-text-input
        wire:model="name"
        placeholder="{{ __('Preset name') }}"
        class="mt-4 w-full"
    ></x-text-input>

    <x-input-error :messages="$errors->get('name')" class="mt-2" />
    <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
</form>
