<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-semibold">Allergenen</h1>
                        <a href="{{ route('allergie.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Allergie toevoegen</a>
                    </div>
                    <!-- Filter form -->
                    <form action="{{ route('allergie.index') }}" method="GET" class="flex items-center justify-between text-sm font-semibold my-4">
                        <div class="flex flex-col">
                            <input type="text" name="name" placeholder="Zoek allergie..." class="px-4 py-2 border rounded text-black">
                            <!-- Error message -->
                            @if ($errors->has('name'))
                                <div class="mt-2 p-2 bg-red-100 text-red-700 border border-red-400 rounded">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                        <!-- Include hidden inputs for sorting if needed -->
                        <input type="hidden" name="sort_by" value="{{ request()->input('sort_by') }}">
                        <input type="hidden" name="sort_order" value="{{ request()->input('sort_order') == 'asc' }}">
                        <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Zoeken</button>
                    </form>
                    <table class="min-w-full divide-y divide-gray-200 mt-6">
                        <thead class="bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider bg-gray-700">
                                    Naam
                                </th>
                                <th class="px-6 py-3 bg-gray-700"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800">
                            @foreach($allergies as $allergie)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-200">
                                    {{ $allergie->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm font-medium">
                                    <a href="{{ route('allergie.edit', $allergie->id) }}" class="text-indigo-300 hover:text-indigo-500">Wijzig</a>
                                    <form class="inline" action="{{ route('allergie.destroy', $allergie->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-600 ml-4">Verwijder</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($searchMessage))
<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 6a1 1 0 011-1h.5a.5.5 0 010 1h-.5a1 1 0 01-1-1zm1 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm leading-5 font-medium">
                {{ $searchMessage }}
            </p>
        </div>
    </div>
</div>
@endif
</x-app-layout>