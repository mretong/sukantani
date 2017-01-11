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
							<td colspan="5"># {{ $loop->iteration }} <strong>{{ strtoupper($collection['title']) }}</strong></td>
						</tr>
							@foreach($collection['data'] as $data)

								@if($loop->first)								
								<tr>
									<td><strong>Bil</strong></td>
									<td><strong>Agensi</strong></td>
									<td><strong>Nama</strong></td>
									<td><strong>No KP</strong></td>
									<td><strong>Acara</strong></td>
									<td><strong>No Atlet</strong></td>
								</tr>
								@endif

								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>
										<?php
											$agensi = new \App\Agensi;
											$agensi = $agensi->getKod($data['agensi_id']);
										?>
										{{ $agensi }}
									</td>
									<td>{{ $data['nama'] }}</td>
                                    <td>{{ $data['nokp'] }}</td>
									<td>
										<?php
											$peserta = \App\Peserta::where('id', $data['id'])->first();
										?>
										<ul>
										@foreach($peserta->acara as $acara)
											<li>{{ $acara->nama }}</li>
										@endforeach
										</ul>

									</td>
									<td>{{ $data['noAtlet'] }}</td>
								</tr>


								@if($loop->last)
								<tr>
									<td colspan="5">&nbsp;</td>
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