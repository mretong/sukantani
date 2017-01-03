@extends('layouts.pdf')

@section('content')

<div class="container">

	<br />
	<div class="row">
		<div class="col-xs-12">		
			<div class="panel panel-primary">
				<div class="panel-heading"><h4>Senarai Nama Peserta Acara</h4></div>
				<div class="panel-body">
				
				<?php $count = 0; ?>
				@foreach($acaras as $acara)

					@if($loop->iteration != 1)
						<div class="page-break"></div>
					@endif

					<?php $count++; ?>
					<table class="table table-condensed table-striped">
					<tr>
						<td colspan="8"><h4>#{{ $count }} - Acara {{ ucWords(strtolower($acara->nama)) }}</h4></td>
					</tr>
					<tr>
						<td>Bil</td>
						<td>Nama</td>
						<td>No KP</td>
						<td>Jantina</td>
						<td>No Pekerja</td>
						<td>Gred Jawatan</td>
						<td>Taraf Jawatan</td>
						<td>No Atlet</td>
					</tr>
					<?php 
						$bil = 0;
						$collection = collect($acara->peserta);
						$collection = $collection->sortByDesc('role');
						$collection 	= $collection->filter(function($peserta) {
										if($peserta->agensi_id == Auth::user()->agensi->id)
											return true;
										});
						$pesertas 	= $collection->take(3);
					?>
					@foreach($pesertas as $peserta)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>
								<font color="green"><strong>{{ $peserta->role }}</strong></font><br />
								<a href="{{ route('peserta-info', $peserta->id) }}" title="Klik Untuk Maklumat Tambahan" target="_blank">{{ $peserta->nama }}</a>
							</td>
							<td>
								{{ $peserta->nokp }} <br />
								{{ $peserta->notel }}
							</td>
							<td>{{ $peserta->jantina }}</td>
							<td>{{ $peserta->noPekerja }}</td>
							<td>{{ $peserta->gredJawatan }}</td>
							<td>{{ $peserta->tarafJawatan }}</td>
							<td>{{ $peserta->noAtlet }}</td>
						</tr>
					@endforeach

					</table>
				@endforeach



				</div>
			</div>
		</div>

	</div>
</div>

@endsection