<?php

use App\Models\Country;

?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form wire:submit="save">
                    <h2 class="font-bold text-xl">{{ __('New preset') }}</h2>
                    <select
                        id="country-dropdown"
                        wire:model="country_id"
                        class="mt-4 text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">-- Select Country --</option>
                        @foreach (Country::all() as $country)
                            <option value="{{$country->id}}">
                                {{  ucwords(__($country->name)) }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <textarea
                        id="name-input"
                        wire:model="name"
                        placeholder="{{ __('Preset name') }}"
                        class="mt-4 w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    ></textarea>

                    <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
                    <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
