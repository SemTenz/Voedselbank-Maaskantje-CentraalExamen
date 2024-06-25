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
                    <h1>Create Product</h1>

                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="naam">Product Naam:</label>
                            <input type="text" id="naam" name="naam" value="{{ old('naam') }}">
                        </div>
                        <div>
                            <label for="allergie_id">Allergie:</label>
                            <select id="allergie_id" name="allergie_id">
                                <option value="">Selecteer Allergie</option>
                                @foreach($allergies as $allergie)
                                    <option value="{{ $allergie->id }}" {{ old('allergie_id') == $allergie->id ? 'selected' : '' }}>
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
                                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit">Create Product</button>
                    </form>

                    <br>

                    <a href="{{ route('products.index') }}">Terug naar Productenlijst</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
