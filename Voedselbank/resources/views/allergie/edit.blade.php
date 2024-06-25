<x-app-layout>
<div class="container">
    <h1>Edit Allergie</h1>
    <!-- Assuming the route to update is named 'allergie.update' and requires an 'id' parameter -->
    <form action="{{ route('allergie.update', $allergie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Laravel uses the POST method, so we need to spoof the PUT method -->
        <div class="form-group">
            <label for="name">Name:</label>
            <!-- Ensure the input is pre-filled with the Allergie's current name -->
            <input type="text" class="form-control" id="name" name="name" value="{{ $allergie->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</x-app-layout>