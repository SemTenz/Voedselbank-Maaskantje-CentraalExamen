<x-overzicht-layout>
    <h1>Producten</h1>

    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    <table>
        <th>
        <td>pakket inhoud</td>
        <td>datum gemaakt</td>
        <td>datum uitgegeven</td>

        <td>edit </td>
        <td>delete </td>

        </th>
        <tr>
            @foreach($voedselpakketten as $voedselpakket)
        <tr>
            <td>test</td>
            <td>test</td>
            <td>{{ $voedselpakket->datumSamenstelling }}</td>
            <td>{{ $voedselpakket->datumUitgifte }}</td>



            <td><a href="{{ route('voedselpakket.edit', $voedselpakket->id) }}">Edit</a></td>

            <td>
                <form action="{{ route('voedselpakket.destroy', $voedselpakket->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tr>
    </table>
</x-overzicht-layout>