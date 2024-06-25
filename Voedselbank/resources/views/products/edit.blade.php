<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bewerk Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Bewerk Product</h1>

                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="naam">Product Naam:</label>
                            <input type="text" id="naam" name="naam" value="{{ old('naam', $product->naam) }}">
                        </div>
                        <div>
                            <label for="allergie_id">Allergie:</label>
                            <select id="allergie_id" name="allergie_id">
                                <option value="">Selecteer Allergie</option>
                                @foreach($allergies as $allergie)
                                    <option value="{{ $allergie->id }}" {{ $product->allergie_id == $allergie->id ? 'selected' : '' }}>
                                        {{ $allergie->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="categorie_id">Categorie:</label>
                            <select id="categorie_id" name="categorie_id">
                                <option value="">Selecteer Categorie</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ $product->categorie_id == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit">Product Bijwerken</button>
                    </form>

                    <br>

                    <a href="{{ route('products.index') }}">Terug naar Productenlijst</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
