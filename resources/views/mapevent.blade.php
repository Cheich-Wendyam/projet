@extends('lay')
@section('content')
<br><br><br>
<div id="map" data-spaces='@json($spaces)' data-restos='@json($restos)' data-sites='@json($sites)' data-event='@json($event)' data-hotels='@json($hotels)' data-events='@json($events)'></div>
</div>

<script src="{{asset('css/map.js')}}"></script>
<script src="{{ asset('css/all.min.js') }}"></script>
<script src="{{asset('css/swiper-bundle.min.js')}}"></script>
<script src="{{asset('css/scr.js')}}"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
@endsection
