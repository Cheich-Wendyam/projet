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
        <p>
            <a href="{{ route('map') }}">
                Voir sur la carte
            </a>
        </p>
    </div>
<script src="{{ asset('css/all.min.js') }}"></script>
<script src="{{asset('css/swiper-bundle.min.js')}}"></script>
<script src="{{asset('css/scr.js')}}"></script>
@endsection

