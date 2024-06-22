{{-- resources/views/hotels/show.blade.php --}}

@extends('lay')
@section('content')
<br><br>
    <div class="content-container">
        <div class="site-details">
            <h1>{{ $hotels->Titre }}</h1>
            <p>{{ $hotels->description }}</p>

            <div class="photos">
                @foreach($hotels->photos as $photo)
                    <img src="{{ Storage::url($photo->path) }}" alt="Photo de {{ $hotels->Titre }}">
                @endforeach
            </div>
        </div>
        <p>
            <a href="{{ route('map') }}" class="show-on-map">
               <i class="fas fa-map-marker-alt"></i> Voir sur la carte
            </a>
        </p>
    </div>
    <script src="{{ asset('js/leaflet.js') }}"></script>
<script src="{{ asset('js/leaflet-routing-machine.js') }}"></script>

<script src="{{ asset('css/all.min.js') }}"></script>
<script src="{{asset('css/swiper-bundle.min.js')}}"></script>
<script src="{{asset('css/scr.js')}}"></script>
<script src="{{ asset('js/map.js') }}"></script>
@endsection

