<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Nieuwe Leverancier Toevoegen
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="w-full sm:w-2/3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600">
                    <form action="{{ route('leveranciers.store') }}" method="POST" id="leverancierForm">
                        @csrf

                        <div class="mb-4">
                            <label for="bedrijfsnaam"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Bedrijfsnaam</label>
                            <input type="text"
                                class="form-input mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="bedrijfsnaam" name="bedrijfsnaam" required>
                        </div>

                        <div class="mb-4">
                            <label for="adres"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Adres</label>
                            <input type="text"
                                class="form-input mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="adres" name="adres" required>
                        </div>

                        <div class="mb-4">
                            <label for="contactpersoon_naam"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Naam
                                Contactpersoon</label>
                            <input type="text"
                                class="form-input mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="contactpersoon_naam" name="contactpersoon_naam" required>
                        </div>

                        <div class="mb-4">
                            <label for="contactpersoon_email"
                                class="block text-sm font-medium text-gray-700 dark:text-white">E-mail
                                Contactpersoon</label>
                            <input type="email"
                                class="form-input mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="contactpersoon_email" name="contactpersoon_email" required>
                        </div>

                        <div class="mb-4">
                            <label for="telefoonnummer"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Telefoonnummer</label>
                            <input type="tel" pattern="[0-9]*" minlength="8"
                                class="form-input mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="telefoonnummer" name="telefoonnummer" required
                                title="Voer alleen numerieke waarden in (0-9), minimaal 8 cijfers">
                        </div>

                        <div class="mb-4">
                            <label for="eerstvolgende_levering"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Eerstvolgende
                                Levering</label>
                            <input type="datetime-local"
                                class="form-input mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="eerstvolgende_levering" name="eerstvolgende_levering" required
                                min="{{ now()->format('Y-m-d\TH:i') }}">
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

    <script>
        // JavaScript om de minimale waarde van eerstvolgende_levering in te stellen op huidige datum en tijd
        document.getElementById('eerstvolgende_levering').min = new Date().toISOString().slice(0, 16);

        // JavaScript voor het valideren van telefoonnummer lengte
        document.getElementById('leverancierForm').addEventListener('submit', function(event) {
            const telefoonnummerInput = document.getElementById('telefoonnummer');
            const telefoonnummer = telefoonnummerInput.value.trim();

            // Controleer minimale lengte (hier 8 cijfers)
            if (telefoonnummer.length < 8) {
                // Voorkom dat het formulier wordt verzonden
                event.preventDefault();
                // Geef een melding aan de gebruiker
                telefoonnummerInput.setCustomValidity('Voer minimaal 8 cijfers in voor het telefoonnummer.');
            } else {
                // Reset de validatie naar standaard
                telefoonnummerInput.setCustomValidity('');
            }
        });
    </script>
</x-app-layout>
