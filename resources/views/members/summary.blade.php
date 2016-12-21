@extends('layouts.app')

@section('content')

<div class="container-fluid">
	
	@foreach($collections as $collection)

		@if($loop->iteration % 3 == 0)
			<div class="row">
				<div class="col-xs-3 col-xs-offset-1">
					<div class="panel panel-primary">
						<div class="panel-heading"><h4>{{ $collection['agensi'] }}</h4></div>
						<div class="panel-body">

							<table class="table">
							<tr>
								<td>Perkara</td>
								<td>Lelaki</td>
								<td>Wanita</td>
								<td>Jumlah</td>
							</tr>
							<tr>
								<td>Kontinjen</td>
								<td>{{ $collection['kontinjenLelaki'] }}</td>
								<td>{{ $collection['kontinjenWanita'] }}</td>
								<td>{{ $collection['kontinjen'] }}</td>
							</tr>
							<tr>
								<td>Peserta</td>
								<td>{{ $collection['pesertaLelaki'] }}</td>
								<td>{{ $collection['pesertaWanita'] }}</td>
								<td>{{ $collection['peserta'] }}</td>
							</tr>
						</table>

							
						</div>
					</div>

				</div>	
			</div>
		@else
			<div class="col-xs-3 col-xs-offset-1">
				<div class="panel panel-primary">
					<div class="panel-heading"><h4>{{ $collection['agensiKod'] }}</h4></div>
					<div class="panel-body">

						<table class="table">
							<tr>
								<td>Perkara</td>
								<td>Lelaki</td>
								<td>Wanita</td>
								<td>Jumlah</td>
							</tr>
							<tr>
								<td>Kontinjen</td>
								<td>{{ $collection['kontinjenLelaki'] }}</td>
								<td>{{ $collection['kontinjenWanita'] }}</td>
								<td>{{ $collection['kontinjen'] }}</td>
							</tr>
							<tr>
								<td>Peserta</td>
								<td>{{ $collection['pesertaLelaki'] }}</td>
								<td>{{ $collection['pesertaWanita'] }}</td>
								<td>{{ $collection['peserta'] }}</td>
							</tr>
						</table>

						
					</div>
				</div>

			</div>
		@endif
	@endforeach

</div>



@endsection