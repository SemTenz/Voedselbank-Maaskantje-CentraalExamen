<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Create Product</h1>

                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="flex flex-col">
                            <label for="naam" class="font-semibold">Product Naam:</label>
                            <input type="text" id="naam" name="naam" value="{{ old('naam') }}" class="border-gray-300 border-solid border py-2 px-3 rounded-md">
                        </div>
                        <div class="flex flex-col">
                            <label for="allergie_id" class="font-semibold">Allergie:</label>
                            <select id="allergie_id" name="allergie_id" class="border-gray-300 border-solid border py-2 px-3 rounded-md">
                                <option value="">Selecteer Allergie</option>
                                @foreach($allergies as $allergie)
                                <option value="{{ $allergie->id }}" {{ old('allergie_id') == $allergie->id ? 'selected' : '' }}>
                                    {{ $allergie->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="categorie_id" class="font-semibold">Categorie:</label>
                            <select id="categorie_id" name="categorie_id" class="border-gray-300 border-solid border py-2 px-3 rounded-md">
                                <option value="">Selecteer Categorie</option>
                                @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Verwijder de input voor streepjescode -->
                        <div class="flex flex-col">
                            <label for="aantal" class="font-semibold">Aantal:</label>
                            <input type="number" id="aantal" name="aantal" value="{{ old('aantal') }}" class="border-gray-300 border-solid border py-2 px-3 rounded-md">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                            Create Product
                        </button>
                    </form>

                    <div class="mt-4">
                        <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Terug naar Productenlijst</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
