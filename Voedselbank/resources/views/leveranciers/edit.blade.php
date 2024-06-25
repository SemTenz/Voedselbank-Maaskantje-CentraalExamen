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
                    <form action="{{ route('leveranciers.update', $leverancier->id) }}" method="POST"
                        id="leverancierForm">
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
                            <input type="tel" pattern="[0-9]*" minlength="8"
                                class="form-input mt-1 block w-full px-3 py-2 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="telefoonnummer" name="telefoonnummer" value="{{ $leverancier->telefoonnummer }}"
                                required title="Voer alleen numerieke waarden in (0-9), minimaal 8 cijfers">
                        </div>

                        <div class="mb-4">
                            <label for="eerstvolgende_levering"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Eerstvolgende
                                Levering</label>
                            <input type="datetime-local"
                                class="form-input mt-1 block w-full px-3 py-2 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="eerstvolgende_levering" name="eerstvolgende_levering"
                                value="{{ \Carbon\Carbon::parse($leverancier->eerstvolgende_levering)->format('Y-m-d\TH:i') }}"
                                required min="{{ now()->format('Y-m-d\TH:i') }}">
                        </div>

                        <div class="flex justify-between">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Opslaan
                            </button>

                            <button type="button"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                id="deleteButton">
                                Verwijderen
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-notification {
            position: fixed;
            top: 1rem;
            right: 1rem;
            background-color: #48BB78;
            color: #FFFFFF;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

        .custom-notification.show {
            display: block;
        }

        .custom-notification .close-btn {
            cursor: pointer;
            margin-left: 1rem;
            font-size: 1.2rem;
            font-weight: bold;
            color: #FFFFFF;
        }

        .delete-confirmation {
            background-color: #F56565;
            color: #FFFFFF;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .delete-confirmation.show {
            display: block;
        }

        .delete-confirmation h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .delete-confirmation button {
            margin-top: 1rem;
            background-color: #FFFFFF;
            color: #F56565;
            border: 1px solid #F56565;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .delete-confirmation button:hover {
            background-color: #F56565;
            color: #FFFFFF;
        }
    </style>

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

        // Event listener voor het versturen van het formulier
        const form = document.getElementById('leverancierForm');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            const formData = new FormData(form);
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });
                if (response.ok) {
                    showNotification('Leverancier succesvol opgeslagen!');
                    setTimeout(() => {
                        window.location.replace(
                            '{{ route('leveranciers.index') }}'); // Redirect naar overzichts pagina
                    }, 2000); // Redirect na 2 seconden
                } else {
                    showNotification('Er is een fout opgetreden bij het opslaan van de leverancier.', 'error');
                }
            } catch (error) {
                console.error('Fout bij het verwerken van de aanvraag:', error);
                showNotification('Er is een fout opgetreden bij het verwerken van de aanvraag.', 'error');
            }
        });

        // Event listener voor het verwijderen van de leverancier
        document.getElementById('deleteButton').addEventListener('click', function() {
            if (confirm(
                    'Weet je zeker dat je deze leverancier wilt verwijderen? Deze actie kan niet ongedaan worden gemaakt.'
                )) {
                const deleteForm = document.createElement('form');
                deleteForm.action = "{{ route('leveranciers.destroy', $leverancier->id) }}";
                deleteForm.method = 'POST';
                deleteForm.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(deleteForm);
                deleteForm.submit();
            }
        });

        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.classList.add('custom-notification');
            notification.textContent = message;
            const closeBtn = document.createElement('span');
            closeBtn.innerHTML = '&times;';
            closeBtn.classList.add('close-btn');
            closeBtn.addEventListener('click', function() {
                notification.remove();
            });
            notification.appendChild(closeBtn);

            // Voeg melding toe aan de DOM en laat het zien
            document.body.appendChild(notification);
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);

            // Verberg de melding na 5 seconden
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    notification.remove();
                }, 300); // Verwijder melding na animatie
            }, 5000); // Verberg na 5 seconden
        }
    </script>
</x-app-layout>
