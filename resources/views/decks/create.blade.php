<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nieuw Deck Aanmaken
        </h2>
    </x-slot>

    <div class="py-6 px-8">
        <form method="POST" action="{{ route('decks.store') }}" class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titel</label>
                <input type="text" id="title" name="title"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Beschrijving</label>
                <textarea id="description" name="description" rows="3"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required></textarea>
            </div>

            <div>
                <label for="avg_elixir" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gemiddelde Elixir</label>
                <input type="number" id="avg_elixir" name="avg_elixir" step="0.1" min="0" max="9.9"
                       placeholder="Bijv. 3,1/5,1/7,9"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="core_minions" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kernkaarten</label>
                <input type="text" id="core_minions" name="core_minions"
                       placeholder="Bijv. Hog Rider, Fireball, Ice Spirit"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_public" name="is_public" value="1" checked
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label for="is_public" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                    Openbaar deck
                </label>
            </div>

            <div>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                    Opslaan
                </button>
                <a href="{{ route('decks.index') }}" class="ml-3 text-blue-600 hover:underline">
                    Annuleren
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
