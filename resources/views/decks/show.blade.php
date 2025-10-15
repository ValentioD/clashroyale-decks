<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $deck->title }}
        </h2>
    </x-slot>

    <div class="py-6 px-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <p class="text-gray-700 dark:text-gray-300 mb-2">
                <strong>Beschrijving:</strong> {{ $deck->description ?? 'Geen beschrijving' }}
            </p>
            <p class="text-gray-700 dark:text-gray-300 mb-2">
                <strong>Gemiddelde Elixir:</strong> {{ $deck->avg_elixir ?? 'n.v.t.' }}
            </p>
            <p class="text-gray-700 dark:text-gray-300 mb-2">
                <strong>Kernkaarten:</strong> {{ $deck->core_minions ?? 'n.v.t.' }}
            </p>
            <p class="text-gray-700 dark:text-gray-300">
                <strong>Openbaar:</strong> {{ $deck->is_public ? 'Ja' : 'Nee' }}
            </p>
        </div>

        <div class="mt-6">
            <a href="{{ route('decks.index') }}"
               class= "text-gray-700 dark:text-gray-300 hover:underline">
                ← Terug naar overzicht
            </a>
        </div>
    </div>
</x-app-layout>
