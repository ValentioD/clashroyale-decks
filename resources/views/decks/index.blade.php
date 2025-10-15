<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Beste Decks
        </h2>
    </x-slot>

    <div class="py-6 px-8">
        <h1 class="text-2xl font-bold mb-4">Deck Overzicht</h1>

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
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-400">Er zijn nog geen decks toegevoegd.</p>
        @endforelse

        <div class="mt-6">
            <a href="{{ route('decks.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Nieuw Deck
            </a>
        </div>
    </div>
</x-app-layout>
