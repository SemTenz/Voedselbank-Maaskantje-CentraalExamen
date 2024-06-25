<!-- products/index.blade.php -->

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
                    <h1 class="text-2xl font-bold mb-4">Productenlijst</h1>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Succes</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="mb-4 flex items-center">
                        <form action="{{ route('products.index') }}" method="GET" class="flex">
                            <label for="barcode" class="mr-2 text-gray-700">Filter op Streepjescode:</label>
                            <input type="text" id="barcode" name="barcode" value="{{ request('barcode') }}" class="border rounded py-1 px-2">
                            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                Zoeken
                            </button>
                        </form>
                        <a href="{{ route('products.create') }}" class="ml-auto bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded">
                            Nieuw Product
                        </a>
                    </div>

                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="px-4 py-3"> <!-- Streepjescode -->
                                    <a href="{{ route('products.index', ['sort_by' => 'streepjescode', 'sort_order' => $sort_by == 'streepjescode' && $sort_order == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center justify-between text-sm font-semibold">
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
                                <th class="px-4 py-3"> <!-- Productnaam -->
                                    <a href="{{ route('products.index', ['sort_by' => 'naam', 'sort_order' => $sort_by == 'naam' && $sort_order == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center justify-between text-sm font-semibold">
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
                                <th class="px-4 py-3"> <!-- Categorie -->
                                    <a href="{{ route('products.index', ['sort_by' => 'categorie_id', 'sort_order' => $sort_by == 'categorie_id' && $sort_order == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center justify-between text-sm font-semibold">
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
                                <th class="px-4 py-3"> <!-- Aantal -->
                                    <a href="{{ route('products.index', ['sort_by' => 'aantal', 'sort_order' => $sort_by == 'aantal' && $sort_order == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center justify-between text-sm font-semibold">
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
                                <th class="px-4 py-3">Bewerken</th>
                                <th class="px-4 py-3">Verwijderen</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-4 py-3">{{ $product->streepjescode }}</td>
                                    <td class="px-4 py-3">{{ $product->naam }}</td>
                                    <td class="px-4 py-3">
                                        @if ($product->categorie)
                                            {{ $product->categorie->name }}
                                        @else
                                            Geen categorie
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $product->aantal }}</td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:underline">Bewerken</a>
                                    </td>
                                    <td class="px-4 py-3">
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

                    <!-- Voeg paginering links toe -->
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
