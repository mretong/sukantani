@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col col-xs-8">
			
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>No KP Bermasalah</h3></div>
				<div class="panel-body">
					<table class="table table-condensed table-hover table-striped">
						@foreach($collections as $collection)
						<tr>
							<td colspan="4"># {{ $loop->iteration }} <strong>{{ $collection['title'] }}</strong></td>
						</tr>
							@foreach($collection['data'] as $data)

								@if($loop->first)								
								<tr>
									<td>Bil</td>
									<td>Agensi</td>
									<td>Nama</td>
									<td>No KP</td>
									<td>No Atlet</td>
								</tr>
								@endif

								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>
										<?php $peserta = collect($data); ?>
										{{ $peserta->agensi }}
									</td>
									<td>{{ $data['nama'] }}</td>
									<td>{{ $data['nokp'] }}</td>
									<td>{{ $data['noAtlet'] }}</td>
								</tr>


								@if($loop->last)
								<tr>
									<td colspan="4">&nbsp;</td>
								</tr>
								@endif

							@endforeach
						@endforeach
					</table>
				</div>
			</div>

		</div>
	</div>

</div>


@endsection