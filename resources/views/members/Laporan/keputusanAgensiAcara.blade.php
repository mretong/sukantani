@extends('layouts.app')

@section('content')

<div class="container">
	
	<div class="col-xs-12">

		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Senarai Peserta Mengikut Jenis Sukan {{ $agensi->kod }} </h4></div>
			<div class="panel-body">
				<h3>Agensi : {{ $agensi->nama }}</h3>

				<table class="table table-condensed table-hover table-striped">

				@foreach($games as $acara)
					<tr>
						<td width="100"><strong>Jenis Sukan</strong></td>
						<td colspan="3"># {{ $loop->iteration }} <strong>{{ $acara->nama }}</strong></td>
					</tr>
					<tr>
						<td>Bil</td>
						<td>Nama</td>
						<td>No KP</td>
						<td>No Atlet</td>
					</tr>
					
					<?php
						$collections = $acara->peserta->filter(function($peserta) use ($agensi) {

											if($peserta->agensi_id == $agensi->id)
												return true;
										});
					?>

					@foreach($collections as $collection)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>
							<a href="{{ route('peserta-info', $collection->id) }}" title="Klik Untuk Maklumat Tambahan" target="_blank">{{ $collection->nama }}</a>
						</td>
						<td>{{ $collection->nokp }}</td>
						<td>{{ $collection->noAtlet }}</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="4"><hr /></td>
					</tr>

				@endforeach
				</table>



			</div>
		</div>
	</div>
</div>

@endsection