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

        <div class="mt-6 flex items-center gap-4">
            <a href="{{ route('decks.index') }}"
               class="text-gray-700 dark:text-gray-300 hover:underline">
                ← Terug naar overzicht
            </a>

            {{-- Alleen eigenaar mag bewerken of verwijderen --}}
            @auth
                @if (auth()->id() === $deck->user_id)
                    <a href="{{ route('decks.edit', $deck) }}"
                       class="text-blue-600 dark:text-blue-400 hover:underline">
                         Bewerken
                    </a>

                    <form method="POST" action="{{ route('decks.destroy', $deck) }}" class="mt-4"
                          onsubmit="return confirm('Weet je zeker dat je dit deck wilt verwijderen?')">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="bg-red-600 hover:bg-red-700">
                            Verwijderen
                        </x-primary-button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</x-app-layout>
