<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Details van Leverancier
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                    <div class="text-white">
                        <!-- Leverancier details -->
                        <p><strong>Bedrijfsnaam:</strong> {{ $leverancier->bedrijfsnaam }}</p>
                        <p><strong>Adres:</strong> {{ $leverancier->adres }}</p>
                        <p><strong>Contactpersoon:</strong> {{ $leverancier->contactpersoon_naam }}</p>
                        <p><strong>E-mail:</strong> {{ $leverancier->contactpersoon_email }}</p>
                        <p><strong>Telefoonnummer:</strong> {{ $leverancier->telefoonnummer }}</p>
                        <p><strong>Eerstvolgende levering:</strong> {{ $leverancier->eerstvolgende_levering }}</p>
                    </div>

                    <div class="mt-4">
                        <!-- Bewerk knop -->
                        <a href="{{ route('leveranciers.edit', $leverancier->id) }}"
                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bewerk</a>

                        <!-- Verwijder knop (opent bevestigingsmodal) -->
                        <button type="button" id="deleteButton"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Verwijderen
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Verwijderingsbevestiging Modal -->
    <div class="confirm-delete" id="confirmDelete">
        <div class="confirm-delete-content">
            <!-- Tekst voor bevestigingsmodal -->
            <p>Weet je zeker dat je deze leverancier wilt verwijderen? Dit kan niet ongedaan worden gemaakt.</p>
            <div class="btn-container">
                <!-- Annuleren knop (sluit bevestigingsmodal) -->
                <button type="button" id="cancelDelete"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Annuleren
                </button>
                <!-- Verwijderen knop (verwijderactie uitvoeren) -->
                <button type="button" id="confirmDeleteButton"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Verwijderen
                </button>
            </div>
        </div>
    </div>

    <!-- Stijlen voor de bevestigingsmodal -->
    <style>
        .confirm-delete {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
            z-index: 1000;
            display: none;
            /* Initieel verborgen */
        }

        .confirm-delete-content {
            background-color: #1a202c;
            padding: 1.5rem;
            border-radius: 0.5rem;
        }

        .confirm-delete p {
            margin-bottom: 1rem;
            color: #cbd5e0;
        }

        .confirm-delete .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .confirm-delete button {
            margin: 0 0.5rem;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            border-radius: 0.25rem;
            outline: none;
        }

        .confirm-delete button:hover {
            opacity: 0.8;
        }
    </style>

    <!-- JavaScript voor het beheer van de bevestigingsmodal -->
    <script>
        const deleteButton = document.getElementById('deleteButton');
        const confirmDelete = document.getElementById('confirmDelete');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');

        // Event listener voor klik op Verwijderen knop
        deleteButton.addEventListener('click', function() {
            confirmDelete.style.display = 'block'; // Toon bevestigingsmodal
        });

        // Event listener voor klik op Annuleren knop in bevestigingsmodal
        cancelDelete.addEventListener('click', function() {
            confirmDelete.style.display = 'none'; // Verberg bevestigingsmodal
        });

        // Event listener voor klik op Verwijderen knop in bevestigingsmodal
        confirmDeleteButton.addEventListener('click', function() {
            // Maak een dynamisch formulier aan voor DELETE verzoek
            const deleteForm = document.createElement('form');
            deleteForm.action = "{{ route('leveranciers.destroy', $leverancier->id) }}"; // Formulieractie
            deleteForm.method = 'POST'; // Methode is POST
            deleteForm.innerHTML = `
                @csrf
                @method('DELETE') <!-- Laravel CSRF token en DELETE methode -->
            `;
            document.body.appendChild(deleteForm); // Voeg formulier toe aan body
            deleteForm.submit(); // Verzend het formulier (voert DELETE verzoek uit)
        });
    </script>
</x-app-layout>
