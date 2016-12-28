@extends('layouts.app')

@section('content')

<div class="container-fluid>

    <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Carian No KP bermasalah mengikut agensi</strong></div>

            <div class="panel-body">
		        <h3>Carian No KP bermasalah</h3>

		        @include('members.includes._carian_nokp')
					
	        </div>
        </div>
    </div>

</div>


@endsection