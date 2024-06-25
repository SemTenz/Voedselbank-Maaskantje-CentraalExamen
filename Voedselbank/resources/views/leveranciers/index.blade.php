<x-app-layout>

    <h1>Lijst van Leveranciers</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Bedrijfsnaam</th>
                <th>Adres</th>
                <th>Contactpersoon</th>
                <th>E-mail</th>
                <th>Telefoonnummer</th>
                <th>Eerstvolgende Levering</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leveranciers as $leverancier)
                <tr>
                    <td>{{ $leverancier->bedrijfsnaam }}</td>
                    <td>{{ $leverancier->adres }}</td>
                    <td>{{ $leverancier->contactpersoon_naam }}</td>
                    <td>{{ $leverancier->contactpersoon_email }}</td>
                    <td>{{ $leverancier->telefoonnummer }}</td>
                    <td>{{ $leverancier->eerstvolgende_levering }}</td>
                    <td>
                        <a href="{{ route('leveranciers.show', $leverancier->id) }}" class="btn btn-info">Bekijk</a>
                        <a href="{{ route('leveranciers.edit', $leverancier->id) }}" class="btn btn-primary">Bewerk</a>
                        <!-- Verwijderen moet een form-submit zijn vanwege de DELETE HTTP-methode -->
                        <form action="{{ route('leveranciers.destroy', $leverancier->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
