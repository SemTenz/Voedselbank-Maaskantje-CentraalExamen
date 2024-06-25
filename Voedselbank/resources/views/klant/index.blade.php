<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>Telefoonnummer</th>
            <th>Email</th>
            <th>Aantal Volwassenen</th>
            <th>Aantal Kinderen</th>
            <th>Aantal Baby</th>
            <th>Voedselwensen</th>
            <th>Voedselpakket ID</th>
            <th>Adres ID</th>

        </tr>
    </thead>
    <tbody>
        @foreach($klant as $klant)
        <tr>
            <td>{{ $klant->naam }}</td>
            <td>{{ $klant->telefoonnummer }}</td>
            <td>{{ $klant->email }}</td>
            <td>{{ $klant->aantal_volwassenen }}</td>
            <td>{{ $klant->aantal_kinderen }}</td>
            <td>{{ $klant->aantal_baby }}</td>
            <td>{{ $klant->voedselwensen }}</td>
            <td>{{ $klant->voedselpakketId }}</td>
            <td>{{ $klant->adressId }}</td>
            <td><a href="{{ route('voedselpakket.create', $klant->id) }}">Add Voedselpakket</a></td>
        </tr>
        @endforeach
    </tbody>
</table>