@extends('lay')
@section('content')
<br><br><br>
<div id="map" data-spaces='@json($spaces)' data-restos='@json($restos)' data-sites='@json($sites)'></div>
@endsection
