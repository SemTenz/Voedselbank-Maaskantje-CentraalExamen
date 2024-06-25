<x-overzicht-layout>
    <form action="{{ route('voedselpakket.store') }}" method="POST">
        @csrf

        <label for="pakket_inhoud">Pakket inhoud</label>
        <label for="datum_uitgegeven">Datum uitgegeven</label>
        <input type="date" name="datum_uitgegeven" id="datum_uitgegeven" required>


        <button type="submit">Create</button>
    </form>

</x-overzicht-layout>