@extends('layouts.app')

@section('content')

<style type="text/css">
	
input {
	text-transform: uppercase;
}

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6">
        	<div align="right"><span class="glyphicon glyphicon-download-alt"> </span> <a href="{{ route('pdf-peserta', $peserta->id) }}">PDF</a>&nbsp;&nbsp;</div>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>

                <div class="panel-body">

				<table class="table table-condensed table-striped table-hover">
					<tr>
						<td colspan=2><img src="{{ asset($peserta->photo) }}" height="150" width="130"></td>
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

@endsection