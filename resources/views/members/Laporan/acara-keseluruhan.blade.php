@extends('layouts.app')

@section('content')


<div class="container">
<h3>{{ Auth::user()->agensi->kod }} - {{ Auth::user()->agensi->nama }}</h3>
	<div class="col-xs-8">		
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Senarai Nama Peserta Acara</h4></div>
			<div class="panel-body">
			
			<?php $count = 0; ?>
			@foreach($acaras as $acara)

				<?php $count++; ?>
				<table class="table table-condensed table-striped">
				<tr>
					<td colspan="12"><h4>#{{ $count }} - Acara {{ ucWords(strtolower($acara->nama)) }}</h4></td>
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
					<td></td>
				</tr>
				<?php $bil = 0; ?>
				@foreach($acara->peserta as $peserta)

					@if($peserta->agensi_id == Auth::user()->agensi->id)
					<?php $bil++; ?>
					<tr>
						<td>{{ $bil }}</td>
						<td>
							@if($peserta->role == 'PENGURUS' || $peserta->role == 'JURULATIH')
								<font color="green"><strong>{{ $peserta->role }}</strong></font><br />
							@endif
							{{ $peserta->nama }}
						</td>
						<td>{{ $peserta->nokp }}</td>
						<td>{{ $peserta->jantina }}</td>
						<td>{{ $peserta->noPekerja }}</td>
						<td>{{ $peserta->gredJawatan }}</td>
						<td>{{ $peserta->tarafJawatan }}</td>
						<td>{{ $peserta->noAtlet }}</td>
					</tr>
					@endif

				@endforeach

				</table>
			@endforeach



			</div>
		</div>
	</div>

	<div class="col-xs-4">
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Senarai Semak Had Peserta</h4></div>
			<div class="panel-body">

				<table class="table table-condensed table-striped">
				<tr>
					<td><strong>Bil</strong></td>
					<td><strong>Acara</strong></td>
					<td><strong>Had Peserta</strong></td>
				</tr>
				@foreach($acaras as $acara)
					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $acara->nama }}</td>
						<td>{{ $acara->limit }}</td>
					</tr>


				@endforeach
				</table>


			</div>
		</div>
	</div>
</div>


@endsection