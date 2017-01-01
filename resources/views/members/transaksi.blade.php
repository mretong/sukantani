@extends('layouts.app')

@section('content')

<div class="container-fluid">
	
	<div class="row">
	<div class="col-xs-8 col-xs-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading"><h4 class="panel-title">TRANSAKSI HARI INI</h4></div>
			<div class="panel-body">

				<table class="table table-condensed table-striped">
				<tr>
					<td><strong>Bil</strong></td>
					<td><strong>Agensi</strong></td>
					<td><strong>Nama</strong></td>
					<td><strong>No KP</strong></td>
					<td><strong>Catatan</strong></td>
					<td><strong>Kemaskini Pada</strong></td>
				</tr>
				@foreach($transactions as $transaction)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $transaction->agensi->kod }}</td>
					<td>{{ $transaction->peserta['nama'] }}</td>
					<td>{{ $transaction->peserta['nokp'] }}</td>
					<td>{{ $transaction->catatan }}</td>
					<td>{{ $transaction->updated_at }}</td>
				</tr>
				@endforeach
				</table>
			</div>
		</div>
	</div>
</div>


@endsection