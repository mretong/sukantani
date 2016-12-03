@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>

            <div class="panel-body">
		        @include('members.includes._tagging_form')
	        </div>
        </div>
    </div>

</div>

@endsection