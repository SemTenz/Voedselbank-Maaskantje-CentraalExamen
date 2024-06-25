<x-app-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bewerk Leverancier</div>

                    <div class="card-body">
                        <form action="{{ route('leveranciers.update', $leverancier->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="bedrijfsnaam">Bedrijfsnaam</label>
                                <input type="text" class="form-control" id="bedrijfsnaam" name="bedrijfsnaam"
                                    value="{{ $leverancier->bedrijfsnaam }}" required>
                            </div>

                            <div class="form-group">
                                <label for="adres">Adres</label>
                                <input type="text" class="form-control" id="adres" name="adres"
                                    value="{{ $leverancier->adres }}" required>
                            </div>

                            <div class="form-group">
                                <label for="contactpersoon_naam">Naam Contactpersoon</label>
                                <input type="text" class="form-control" id="contactpersoon_naam"
                                    name="contactpersoon_naam" value="{{ $leverancier->contactpersoon_naam }}" required>
                            </div>

                            <div class="form-group">
                                <label for="contactpersoon_email">E-mail Contactpersoon</label>
                                <input type="email" class="form-control" id="contactpersoon_email"
                                    name="contactpersoon_email" value="{{ $leverancier->contactpersoon_email }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="telefoonnummer">Telefoonnummer</label>
                                <input type="text" class="form-control" id="telefoonnummer" name="telefoonnummer"
                                    value="{{ $leverancier->telefoonnummer }}" required>
                            </div>

                            <div class="form-group">
                                <label for="eerstvolgende_levering">Eerstvolgende Levering</label>
                                <input type="datetime-local" class="form-control" id="eerstvolgende_levering"
                                    name="eerstvolgende_levering" value="{{ $leverancier->eerstvolgende_levering }}"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary">Opslaan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
