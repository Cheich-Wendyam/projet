{{-- resources/views/sites/show.blade.php --}}
@extends('lay')
@section('content')
<br><br>
    <div class="content-container">
        <div class="site-details">
            <h1>{{ $site->Titre }}</h1>
            <p>{{ $site->description }}</p>

            <div class="photos">
                @foreach($site->photos as $photo)
                    <img src="{{ Storage::url($photo->path) }}" alt="Photo de {{ $site->Titre }}">
                @endforeach
            </div>
        </div>
        <p>
            <a href="{{ route('map'), $site->id }}" class="show-on-map">
               <i class="fas fa-map-marker-alt"></i> Voir sur la carte
            </a>
        </p>
    </div>
<script src="{{ asset('css/all.min.js') }}"></script>
<script src="{{asset('css/swiper-bundle.min.js')}}"></script>
<script src="{{asset('css/scr.js')}}"></script>
@endsection

