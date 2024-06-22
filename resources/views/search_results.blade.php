@extends('lay')

@section('content')
    <br><br>
    <div class="info">
        <h2>Résultats de recherche pour "{{ $query }}"</h2>

        @if(isset($error))
            <p>{{ $error }}</p>
        @else
            @if(isset($spaces) && !$spaces->isEmpty())
                <h3>Espaces</h3>
                <div class="slide-container swiper">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">
                            @foreach ($spaces as $index => $space)
                                <div class="card swiper-slide {{ $index === 0 ? 'active' : '' }}">
                                    <div class="image-content {{ $index === 0 ? 'active' : '' }}">
                                        <span class="overlay {{ $index === 0 ? 'active' : '' }}"></span>
                                        <div class="card-image {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($space->image) }}" alt="" class="card-img {{ $index === 0 ? 'active' : '' }}">
                                        </div>
                                    </div>
                                    <div class="card-content {{ $index === 0 ? 'active' : '' }}">
                                        <h2 class="titre {{ $index === 0 ? 'active' : '' }}">{{ $space->Titre }}</h2>
                                        <p class="description {{ $index === 0 ? 'active' : '' }}"> Espace de détente et loisir </p>
                                        <a href="{{ route('space.show', $space->id) }}" class="btn btn-primary">En savoir plus</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            @endif

            @if(isset($restaurants) && !$restaurants->isEmpty())
                <h3>Restaurants</h3>
                <div class="slide-container swiper">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">
                            @foreach ($restaurants as $index => $restaurant)
                                <div class="card swiper-slide {{ $index === 0 ? 'active' : '' }}">
                                    <div class="image-content {{ $index === 0 ? 'active' : '' }}">
                                        <span class="overlay {{ $index === 0 ? 'active' : '' }}"></span>
                                        <div class="card-image {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($restaurant->image) }}" alt="" class="card-img {{ $index === 0 ? 'active' : '' }}">
                                        </div>
                                    </div>
                                    <div class="card-content {{ $index === 0 ? 'active' : '' }}">
                                        <h2 class="titre {{ $index === 0 ? 'active' : '' }}">{{ $restaurant->Titre }}</h2>
                                        <p class="description {{ $index === 0 ? 'active' : '' }}"> Restaurant </p>
                                        <a href="{{ route('restos.show', $restaurant->id) }}" class="btn btn-primary">En savoir plus</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            @endif

            @if(isset($hotels) && !$hotels->isEmpty())
                <h3>Hôtels</h3>
                <div class="slide-container swiper">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">
                            @foreach ($hotels as $index => $hotel)
                                <div class="card swiper-slide {{ $index === 0 ? 'active' : '' }}">
                                    <div class="image-content {{ $index === 0 ? 'active' : '' }}">
                                        <span class="overlay {{ $index === 0 ? 'active' : '' }}"></span>
                                        <div class="card-image {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($hotel->image) }}" alt="" class="card-img {{ $index === 0 ? 'active' : '' }}">
                                        </div>
                                    </div>
                                    <div class="card-content {{ $index === 0 ? 'active' : '' }}">
                                        <h2 class="titre {{ $index === 0 ? 'active' : '' }}">{{ $hotel->Titre }}</h2>
                                        <p class="description {{ $index === 0 ? 'active' : '' }}"> Hôtel </p>
                                        <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-primary">En savoir plus</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            @endif

            @if(isset($sites) && !$sites->isEmpty())
                <h3>Sites touristiques</h3>
                <div class="slide-container swiper">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">
                            @foreach ($sites as $index => $site)
                                <div class="card swiper-slide {{ $index === 0 ? 'active' : '' }}">
                                    <div class="image-content {{ $index === 0 ? 'active' : '' }}">
                                        <span class="overlay {{ $index === 0 ? 'active' : '' }}"></span>
                                        <div class="card-image {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($site->image) }}" alt="" class="card-img {{ $index === 0 ? 'active' : '' }}">
                                        </div>
                                    </div>
                                    <div class="card-content {{ $index === 0 ? 'active' : '' }}">
                                        <h2 class="titre {{ $index === 0 ? 'active' : '' }}">{{ $site->Titre }}</h2>
                                        <p class="description {{ $index === 0 ? 'active' : '' }}"> Site touristique </p>
                                        <a href="{{ route('sites.show', $site->id) }}" class="btn btn-primary">En savoir plus</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            @endif

            @if(isset($events) && !$events->isEmpty())
                <h3>Événements</h3>
                <div class="slide-container swiper">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">
                            @foreach ($events as $index => $event)
                                <div class="card swiper-slide {{ $index === 0 ? 'active' : '' }}">
                                    <div class="image-content {{ $index === 0 ? 'active' : '' }}">
                                        <span class="overlay {{ $index === 0 ? 'active' : '' }}"></span>
                                        <div class="card-image {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($event->image) }}" alt="" class="card-img {{ $index === 0 ? 'active' : '' }}">
                                        </div>
                                    </div>
                                    <div class="card-content {{ $index === 0 ? 'active' : '' }}">
                                        <h2 class="titre {{ $index === 0 ? 'active' : '' }}">{{ $event->Titre }}</h2>
                                        <p class="description {{ $index === 0 ? 'active' : '' }}"> Événement </p>
                                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">En savoir plus</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            @endif
        @endif
    </div>
@endsection
