<x-overzicht-layout>
    <form action="{{ route('voedselpakket.update', $voedselpakket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="pakket_inhoud">Pakket inhoud</label>
        <input type="text" name="pakket_inhoud" id="pakket_inhoud" value="{{ $voedselpakket->pakket_inhoud }}" required>

        <label for="datum_uitgegeven">Datum uitgegeven</label>
        <input type="date" name="datum_uitgegeven" id="datum_uitgegeven" value="{{ $voedselpakket->datum_uitgegeven }}" required>

        <button type="submit">Update</button>
    </form>
</x-overzicht-layout>