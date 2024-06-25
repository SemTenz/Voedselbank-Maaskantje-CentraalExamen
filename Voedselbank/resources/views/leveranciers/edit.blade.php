<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Bewerk Leverancier
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                    <form action="{{ route('leveranciers.update', $leverancier->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="bedrijfsnaam"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Bedrijfsnaam</label>
                            <input type="text"
                                class="form-input mt-1 block w-full px-3 py-2 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="bedrijfsnaam" name="bedrijfsnaam" value="{{ $leverancier->bedrijfsnaam }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="adres"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Adres</label>
                            <input type="text"
                                class="form-input mt-1 block w-full px-3 py-2 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="adres" name="adres" value="{{ $leverancier->adres }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="contactpersoon_naam"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Naam
                                Contactpersoon</label>
                            <input type="text"
                                class="form-input mt-1 block w-full px-3 py-2 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="contactpersoon_naam" name="contactpersoon_naam"
                                value="{{ $leverancier->contactpersoon_naam }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="contactpersoon_email"
                                class="block text-sm font-medium text-gray-700 dark:text-white">E-mail
                                Contactpersoon</label>
                            <input type="email"
                                class="form-input mt-1 block w-full px-3 py-2 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="contactpersoon_email" name="contactpersoon_email"
                                value="{{ $leverancier->contactpersoon_email }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="telefoonnummer"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Telefoonnummer</label>
                            <input type="text"
                                class="form-input mt-1 block w-full px-3 py-2 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="telefoonnummer" name="telefoonnummer" value="{{ $leverancier->telefoonnummer }}"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="eerstvolgende_levering"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Eerstvolgende
                                Levering</label>
                            <input type="datetime-local"
                                class="form-input mt-1 block w-full px-3 py-2 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="eerstvolgende_levering" name="eerstvolgende_levering"
                                value="{{ $leverancier->eerstvolgende_levering }}" required>
                        </div>

                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Opslaan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
