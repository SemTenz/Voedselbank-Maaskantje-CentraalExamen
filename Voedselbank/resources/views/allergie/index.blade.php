<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-semibold">Allergies</h1>
                        <a href="{{ route('allergie.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Allergie</a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 mt-6">
                        <thead class="bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 bg-gray-700"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-200">
                            @foreach($allergies as $allergie)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-200">
                                    {{ $allergie->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm font-medium">
                                    <a href="{{ route('allergie.edit', $allergie->id) }}" class="text-indigo-300 hover:text-indigo-500">Edit</a>
                                    <form class="inline" action="{{ route('allergie.destroy', $allergie->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-600 ml-4">Delete</button>
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
</x-app-layout>