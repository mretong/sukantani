@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
        	<div align="right"><span class="glyphicon glyphicon-download-alt"> </span> <a href="{{ route('pdf-laporan-keseluruhan', Auth::user()->agensi->id) }}" target="_blank">PDF</a>&nbsp;&nbsp;</div>
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>

                <div class="panel-body">

                

                </div>
            </div>
        </div>
    </div>
</div>

@endsection