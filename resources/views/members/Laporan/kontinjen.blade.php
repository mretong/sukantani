@extends('layouts.app')

@section('content')

<div class="container">
	
	<div class="col-xs-12">

		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Senarai Kontinjen {{ $agensi->kod }} </h4></div>
			<div class="panel-body">

			<div align="right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
        	<a href="{{ route('pdf-kontinjen', $agensi->id) }}" target="_blank">PDF</a>&nbsp;&nbsp;
        	</div>
			<table class="table table-condensed table-striped table-hover">
				<tr>
					<td>Bil</td>
					<td>Nama</td>
					<td>No KP</td>
					<td>Jantina</td>
					<td>No Telefon</td>
					<td>Jawatan</td>
				</tr>
				@foreach($kontinjens as $kontinjen)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $kontinjen->nama }}</td>
					<td>{{ $kontinjen->nokp }}</td>
					<td>{{ $kontinjen->jantina }}</td>
					<td>{{ $kontinjen->notel }}</td>
					<td>{{ $kontinjen->role }}</td>
				</tr>
				@endforeach

			</table>


			</div>
		</div>
	</div>
</div>

@endsection