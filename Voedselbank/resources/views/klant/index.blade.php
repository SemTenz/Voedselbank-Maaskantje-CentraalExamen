<<<<<<< HEAD
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
=======
<x-app-layout>
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Naam
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Telefoonnummer
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aantal Volwassenen
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aantal Kinderen
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aantal Baby
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Voedselwensen
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($klant as $klant)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{ route('klant.show', $klant->id) }}" class="text-blue-500 hover:text-blue-800">
                                        {{ $klant->naam }}
                                    </a>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $klant->telefoonnummer }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $klant->email }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $klant->aantal_volwassenen }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $klant->aantal_kinderen }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $klant->aantal_baby }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $klant->voedselwensen }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($klant->voedselpakketten->first())
                                    <form action="{{ route('voedselpakket.destroy', $klant->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-800">Delete Voedselpakket</button>
                                    </form>
                                    @else
                                    <p>This klant does not have a voedselpakket.</p>
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{ route('voedselpakket.create', $klant->id) }}" class="text-blue-500 hover:text-blue-800">Add Voedselpakket</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
>>>>>>> afabb191dcf0db1a09dd96c309fe3bc1d24cea6c
