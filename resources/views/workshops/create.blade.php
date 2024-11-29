<form action="{{ url('workshops') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="location" placeholder="Location" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="file" name="image" placeholder="Image" required>
    <button type="submit">Create Workshop</button>
</form>