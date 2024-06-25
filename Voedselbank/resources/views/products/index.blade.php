<!DOCTYPE html>
<html>
<head>
    <title>Productenlijst</title>
</head>
<body>
    <h1>Productenlijst</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Allergie</th>
                <th>Categorie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->naam }}</td>
                    <td>{{ $product->allergie->name ?? 'Geen allergie' }}</td>
                    <td>{{ $product->categorie->name ?? 'Geen categorie' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <a href="{{ route('products.create') }}">Nieuw Product Toevoegen</a>
</body>
</html>
