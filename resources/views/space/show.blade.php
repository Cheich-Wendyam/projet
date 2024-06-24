{{-- resources/views/space/show.blade.php --}}
@extends('lay')
@section('content')
<br><br>
    <div class="content-container">
        <div class="site-details">
            <h1>Description</h1>
            <h2>{{ $space->Titre }}</h2>
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
        <p>
            <a href="{{ route('mapspace.showSpace', $space->id) }}" class="show-on-map">
               <i class="fas fa-map-marker-alt"></i> Voir sur la carte
            </a>
        </p>
    </div>
<script src="{{ asset('css/all.min.js') }}"></script>
<script src="{{asset('css/swiper-bundle.min.js')}}"></script>
<script src="{{asset('css/scr.js')}}"></script>
@endsection

