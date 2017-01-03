@extends('layouts.app')

@section('content')

<div class="container">

	<h4>Ringkasan Penyertaan Keseluruhan Agensi</h4>

<!-- 	<div align="right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="{{ route('pdf-laporan-summary') }}" target="_blank"> PDF </a></span></div> -->
	
	@foreach($collections as $collection)

		@if($loop->iteration % 3 == 0)
			<div class="row">
				<div class="col-xs-4">
					<div class="panel panel-primary">
						<div class="panel-heading"><h4 class="panel-title">{{ $collection['agensi'] }}</h4></div>
						<div class="panel-body">

							<table class="table table-condensed table-striped">
							<tr>
								<td><strong>Perkara</strong></td>
								<td><strong>Lelaki</strong></td>
								<td><strong>Wanita</strong></td>
								<td><strong>Jumlah</strong></td>
							</tr>
							<tr>
								<td>Kontinjen</td>
								<td>{{ $collection['kontinjenLelaki'] }}</td>
								<td>{{ $collection['kontinjenWanita'] }}</td>
								<td>{{ $collection['kontinjenLelaki'] + $collection['kontinjenWanita'] }}</td>
							</tr>
							<tr>
								<td>Peserta</td>
								<td>{{ $collection['pesertaLelaki'] }}</td>
								<td>{{ $collection['pesertaWanita'] }}</td>
								<td>{{ $collection['pesertaLelaki'] + $collection['pesertaWanita'] }}</td>
							</tr>
						</table>

							
						</div>
					</div>

				</div>	
			</div>
		@else
			<div class="col-xs-4">
				<div class="panel panel-primary">
					<div class="panel-heading"><h4 class="panel-title">{{ $collection['agensiKod'] }}</h4></div>
					<div class="panel-body">

						<table class="table table-condensed table-striped">
							<tr>
								<td><strong>Perkara</strong></td>
								<td><strong>Lelaki</strong></td>
								<td><strong>Wanita</strong></td>
								<td><strong>Jumlah</strong></td>
							</tr>
							<tr>
								<td>Kontinjen</td>
								<td>{{ $collection['kontinjenLelaki'] }}</td>
								<td>{{ $collection['kontinjenWanita'] }}</td>
								<td>{{ $collection['kontinjenLelaki'] + $collection['kontinjenWanita'] }}</td>
							</tr>
							<tr>
								<td>Peserta</td>
								<td>{{ $collection['pesertaLelaki'] }}</td>
								<td>{{ $collection['pesertaWanita'] }}</td>
								<td>{{ $collection['pesertaLelaki'] + $collection['pesertaWanita'] }}</td>
							</tr>
						</table>

						
					</div>
				</div>

			</div>
		@endif
	@endforeach

</div>



@endsection