<x-app-layout>
    <h2>Edit VoedselPakket</h2>

    <form action="{{ route('voedselpakket.update', $voedselpakket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="datum_uitgegeven">Datum uitgegeven</label>
        <input type="date" name="datum_uitgegeven" id="datum_uitgegeven" value="{{ $voedselpakketten->datum_uitgegeven->format('d-m-y') }}" required>

        <input type="hidden" name="klant_id" value="{{ $klant->id }}">

        <div id="product-container">
            @foreach ($klant->voedselpakketten as $voedselpakket)
            <div class="product-row">
                <label for="products">Producten:</label>
                <br>
                <select name="products[]" class="product-select" required>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $voedselpakket->product_id == $product->id ? 'selected' : '' }}>{{ $product->naam }}</option>
                    @endforeach
                </select>
                <input type="number" name="quantities[]" class="product-quantity" placeholder="Hoeveelheid" min="1" value="{{ $voedselpakket->quantity }}" required>
            </div>
            @endforeach
        </div>

        <button type="submit">Update VoedselPakket</button>
    </form>
</x-app-layout>