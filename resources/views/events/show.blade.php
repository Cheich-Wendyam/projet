{{-- resources/views/events/show.blade.php --}}

@extends('lay')
@section('content')
<br><br>
    <div class="content-container">
        <div class="site-details">
            <h1>{{ $events->Titre }}</h1>
            <p>{{ $events->description }}</p>

            <div class="photos">
                @foreach($events->photos as $photo)
                    <img src="{{ Storage::url($photo->path) }}" alt="Photo de {{ $events->Titre }}">
                @endforeach
            </div>
        </div>
    </div>
@endsection

