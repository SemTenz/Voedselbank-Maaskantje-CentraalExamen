<x-app-layout>
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    <form action="{{ route('voedselpakket.store') }}" method="POST">
        @csrf
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <label for="pakket_inhoud">Pakket inhoud</label>
        <label for="datum_uitgegeven">Datum uitgegeven</label>
        <input type="date" name="datum_uitgegeven" id="datum_uitgegeven" required>
        <input type="hidden" name="klant_id" value="{{ $klant->id }}">

        <div id="product-container">
            <div class="product-row">
                <label for="products">Producten:</label>
                <br>
                <select name="products[]" class="product-select" required>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->naam }}</option>
                    @endforeach
                </select>
                <input type="number" name="quantities[]" class="product-quantity" placeholder="Hoeveelheid" min="1" required>
                <button type="button" class="remove-product-btn">Verwijder</button>
            </div>
        </div>
        <button type="button" id="add-product-btn">Voeg Product Toe</button>
        <button type="submit">Create</button>
    </form>
    <script>
        $(document).ready(function() {
            $('#add-product-btn').click(function() {
                let productRow = `
                    <div class="product-row">
                        <select name="products[]" class="product-select" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->naam }}</option>
                            @endforeach
                        </select>
                        <input type="number" name="quantities[]" class="product-quantity" placeholder="Hoeveelheid" min="1" required>
                        <button type="button" class="remove-product-btn">Verwijder</button>
                    </div>
                `;
                $('#product-container').append(productRow);
            });

            $(document).on('click', '.remove-product-btn', function() {
                $(this).closest('.product-row').remove();
            });
        });
    </script>
</x-app-layout>