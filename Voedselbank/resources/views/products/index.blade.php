<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productenlijst
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Productenlijst</h1>

                    @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    <div class="mb-4 flex items-center">
                        <form action="{{ route('products.index') }}" method="GET" class="flex">
                            <label for="barcode" class="mr-2">Filter op Streepjescode:</label>
                            <input type="text" id="barcode" name="barcode" value="{{ request('barcode') }}" class="border rounded py-1 px-2">
                            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                Zoeken
                            </button>
                        </form>
                        <a href="{{ route('products.create') }}" class="ml-auto bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded">
                            Nieuw Product
                        </a>
                    </div>

                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">
                                    <a href="{{ route('products.index', ['sort_by' => 'streepjescode', 'sort_order' => $sort_by == 'streepjescode' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">
                                        Streepjescode
                                        @if ($sort_by == 'streepjescode')
                                            @if ($sort_order == 'asc')
                                                <span>&uarr;</span>
                                            @else
                                                <span>&darr;</span>
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th class="px-4 py-2">
                                    <a href="{{ route('products.index', ['sort_by' => 'naam', 'sort_order' => $sort_by == 'naam' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">
                                        Productnaam
                                        @if ($sort_by == 'naam')
                                            @if ($sort_order == 'asc')
                                                <span>&uarr;</span>
                                            @else
                                                <span>&darr;</span>
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th class="px-4 py-2">
                                    <a href="{{ route('products.index', ['sort_by' => 'categorie_id', 'sort_order' => $sort_by == 'categorie_id' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">
                                        Categorie
                                        @if ($sort_by == 'categorie_id')
                                            @if ($sort_order == 'asc')
                                                <span>&uarr;</span>
                                            @else
                                                <span>&darr;</span>
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th class="px-4 py-2">
                                    <a href="{{ route('products.index', ['sort_by' => 'aantal', 'sort_order' => $sort_by == 'aantal' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">
                                        Aantal
                                        @if ($sort_by == 'aantal')
                                            @if ($sort_order == 'asc')
                                                <span>&uarr;</span>
                                            @else
                                                <span>&darr;</span>
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th class="px-4 py-2">Bewerken</th>
                                <th class="px-4 py-2">Verwijderen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $product->streepjescode }}</td>
                                <td class="border px-4 py-2">{{ $product->naam }}</td>
                                <td class="border px-4 py-2">
                                    @if ($product->categorie)
                                        {{ $product->categorie->name }}
                                    @else
                                        Geen categorie
                                    @endif
                                </td>
                                <td class="border px-4 py-2">{{ $product->aantal }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:underline">Bewerken</a>
                                </td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Verwijderen</button>
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
