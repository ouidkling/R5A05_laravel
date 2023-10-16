<div>
    <form wire:submit="search">
        <select
            wire:model="country_id"
            class="mt-4 border-gray-300 dark:border-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            @foreach ($countries as $country)
                <option value="{{$country->id}}">
                    {{  ucwords(__($country->name)) }}
                </option>
            @endforeach
        </select>
        <input type="text" wire:model="query">

        <button type="submit" class="dark:text-white">Search posts</button>
    </form>

    <div>
        @foreach ($vehicles as $vehicle)
{{--            <livewire:vehicles.show-vehicle :vehicle="$vehicle">--}}
            <a href="{{ url($vehicle->wiki_page) }}" class="flex scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $vehicle->name }}</h2>
                    <div class="flex-1">
                        <img class="flex justify-end items-end" src="{{ url($vehicle->thumbnail_img_url) }}" alt="Picture of the {{ $vehicle->name }}">
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    {{ $vehicles->links() }}
</div>
