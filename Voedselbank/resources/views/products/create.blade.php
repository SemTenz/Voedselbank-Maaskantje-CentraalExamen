<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
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

    <form action="/products" method="POST">
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

    <a href="/products">Terug naar Productenlijst</a>
</body>
</html>
