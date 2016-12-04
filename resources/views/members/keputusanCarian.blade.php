@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Keputusan Carian</h3></div>

            <div class="panel-body">

            	@include('members.includes._carian_form')

            	<br /><br />
                <div align="right"><span class="glyphicon glyphicon-download-alt"><a href="{{ route('pdf-acara', $acara->id) }}" target="_blank"> PDF </a></span></div>
            	<div align="left">
            		<h3>Senarai Atlet Mengikut Acara {{ ucwords(strtolower($acara->nama)) }}</h3>
        		</div>

        		<table class="table table-hover table-striped">
        			<tr>
        				<td><strong>Bil</strong></td>
        				<td><strong>Nama</strong></td>
        				<td><strong>No KP</strong></td>
        				<td><strong>Jantina</strong></td>
        				<td><strong>Pilihan</strong></td>
    				</tr>

    				@foreach($participants as $participant) 
    				<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $participant['nama'] }}</td>
						<td>{{ $participant['nokp'] }}</td>
						<td>{{ $participant['jantina'] }}</td>
						<td>
							<a href="{{ route('peserta-kemaskini', $participant['id']) }}"><span class="btn alert-info">Kemaskini</span></a>
							<a href="{{ route('peserta-hapus', $participant['id']) }}"><span class="btn alert-danger">Hapus</span></a>

						</td>
    				</tr>

    				@endforeach

        		</table>


            </div>
        </div>
        </div>
    </div>
</div>


@endsection