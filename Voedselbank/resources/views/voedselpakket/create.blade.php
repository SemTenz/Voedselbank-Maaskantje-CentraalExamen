<x-app-layout>
    <form action="{{ route('voedselpakket.store') }}" method="POST" class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
        @csrf
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <div class="mb-4">
            <label for="pakket_inhoud" class="block text-gray-700 text-sm font-bold mb-2">Pakket inhoud</label>
            <label for="datum_uitgegeven" class="block text-gray-700 text-sm font-bold mb-2">Datum uitgegeven</label>
            <input type="date" name="datum_uitgegeven" id="datum_uitgegeven" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <input type="hidden" name="klant_id" value="{{ $klant->id }}">

        <div id="product-container" class="space-y-4">
            <div class="product-row flex items-center space-x-3">
                <div class="flex-1">
                    <label for="products" class="block text-gray-700 text-sm font-bold mb-2">Producten:</label>
                    <select name="products[]" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->naam }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="number" name="quantities[]" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Hoeveelheid" min="1" required>
                <button type="button" class="remove-product-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Verwijder</button>
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            <button type="button" id="add-product-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Voeg Product Toe</button>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            var options = '@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->naam }}</option>@endforeach';

            // Add product row
            $('#add-product-btn').click(function() {
                let productRow = 
                `<div class="product-row flex items-center space-x-3">
                    <div class="flex-1">
                        <select name="products[]" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                            ${options}
                        </select>
                    </div>
                    <input type="number" name="quantities[]" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Hoeveelheid" min="1" required>
                    <button type="button" class="remove-product-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Verwijder</button>
                </div>`;

                $('#product-container').append(productRow);
            });

            // Remove product row
            $(document).on('click', '.remove-product-btn', function() {
                $(this).closest('.product-row').remove();
            });
        });
    </script>
</x-app-layout>