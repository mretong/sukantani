@extends('layouts.app')

@section('content')

<div class="container-fluid">

	<div class="row">
		<div class="col-xs-3 col-xs-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4 class="panel-title">Duplikasi No KP</h4></div>
				<div class="panel-body">

					<table class="table table-condensed table-striped">
					<tr>
						<td><strong>Bil</strong></td>
						<td><strong>Nama</strong></td>
						<td><strong>No KP</strong></td>
						<td><strong>Agensi</strong></td>
					</tr>
					@foreach($collections as $collection)
					<tr>
						<td colspan="4">{{ $loop->iteration }}</td>
						@foreach($collection as $temp)
							<tr>
							<td>&nbsp;</td>
							<td>{{ $temp['nama'] }}</td>
							<td>{{ $temp['nokp'] }}</td>
							<?php
								$peserta = \App\Peserta::where('id', $temp['id'])->first();
							?>
							<td>{{ $peserta->agensi->kod }}</td>
							</tr>
						@endforeach
					</tr>
					@endforeach

				</table>
			
				</div>
			</div>

		</div>	
	</div>
</div>



@endsection