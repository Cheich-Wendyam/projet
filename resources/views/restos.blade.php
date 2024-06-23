{{-- resources/views/lay.blade.php --}}

@extends('lay')
@section('content')
<br><br>
<div class="info">
    <h2>Bienvenue à Ouagadougou</h2>
    <p>
        Vous cherchez des restaurants et des bars à Ouagadougou,envie de manger des plats africains et exotiques? Laissez-vous guider par cette belle selection de restaurants. La carte indique les restaurants et bars à proximite.
    </p>
    <p>
        Explorez et trouvez la meilleur adresse. Vous serez rapidement dans le meilleur endroit.
    </p>
    <p>
        <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </p>
    <p>
        <a href="/map" class="learn-more"><i class="fas fa-map-marker-alt"></i> Voir la carte</a>
    </p>
</div>

<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
        @foreach ($restos as $index => $image)
            <div class="card swiper-slide {{ $index === 0 ? 'active' : '' }}">
                <div class="image-content {{ $index === 0 ? 'active' : '' }} ">
                    <span class="overlay {{ $index === 0 ? 'active' : '' }}"></span>
                    <div class="card-image {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ Storage::url($image->image) }}" alt="" class="card-img {{ $index === 0 ? 'active' : '' }}">
                    </div>
                </div>

                <div class="card-content {{ $index === 0 ? 'active' : '' }}">
                    <h2 class="titre {{ $index === 0 ? 'active' : '' }}">{{ $image->Titre }}</h2>
                    <p class="description {{ $index === 0 ? 'active' : '' }}"> Restaurant</p>
                    <i class="fa fa-heart favorite-icon"></i>

                    <a href="{{ route('restos.show', $image->id) }}" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
<script src="{{ asset('css/all.min.js') }}"></script>
<script src="{{asset('css/swiper-bundle.min.js')}}"></script>
<script src="{{asset('css/scr.js')}}"></script>
@endsection
