<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-semibold text-white">Add New Allergie</h1>
        <form action="{{ route('allergie.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            <div class="form-group mb-4">
                <label for="name" class="block text-white text-sm font-bold mb-2">Naam:</label>
                <input type="text" class="form-control shadow appearance-none border rounded w-full py-2 px-3 bg-gray-800 text-white leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Toevoegen</button>
        </form>
    </div>
</x-app-layout>