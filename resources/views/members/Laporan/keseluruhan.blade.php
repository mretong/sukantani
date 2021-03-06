@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
        	<div align="right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
        	<a href="{{ route('pdf-laporan-keseluruhan', Auth::user()->agensi->id) }}" target="_blank">PDF</a>&nbsp;&nbsp;
        	<a href="{{ route('excel-keseluruhan', Auth::user()->agensi->id) }}" target="_blank">Excel</a>&nbsp;&nbsp;

        	</div>
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>

                <div class="panel-body">

                <table class="table table-hover">
					<tr>
						<td><strong>Bil</strong></td>
						<td><strong>Vagetarian</strong></td>
						<td><strong>Nama</strong></td>
						<td><strong>No KP</strong></td>
						<td><strong>Jantina</strong></td>
						<td><strong>Taraf Jawatan</strong></td>
						<td><strong>Gred jawatan</strong></td>
						<td><strong>No Pekerja / No KWSP</strong></td>
						<td><strong>Tarikh Lantikan</strong></td>
					</tr>

                @foreach($pesertas as $peserta)
					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $peserta->vege }}</td>
						<td>
							<a href="{{ route('peserta-kemaskini', $peserta->id) }}" title="Klik untuk kemaskini peserta"> {{ $peserta->nama }}</a>
						</td>
						<td>
							{{ $peserta->nokp }} <br />
							{{ $peserta->notel }}
						</td>
						<td>{{ $peserta->jantina }}</td>
						<td>{{ $peserta->tarafJawatan }}</td>
						<td>{{ $peserta->gredJawatan }}</td>
						<td>{{ $peserta->noPekerja }}</td>
						<td>{{ $peserta->tarikhLantikan }}</td>
					</tr>
					
				@endforeach
				</table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection