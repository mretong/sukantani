@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
        	<div align="right"><span class="glyphicon glyphicon-download-alt"> </span> <a href="#">PDF</a>&nbsp;&nbsp;</div>
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>

                <div class="panel-body">

	                <table class="table table-hover">
	                	<tr>
	                		<th colspan="8">Senarai Peserta </th>
	                	</tr>
						<tr>
							<td><strong>Nama</strong></td>
							<td><strong>No KP</strong></td>
							<td><strong>Jantina</strong></td>
							<td><strong>Taraf Jawatan</strong></td>
							<td><strong>Gred jawatan</strong></td>
							<td><strong>No Pekerja / No KWSP</strong></td>
							<td><strong>Tarikh Lantikan</strong></td>
							<td><strong>Agensi</strong></td>
							<td><strong>Foto</strong></td>
							<td><strong>Pilihan</strong></td>
						</tr>
						<tr>
							<td>{{ $peserta->nama }}</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection