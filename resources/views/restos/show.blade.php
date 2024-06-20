{{-- resources/views/restos/show.blade.php --}}

@extends('lay')
@section('content')
<br><br>
    <div class="content-container">
        <div class="site-details">
            <h1>{{ $resto->Titre }}</h1>
            <p>{{ $resto->description }}</p>

            <div class="photos">
                @foreach($resto->photos as $photo)
                    <img src="{{ Storage::url($photo->path) }}" alt="Photo de {{ $resto->Titre }}">
                @endforeach
            </div>
        </div>
    </div>
@endsection
