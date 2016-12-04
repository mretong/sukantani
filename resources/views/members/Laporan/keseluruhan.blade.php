@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
        	<div align="right"><span class="glyphicon glyphicon-download-alt"> </span> <a href="{{ route('pdf-laporan-keseluruhan', Auth::user()->agensi->id) }}" target="_blank">PDF</a>&nbsp;&nbsp;</div>
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>

                <div class="panel-body">

                @foreach($acaras as $acara)

                	<br />
	                <table class="table table-hover">
	                	<tr>
	                		<th colspan="8">Acara {{ ucWords(strtolower($acara->nama)) }} </th>
	                	</tr>
						<tr>
							<td><strong>Bil</strong></td>
							<td><strong>Nama</strong></td>
							<td><strong>No KP</strong></td>
							<td><strong>Jantina</strong></td>
							<td><strong>Taraf Jawatan</strong></td>
							<td><strong>Gred jawatan</strong></td>
							<td><strong>No Pekerja / No KWSP</strong></td>
							<td><strong>Tarikh Lantikan</strong></td>
						</tr>
						<?php $bil = 1; ?>
						@foreach($acara->peserta as $peserta)

							@if($peserta->agensi_id == Auth::user()->agensi->id)
								<tr>
									<td>{{ $bil++ }}</td>
									<td>{{ $peserta->nama }}</td>
									<td>{{ $peserta->nokp }}</td>
									<td>{{ $peserta->jantina }}</td>
									<td>{{ $peserta->tarafJawatan }}</td>
									<td>{{ $peserta->gredJawatan }}</td>
									<td>{{ $peserta->noPekerja }}</td>
									<td>{{ $peserta->tarikhLantikan }}</td>
								</tr>
							@endif
						@endforeach
					</table>
				@endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection