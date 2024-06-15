@extends('lay')
@section('content')
<br><br>
<div class="info">
    <h2>Bienvenue à Ouagadougou</h2>
    <p>
        Découvrez la magnifique ville de Ouagadougou, un joyau historique débordant de sites touristiques fascinants.
    </p>
    <p>
        Explorez une ville aux multiples facettes avec des monuments historiques impressionnants et des paysages époustouflants qui vous transporteront dans un voyage inoubliable.
    </p>
    <a href="/map" class="learn-more"><i class="fas fa-map-marker-alt"></i> Voir la carte</a>
</div>

<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
        @foreach ($carousel_images as $index => $image)
            <div class="card swiper-slide {{ $index === 0 ? 'active' : '' }}">
                <div class="image-content {{ $index === 0 ? 'active' : '' }} ">
                    <span class="overlay {{ $index === 0 ? 'active' : '' }}"></span>
                        <div class="card-image {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ Storage::url($image->image) }}" alt="" class="card-img {{ $index === 0 ? 'active' : '' }}">
                        </div>
                </div>

                <div class="card-content {{ $index === 0 ? 'active' : '' }}">
                <h2 class="titre {{ $index === 0 ? 'active' : '' }}">{{ $image->title }}</h2>
                <p class="description {{ $index === 0 ? 'active' : '' }}"> {{ $image->description }} </p>

                <button class="button {{ $index === 0 ? 'active' : '' }}">En savoir plus</button>
            </div>
            </div>
        @endforeach

           
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>


@endsection
