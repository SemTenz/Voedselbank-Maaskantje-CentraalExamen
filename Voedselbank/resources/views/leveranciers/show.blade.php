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
                        <p><strong>Bedrijfsnaam:</strong> {{ $leverancier->bedrijfsnaam }}</p>
                        <p><strong>Adres:</strong> {{ $leverancier->adres }}</p>
                        <p><strong>Contactpersoon:</strong> {{ $leverancier->contactpersoon_naam }}</p>
                        <p><strong>E-mail:</strong> {{ $leverancier->contactpersoon_email }}</p>
                        <p><strong>Telefoonnummer:</strong> {{ $leverancier->telefoonnummer }}</p>
                        <p><strong>Eerstvolgende levering:</strong> {{ $leverancier->eerstvolgende_levering }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('leveranciers.edit', $leverancier->id) }}"
                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bewerk</a>

                        <form action="{{ route('leveranciers.destroy', $leverancier->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Verwijder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
