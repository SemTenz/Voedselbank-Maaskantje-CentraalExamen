<x-app-layout>
    <div class="container">
        <h1>Nieuwe Leverancier Toevoegen</h1>

        <form action="{{ route('leveranciers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="bedrijfsnaam" class="form-label">Bedrijfsnaam</label>
                <input type="text" class="form-control" id="bedrijfsnaam" name="bedrijfsnaam" required>
            </div>

            <div class="mb-3">
                <label for="adres" class="form-label">Adres</label>
                <input type="text" class="form-control" id="adres" name="adres" required>
            </div>

            <div class="mb-3">
                <label for="contactpersoon_naam" class="form-label">Naam Contactpersoon</label>
                <input type="text" class="form-control" id="contactpersoon_naam" name="contactpersoon_naam" required>
            </div>

            <div class="mb-3">
                <label for="contactpersoon_email" class="form-label">E-mail Contactpersoon</label>
                <input type="email" class="form-control" id="contactpersoon_email" name="contactpersoon_email"
                    required>
            </div>

            <div class="mb-3">
                <label for="telefoonnummer" class="form-label">Telefoonnummer</label>
                <input type="text" class="form-control" id="telefoonnummer" name="telefoonnummer" required>
            </div>

            <div class="mb-3">
                <label for="eerstvolgende_levering" class="form-label">Eerstvolgende Levering</label>
                <input type="datetime-local" class="form-control" id="eerstvolgende_levering"
                    name="eerstvolgende_levering" required>
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</x-app-layout>
