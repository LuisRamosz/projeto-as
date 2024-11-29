@foreach($workshops as $workshop)
    <div>
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset($workshop->image) }}" alt="{{ $workshop->title }}"/>
        <h3>{{ $workshop->title }}</h3>
        <p>{{ $workshop->location }}</p>
        <p>{{ $workshop->description }}</p>
        <a href="{{ url('workshops/'.$workshop->id.'/edit') }}">Edit</a>
        <form action="{{ url('workshops/'.$workshop->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

