<x-app-layout>
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    <form action="{{ route('voedselpakket.update', $voedselpakket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <label for="pakket_inhoud">Pakket inhoud</label>
        <label for="datum_uitgegeven">Datum uitgegeven</label>
        <input type="date" name="datum_uitgegeven" id="datum_uitgegeven" value="{{ $voedselpakket->datum_uitgegeven }}" required>
        <input type="hidden" name="klant_id" value="{{ $klant->id }}">

        <div id="product-container">
            @foreach ($voedselpakket->products as $product)
            <div class="product-row">
                <label for="products">Producten:</label>
                <br>
                <select name="products[]" class="product-select" required>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $product->id ? 'selected' : '' }}>{{ $product->naam }}</option>
                    @endforeach
                </select>
                <input type="number" name="quantities[]" class="product-quantity" placeholder="Hoeveelheid" min="1" value="{{ $product->quantity }}" required>
                <button type="button" class="remove-product-btn">Verwijder</button>
            </div>
            @endforeach
        </div>
        <button type="button" id="add-product-btn">Voeg Product Toe</button>
        <button type="submit">Update</button>
    </form>
    <script>
        $(document).ready(function() {
            var options = '@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->naam }}</option>@endforeach';

            $('#add-product-btn').click(function() {
                let productRow = '<div class="product-row">' +
                    '<select name="products[]" class="product-select" required>' +
                    options +
                    '</select>' +
                    '<input type="number" name="quantities[]" class="product-quantity" placeholder="Hoeveelheid" min="1" required></input>' +
                    '<button type="button" class="remove-product-btn">Verwijder</button>' +
                    '</div>';

                $('.product-row').last().after(productRow);
            });
        });
    </script>
</x-app-layout>