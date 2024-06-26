<x-app-layout>
    <h2 class="text-gray-700 text-lg font-bold mb-2">VoedselPakket Details</h2>

    @if ($klant->voedselpakketten->isNotEmpty())
    @foreach ($klant->voedselpakketten as $voedselpakket)
    <p class="text-gray-700 text-sm font-bold mb-2">Product: {{ $voedselpakket->products->naam }}</p>
    <p class="text-gray-700 text-sm font-bold mb-2">Hoeveelheid: {{ $voedselpakket->quantity }}</p>
    @endforeach
    <p class="text-gray-700 text-sm font-bold mb-2">Datum Uitgifte: {{ $voedselpakket->datumUitgifte }}</p>
    <p class="text-gray-700 text-sm font-bold mb-2">Datum Samenstelling: {{ $voedselpakket->datumSamenstelling }}</p>
    @else
    <p class="text-gray-700 text-sm font-bold mb-2">This klant does not have a voedselpakket.</p>
    @endif

    <a href="{{ route('voedselpakket.edit', $klant->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
</x-app-layout>