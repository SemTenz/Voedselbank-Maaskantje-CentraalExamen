<x-app-layout>
<div class="container">
    <h1>Add New Allergie</h1>
    <form action="{{ route('allergie.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</x-app-layout>