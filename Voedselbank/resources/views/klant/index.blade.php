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


        </tr>
    </thead>
    <tbody>
        @foreach($klant as $klant)
        <tr>
            <td><a href="{{ route('klant.show', $klant->id) }}">{{ $klant->naam }}</a></td>
            <td>{{ $klant->telefoonnummer }}</td>
            <td>{{ $klant->email }}</td>
            <td>{{ $klant->aantal_volwassenen }}</td>
            <td>{{ $klant->aantal_kinderen }}</td>
            <td>{{ $klant->aantal_baby }}</td>
            <td>{{ $klant->voedselwensen }}</td>


            <td>
                @if ($klant->voedselpakketten->first())
                <form action="{{ route('voedselpakket.destroy', $klant->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Voedselpakket</button>
                </form>
                @else
                <p>This klant does not have a voedselpakket.</p>
                @endif
            </td>
            <td><a href="{{ route('voedselpakket.create', $klant->id) }}">Add Voedselpakket</a></td>
        </tr>
        @endforeach
    </tbody>
</table>