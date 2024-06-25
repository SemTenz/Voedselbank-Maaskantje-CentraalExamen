<x-app-layout>
    <h2>VoedselPakket Details</h2>

    @if ($klant->voedselpakketten->isNotEmpty())
    @foreach ($klant->voedselpakketten as $voedselpakket)
    <p>Product: {{ $voedselpakket->products->naam }}</p>
    <p>Hoeveelheid: {{ $voedselpakket->quantity }}</p>

    @endforeach
    <p>Datum Uitgifte: {{ $voedselpakket->datumUitgifte }}</p>
    <p>Datum Samenstelling: {{ $voedselpakket->datumSamenstelling }}</p>
    @else
    <p>This klant does not have a voedselpakket.</p>
    @endif
</x-app-layout>