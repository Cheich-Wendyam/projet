{{-- resources/views/space/show.blade.php --}}
@extends('lay')
@section('content')
<br><br>
    <div class="content-container">
        <div class="site-details">
            <h1>{{ $space->Titre }}</h1>
            <p>{{ $space->description }}</p>

            <div>
                <img src="{{ Storage::url($space->image) }}" alt="{{ $space->Titre }}">
            </div>

            <div class="photos">
                @foreach($space->photos as $photo)
                    <img src="{{ Storage::url($photo->path) }}" alt="Photo de {{ $space->Titre }}">
                @endforeach
            </div>
        </div>
    </div>
@endsection

