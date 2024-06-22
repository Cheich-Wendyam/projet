@extends('lay')
@section('content')

<!-- Carousel -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($carousel_images as $index => $image)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="2000">
                <img src="{{ Storage::url($image->image) }}" class="d-block w-100" alt="{{ $image->title }}">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $site_settings['title'] }}</h5>
                    <p>{{ $site_settings['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<script src="{{ asset('css/all.min.js') }}"></script>
<script src="{{asset('css/swiper-bundle.min.js')}}"></script>
<script src="{{asset('css/scr.js')}}"></script>
@endsection


