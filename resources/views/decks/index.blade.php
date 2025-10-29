<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Beste Decks
        </h2>
    </x-slot>

    <div class="py-6 px-8">
        <h1 class="text-2xl font-bold text-white mb-4">Deck Overzicht</h1>

        {{-- Zoeken op character --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">
            <form x-ignore data-turbo="false" method="GET" action="{{ route('decks.index') }}" class="flex flex-col sm:flex-row gap-3 sm:items-end">
                <div class="flex-1">
                    <label for="character" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Zoek op character
                    </label>
                    <input
                        type="text"
                        id="character"
                        name="character"
                        value="{{ request('character') }}"
                        placeholder="Bijv. Hog Rider, Archer Queen…"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        autocomplete="off"
                    >
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                        Zoeken
                    </button>
                    @if (filled(request('character')))
                        <a href="{{ route('decks.index') }}" class="px-4 py-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600">
                            Reset
                        </a>
                    @endif
                </div>
            </form>

            @if (filled(request('character')))
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    Resultaten voor <span class="font-semibold">“{{ request('character') }}”</span>
                </p>
            @endif
        </div>

        @forelse($decks as $deck)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    <a href="{{ route('decks.show', $deck) }}" class="text-blue-600 hover:underline">
                        {{ $deck->title }}
                    </a>
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ $deck->description ?? 'Geen beschrijving' }}
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Gemiddelde Elixir: {{ $deck->avg_elixir ?? 'n.v.t.' }}
                </p>
                @if ($deck->core_minions)
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Kernkaarten: {{ $deck->core_minions }}
                    </p>
                @endif
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-400">
                @if (filled(request('character')))
                    Geen decks gevonden voor “{{ request('character') }}”.
                @else
                    Er zijn nog geen decks toegevoegd.
                @endif
            </p>
        @endforelse>

        <div class="mt-6 flex items-center gap-3">
            <a href="{{ route('decks.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Nieuw Deck
            </a>
        </div>
    </div>
</x-app-layout>
