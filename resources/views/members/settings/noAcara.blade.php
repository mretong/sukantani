@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col col-xs-8">
			
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Senarai Peserta Tiada Acara</h3></div>
				<div class="panel-body">
					<div class="pull-right"><small><a href="{{ route('setting4') }}">Delete all</a></small></div>
					<table class="table table-condensed table-hover table-striped">
						<tr>
							<td>Bil</td>
							<td>Agensi</td>
							<td>Nama</td>
							<td>No KP</td>
							<td>No Atlet</td>
							<td>Acara</td>
						</tr>
						@foreach($pesertas as $peserta)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $peserta->agensi->kod }}</td>
							<td>{{ $peserta->nama }}</td>
							<td>{{ $peserta->nokp }}</td>
							<td>{{ $peserta->noAtlet }}</td>
							<td>
								<ul>
								@foreach($peserta->acara as $acara)
									<li>{{ $acara->nama }}</li>
								@endforeach
								</ul>
							</td>
						@endforeach
					</table>
				</div>
			</div>

		</div>
	</div>

</div>


@endsection