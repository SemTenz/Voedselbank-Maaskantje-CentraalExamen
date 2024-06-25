<x-app-layout>
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    <div class="container mx-auto px-4 py-6">
        <form action="{{ route('voedselpakket.update', $klant->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="pakket_inhoud" class="block text-gray-700 text-sm font-bold mb-2">Pakket inhoud</label>
                <label for="datum_uitgegeven" class="block text-gray-700 text-sm font-bold mb-2">Datum uitgegeven</label>
                <input type="date" name="datum_uitgegeven" id="datum_uitgegeven" value="{{ $voedselpakketten[0]->datum_uitgegeven }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <input type="hidden" name="klant_id" value="{{ $klant->id }}">

            <div id="product-container" class="mb-4">
                @foreach ($voedselpakketten as $voedselpakket)
                <div class="product-row flex items-center mb-4">
                    <label for="products" class="block text-gray-700 text-sm font-bold mb-2 mr-2">Producten:</label>
                    <select name="products[]" class="product-select shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" required>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $product->id == $voedselpakket->product_id ? 'selected' : '' }}>{{ $product->naam }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantities[]" class="product-quantity shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Hoeveelheid" min="1" value="{{ $voedselpakket->quantity }}" required>
                    <button type="button" class="remove-product-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Verwijder</button>
                </div>
                @endforeach
            </div>
            <button type="button" id="add-product-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Voeg Product Toe</button>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var options = '@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->naam }}</option>@endforeach';

            // Add product row
            $('#add-product-btn').click(function() {
                let productRow = '<div class="product-row">' +
                    '<select name="products[]" class="product-select" required>' +
                    options +
                    '</select>' +
                    '<input type="number" name="quantities[]" class="product-quantity" placeholder="Hoeveelheid" min="1" required></input>' +
                    '<button type="button" class="remove-product-btn">Verwijder</button>' +
                    '</div>';

                $('#product-container').append(productRow);
            });

            // Remove product row
            $(document).on('click', '.remove-product-btn', function() {
                $(this).closest('.product-row').remove();
            });
        });
    </script>
</x-app-layout>