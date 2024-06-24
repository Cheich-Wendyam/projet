{{-- resources/views/events/show.blade.php --}}

@extends('lay')
@section('content')
<br><br>
    <div class="content-container">
        <div class="site-details">
            <h1>Description</h1>
            <h2>{{ $events->Titre }}</h2>
            <p>{{ $events->description }}</p>
            <img src="{{ Storage::url($events->image) }}" alt="Photo de {{ $events->Titre }}">
            <div class="photos">
                @foreach($events->photos as $photo)
                    <img src="{{ Storage::url($photo->path) }}" alt="Photo de {{ $events->Titre }}">
                @endforeach
            </div>

        </div>
        <p>
            <a href="{{ route('mapevent.showEvent', $events->id) }}" class="show-on-map">
               <i class="fas fa-map-marker-alt"></i> Voir sur la carte
            </a>
        </p>
    </div>
<script src="{{ asset('css/all.min.js') }}"></script>
<script src="{{asset('css/swiper-bundle.min.js')}}"></script>
<script src="{{asset('css/scr.js')}}"></script>
@endsection

