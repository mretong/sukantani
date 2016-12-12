@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>

            <div class="panel-body">
		        {!! Form::open() !!}

				{!! Form::label('Agensi') !!}
				{!! Form::select('agensi_id', $agencies, '', ['class' => 'form-control', 'placeholder' => 'Agensi', 'required']) !!}

				{!! Form::label('Acara') !!}
				{!! Form::select('acara_id', $games, '', ['class' => 'form-control', 'placeholder' => 'Acara', 'required']) !!}

				<div align="right">{!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}</div>


				{!! Form::close() !!}
	        </div>
        </div>
    </div>

</div>

@endsection
				
				

