@extends('layouts.pdf')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>Senarai Atlet Mengikut Acara {{ ucwords(strtolower($acara->nama)) }}</h3></div>

            <div class="panel-body">
        		<table class="table table-hover table-striped">
        			<tr>
        				<td><strong>Bil</strong></td>
        				<td><strong>Nama</strong></td>
        				<td><strong>No KP</strong></td>
        				<td><strong>Jantina</strong></td>
    				</tr>

    				@foreach($participants as $participant) 
    				<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $participant['nama'] }}</td>
						<td>{{ $participant['nokp'] }}</td>
						<td>{{ $participant['jantina'] }}</td>
    				</tr>

    				@endforeach

        		</table>


            </div>
        </div>
        </div>
    </div>
</div>

@endsection