@extends('layouts.app')

@section('content')

<div class="container">

<div class="panel panel-primary">
	<div class="panel-heading"><h3>Nota Penting Penggunaan Sistem</h3></div>
	<div class="panel-body">

		<h4><strong>Peta Lokasi</strong></h4>
		<div id="demo"></div>

	</div>
</div>

</div>



@endsection

@section('js')

<script>

$(document).ready(function() {
    
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function success(){
        	$("#demo").innerHTML("Latitude: " + position.coords.latitude + 
    	"<br />Longitude: " + position.coords.longitude);
        });        
    } else {
        $("#demo").innerHTML("Geolocation is not supported by this browser.");
    }

    function getPosition(position) {

    	$("#demo").innerHTML("Latitude: " + position.coords.latitude + 
    	"<br />Longitude: " + position.coords.longitude);

    };
});



</script>


@endsection