@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Keputusan Carian</h3></div>

            <div class="panel-body">

            	@include('members.includes._carian_form')

            	<br /><br />
                <div align="right"><span class="glyphicon glyphicon-download-alt"><a href="{{ route('pdf-acara', $acara->id) }}" target="_blank"> PDF </a></span></div>
            	<div align="left">
            		<h3>Senarai Atlet Mengikut Acara {{ ucwords(strtolower($acara->nama)) }}</h3>
        		</div>

        		<table class="table table-hover table-striped">
        			<tr>
        				<td><strong>Bil</strong></td>
        				<td><strong>Nama</strong></td>
        				<td><strong>No KP</strong></td>
                        <td><strong>Jantina</strong></td>
        				<td><strong>Acara</strong></td>
        				<td><strong>Pilihan</strong></td>
    				</tr>

                    <?php $bil = 0; ?>
    				@foreach($acara->peserta as $peserta)

                        @if($peserta->agensi->id == Auth::user()->agensi->id)
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
                                <td>
                                    <ul>
                                    @foreach($peserta->acara as $acara)
                                        <li>{{ $acara->nama }}</li>
                                    @endforeach
                                    </ul>

                                </td>
        						<td>
                                    <a href="{{ route('peserta-kemaskini', $peserta->id) }}"><span class="btn alert-info">Kemaskini</span></a>
        							<a href="{{ route('acara-hapus', [$peserta->id, $acara->id]) }}" title="Gugur dari Acara"><span class="btn alert-danger">Gugur</span></a>

        						</td>
            				</tr>
                        @endif

    				@endforeach

        		</table>


            </div>
        </div>
        </div>
    </div>
</div>


@endsection