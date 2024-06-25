<x-app-layout>

    <h1>Details van Leverancier</h1>

    <p><strong>Bedrijfsnaam:</strong> {{ $leverancier->bedrijfsnaam }}</p>
    <p><strong>Adres:</strong> {{ $leverancier->adres }}</p>
    <p><strong>Contactpersoon:</strong> {{ $leverancier->contactpersoon_naam }}</p>
    <p><strong>E-mail:</strong> {{ $leverancier->contactpersoon_email }}</p>
    <p><strong>Telefoonnummer:</strong> {{ $leverancier->telefoonnummer }}</p>
    <p><strong>Eerstvolgende levering:</strong> {{ $leverancier->eerstvolgende_levering }}</p>

    <a href="{{ route('leveranciers.edit', $leverancier->id) }}" class="btn btn-primary">Bewerk</a>
    <!-- Verwijderen moet een form-submit zijn vanwege de DELETE HTTP-methode -->
    <form action="{{ route('leveranciers.destroy', $leverancier->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Verwijder</button>
    </form>
</x-app-layout>
