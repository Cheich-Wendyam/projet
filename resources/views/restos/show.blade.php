{{-- resources/views/restos/show.blade.php --}}
@extends('lay')
@section('content')
    <div class="container">
        <h1>{{ $resto->Titre }}</h1>
        <p>{{ $resto->description }}</p>

        <div class="photos">
            @foreach($resto->photos as $photo)
                <img src="{{ Storage::url($photo->path) }}" alt="Photo de {{ $resto->nom }}">
            @endforeach
        </div>
    </div>
@endsection
