@extends('layouts.app')

@section('content')

<div class="container-fluid">

	<div class="row">
		<div class="col-xs-3 col-xs-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4 class="panel-title">Duplikasi</h4></div>
				<div class="panel-body">

					<table class="table table-condensed table-striped">
					<tr>
						<td><strong>Bil</strong></td>
						<td><strong>Agensi</strong></td>
						<td><strong>No Atlet</strong></td>
					</tr>
					@foreach($pesertas as $peserta)
					<tr>
						<td>{{ $loop->iteration }}</td>
						@foreach($peserta as $temp)
						<td>
							<?php
								$agensi = \App\Agensi::where('id', $temp['agensi_id'])->first();
							?>
							{{ $agensi->kod }}
						</td>
						<td>{{ $temp['noAtlet'] }}</td>
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