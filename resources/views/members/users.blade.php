@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-9">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Kemaskini Log Masuk Pengguna</strong></div>

                <div class="panel-body">

                <table class="table table-condensed table-hover table-striped">
                	<tr>
                		<td><strong>Bil</strong></td>
                		<td><strong>Nama</strong></td>
                		<td><strong>Agensi</strong></td>
                		<td><strong>Status</strong></td>
                		<td align="center"><strong>Pilihan</strong></td>
                	</tr>
                	@foreach($users as $user)
                	<tr>
                		<td>{{ $loop->iteration }}</td>
                		<td>{{ $user->name }}</td>
                		<td>{{ $user->agensi->kod }}</td>
                		<td>
                			@if($user->status == 1)
                				<font color="green"><strong>AKTIF</strong></font>
                			@else
                				<font color="red"><strong>TIDAK AKTIF</strong></font>
                			@endif
            			</td>
                		<td align="center">
                			@if($user->status == 1)
                				<a href="{{ route('setting5s', $user->id) }}"><button class="btn btn-warning">NYAH AKTIFKAN</button></a>
                			@else
                				<a href="{{ route('setting5s', $user->id) }}"><button class="btn btn-success">AKTIFKAN</button></a>
                			@endif
                		</td>
                	</tr>


                	@endforeach
                </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection