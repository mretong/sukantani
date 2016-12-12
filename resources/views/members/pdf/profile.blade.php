@extends('layouts.pdf')


@section('content')

@foreach($pesertas as $peserta)

	@if($loop->iteration != 1)
		<div class="page-break"></div>
	@endif

	<div class="container-fluid">
	    <div class="row">
	        <div class="col-xs-12">
	        
	            <div class="panel panel-default">
	                <div class="panel-heading"><strong>{{ $peserta->agensi->kod }} :: {{ $peserta->agensi->nama }}</strong></div>

	                <div class="panel-body">

					<table class="table table-condensed table-striped table-hover">
						<tr>
							<td colspan=2>
								<img src="{{ asset($peserta->photo) }}" height="50" width="40"><br /><br /><br /><br />
							</td>
						</tr>
						<tr>
							<td><strong>No Atlet/Pegawai</strong></td>
							<td>{{ $peserta->noAtlet }}</td>
						</tr>
						<tr>
							<td><strong>Vegetarian</strong></td>
							<td>{{ $peserta->vege }}</td>
						</tr>
						<tr>
							<td><strong>Nama</strong></td>
							<td>{{ $peserta->nama }}</td>
						</tr>

						<tr>
							<td><strong>No KP</strong></td>
							<td>{{ $peserta->nokp }}</td>
						</tr>
						<tr>
							<td><strong>Jantina</strong></td>
							<td>{{ $peserta->jantina }}</td>
						</tr>
						<tr>
							<td><strong>No Pekerja</strong></td>
							<td>{{ $peserta->noPekerja }}</td>
						</tr>
						<tr>
							<td><strong>Taraf Jawatan</strong></td>
							<td>{{ $peserta->tarafJawatan }}</td>
						</tr>

						
						<tr>
							<td><strong>Acara</strong></td>
							<td valign="top">
							@unless($peserta->acara->isEmpty())
								<ul>
								@foreach($peserta->acara as $acara)
									<li>{{ $acara->nama }}</li>
								@endforeach
								</ul>
							@endunless
							</td>
						</tr>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>

@endforeach



@endsection