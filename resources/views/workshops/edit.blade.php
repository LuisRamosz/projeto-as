<form action="{{ url('workshops/'.$workshop->id) }}" method="POST">
    @csrf
    @method('PUT')
        <h2 class="text-2xl font-bold mb-4 text-center">Editar Workshop</h2>
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" value="{{ $workshop->title }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
        </div>
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" placeholder="Location" value="{{ $workshop->location }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
        </div>
        <div class="mb-4">
            <label for="description" >Description</label>
            <input type="text" name="description" id="description" placeholder="Description" value="{{ $workshop->description }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
        </div>

        <div class="mb-5">
                <img src="{{ asset($workshop->image) }}" alt="">
                <label for="image" >Image</label>
                <input type="file" name="image" id="image">
            </div>
            <button type="submit">Update Workshop</button>         
 </form>

 
