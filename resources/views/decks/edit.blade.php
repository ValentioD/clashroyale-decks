<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Deck bewerken: {{ $deck->title }}
        </h2>
    </x-slot>

    <div class="py-6 px-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">

            @if ($errors->any())
                <div class="mb-4 rounded bg-red-50 dark:bg-red-900/30 border border-red-300 dark:border-red-700 p-3 text-red-800 dark:text-red-200">
                    <div class="font-semibold mb-1">Er zijn fouten gevonden:</div>
                    <ul class="list-disc ms-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form data-turbo="false" method="POST" action="{{ route('decks.update', $deck) }}">
                @csrf
                @method('PUT')

                {{-- Titel --}}
                <div>
                    <x-input-label for="title" :value="__('Titel')" />
                    <x-text-input
                        id="title"
                        name="title"
                        type="text"
                        class="block mt-1 w-full"
                        :value="old('title', $deck->title)"
                        required
                        autofocus
                    />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                {{-- Beschrijving --}}
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Beschrijving')" />
                    <textarea
                        id="description"
                        name="description"
                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                        rows="4"
                    >{{ old('description', $deck->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                {{-- Gemiddelde Elixir --}}
                <div class="mt-4">
                    <x-input-label for="avg_elixir" :value="__('Gemiddelde Elixir')" />
                    <x-text-input
                        id="avg_elixir"
                        name="avg_elixir"
                        type="number"
                        step="0.1"
                        class="block mt-1 w-full"
                        :value="old('avg_elixir', $deck->avg_elixir)"
                    />
                    <x-input-error :messages="$errors->get('avg_elixir')" class="mt-2" />
                </div>

                {{-- Kernkaarten --}}
                <div class="mt-4">
                    <x-input-label for="core_minions" :value="__('Kernkaarten')" />
                    <x-text-input
                        id="core_minions"
                        name="core_minions"
                        type="text"
                        class="block mt-1 w-full"
                        :value="old('core_minions', $deck->core_minions)"
                        placeholder="Bijv. Hog Rider, Fireball, Cannon…"
                    />
                    <x-input-error :messages="$errors->get('core_minions')" class="mt-2" />
                </div>

                {{-- Openbaar --}}
                <div class="mt-4 flex items-center">
                    <input type="hidden" name="is_public" value="0">
                    <input
                        id="is_public"
                        name="is_public"
                        type="checkbox"
                        value="1"
                        class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        {{ old('is_public', (int) $deck->is_public) ? 'checked' : '' }}
                    >
                    <label for="is_public" class="ms-2 text-sm text-gray-700 dark:text-gray-300">
                        Dit deck is openbaar
                    </label>
                </div>

                <div class="mt-6 flex items-center gap-3">
                    <x-primary-button type="submit">
                        {{ __('Opslaan') }}
                    </x-primary-button>

                    <a href="{{ route('decks.show', $deck) }}"
                       class="text-gray-600 dark:text-gray-300 hover:underline">
                        Annuleren
                    </a>
                </div>
            </form>
        </div>

        @auth
            @if (auth()->id() === $deck->user_id)
                <form method="POST" action="{{ route('decks.destroy', $deck) }}" class="mt-4"
                      onsubmit="return confirm('Weet je zeker dat je dit deck wilt verwijderen?')">
                    @csrf
                    @method('DELETE')
                    <x-primary-button type="submit" class="bg-red-600 hover:bg-red-700">
                        Verwijderen
                    </x-primary-button>
                </form>
            @endif
        @endauth

        <div class="mt-6">
            <a href="{{ route('decks.index') }}"
               class="text-gray-700 dark:text-gray-300 hover:underline">
                ← Terug naar overzicht
            </a>
        </div>
    </div>
</x-app-layout>
