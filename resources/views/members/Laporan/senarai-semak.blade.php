@extends('layouts.app')

@section('content')

<div class="container">

	<div class="col-xs-5">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3>Acara</h3></div>
			<div class="panel-body">

			<table class="table table-responsive">
			@foreach($acaras as $acara)
			
				<tr>
					<td colspan="3"><strong>#{{ $loop->iteration }} Acara {{ $acara->nama }}</strong></td>
				</tr>
				<tr>
					<td>Lelaki</td>
					<td>:</td>
					<td>{{ $acara->peserta->where('agensi_id', Auth::user()->agensi->id)->where('jantina', 'LELAKI')->count() }}</td>
				</tr>
				<tr>
					<td>Wanita</td>
					<td>:</td>
					<td>{{ $acara->peserta->where('agensi_id', Auth::user()->agensi->id)->where('jantina', 'WANITA')->count() }}</td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td>
					<?php $jumlah = $acara->peserta->where('agensi_id', Auth::user()->agensi->id)->where('jantina', 'LELAKI')->count() + $acara->peserta->where('agensi_id', Auth::user()->agensi->id)->where('jantina', 'WANITA')->count();
					?>
					{{ $jumlah }} / {{ $acara->limit }}

					@if($jumlah == $acara->limit)
						<td><img src="{{ asset('images/tick.png') }}" height="50" width="30"></td>
					@else
						<td><img src="{{ asset('images/cross.png') }}" height="50" width="30"></td>

					@endif
					</td>
				</tr>


			@endforeach
			</table>

			</div>
		</div>
	</div>
	
	<div class="col-xs-5">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3>Senarai Semak </small></h3></div>
			<div class="panel-body">
				
				<table class="table table-condensed">
					<tr>
						<td colspan="3"><strong>Ringkasan Senarai Semak</strong></td>
					</tr>
					<!-- <tr>
						<td valign="middle">STATUS PENGESAHAN</td>		
							@if(strtoupper($ringkasan['pengesahan']) == "YA")
								<td valign="middle">{{ strtoupper($ringkasan['pengesahan']) }}</td>
								<td valign="middle"><img src="{{ asset('images/tick.png') }}" height="50" width="30"></td>
							@else
								<td valign="middle"><a href="{{ route('pengesahan') }}" title="Sila klik untuk pengesahan.">{{ strtoupper($ringkasan['pengesahan']) }} </a></td>
								<td valign="middle"><img src="{{ asset('images/cross.png') }}" height="50" width="30"></td>

							@endif

						</td>
					</tr> -->
					<tr>
						<td>KESELURUHAN</td>
						<td colspan="2">{{ $ringkasan['jumlahPeserta'] }}</td>
					</tr>
					<tr>
						<td>LELAKI</td>
						<td colspan="2">{{ $ringkasan['jumlahLelaki'] }}</td>
					</tr>
					<tr>
						<td>WANITA</td>
						<td colspan="2">{{ $ringkasan['jumlahWanita'] }}</td>
					</tr>
					

				</table>


			</div>


		</div>
	</div>
</div>


@endsection