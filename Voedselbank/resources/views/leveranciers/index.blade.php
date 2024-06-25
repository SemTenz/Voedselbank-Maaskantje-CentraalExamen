<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Lijst van Leveranciers
        </h2>
    </x-slot>

    <div class="py-14">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Bedrijfsnaam
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Adres
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Contactpersoon
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        E-mail
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Telefoonnummer
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Eerstvolgende Levering
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Acties
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                                @foreach ($leveranciers as $leverancier)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $leverancier->bedrijfsnaam }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $leverancier->adres }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $leverancier->contactpersoon_naam }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $leverancier->contactpersoon_email }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $leverancier->telefoonnummer }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $leverancier->eerstvolgende_levering }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
                                            <a href="{{ route('leveranciers.show', $leverancier->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 dark:text-blue-400 dark:hover:text-blue-600">Bekijk</a>
                                            <a href="{{ route('leveranciers.edit', $leverancier->id) }}"
                                                class="text-blue-600 hover:text-blue-900 dark:text-yellow-400 dark:hover:text-yellow-600">Bewerk</a>
                                            <form action="{{ route('leveranciers.destroy', $leverancier->id) }}"
                                                method="POST" style="display: inline;"
                                                onsubmit="return showConfirmDelete(event, '{{ route('leveranciers.destroy', $leverancier->id) }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600">Verwijder</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{ route('leveranciers.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Nieuwe leverancier toevoegen
                </a>
            </div>
        </div>
    </div>

    <div class="confirm-delete" id="confirmDelete">
        <div class="confirm-delete-content">
            <p>Weet je zeker dat je deze leverancier wilt verwijderen?</p>
            <div class="btn-container">
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 text-white hover:bg-red-700 px-4 py-2 rounded">Verwijderen</button>
                </form>
                <button type="button" onclick="closeConfirmDelete()"
                    class="bg-gray-500 text-white hover:bg-gray-700 px-4 py-2 rounded">Annuleren</button>
            </div>
        </div>
    </div>

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

    <script>
        function showConfirmDelete(event, formAction) {
            event.preventDefault();
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = formAction;
            document.getElementById('confirmDelete').style.display = 'block';
        }

        function closeConfirmDelete() {
            document.getElementById('confirmDelete').style.display = 'none';
        }
    </script>
</x-app-layout>
