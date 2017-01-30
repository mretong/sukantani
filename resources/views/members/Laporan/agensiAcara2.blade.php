@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Carian Senarai Pengurus dan Jurulatih</strong></div>

            <div class="panel-body">
		        <h3>Carian Senarai Pengurus dan Jurulatih Penyertaan Acara</h3>

		        @include('members.includes._carian_agensi_acara2')
					
	        </div>
        </div>
    </div>

</div>

@endsection