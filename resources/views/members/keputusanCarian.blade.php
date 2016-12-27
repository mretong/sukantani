@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-3 col-xs-offset-1">        
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Senarai Semak Had Peserta</h4></div>
                <div class="panel-body">

                    <table class="table table-condensed table-striped">
                    <tr>
                        <td><strong>Bil</strong></td>
                        <td><strong>Acara</strong></td>
                        <td><strong>Had Peserta</strong></td>
                    </tr>
                    @foreach($limit as $temp)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $temp->nama }}</td>
                            <td>{{ $temp->limit }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Keputusan Carian</h3></div>

                <div class="panel-body">

                	<!-- @include('members.includes._carian_form') -->

                	<br /><br />
                    <div align="right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="{{ route('pdf-acara', $acara->id) }}" target="_blank"> PDF </a></span></div>
                	<div align="left">
                		<h3>Senarai Atlet Mengikut Acara {{ ucwords(strtolower($acara->nama)) }}</h3>
            		</div>
                    <table class="table table-hover table-striped">
                        <tr>
                            <td><strong>Bil</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>No KP</strong></td>
                            <td><strong>No Pekerja/KWSP</strong></td>
                            <td><strong>Taraf Jawatan</strong></td>
                            <td><strong>Tarikh Lantikan</strong></td>
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
                                        <a href="{{ route('peserta-info', $peserta->id) }}" title="Klik Untuk Maklumat Tambahan" target="_blank">{{ $peserta->nama }} </a><br />
                                        <font color="green"><strong>{{ $peserta->role }}</strong></font>
                                    </td>
                                    <td>{{ $peserta->nokp }}</td>
                                    <td>{{ $peserta->noPekerja }}</td>
                                    <td>{{ $peserta->tarafJawatan }}</td>
                                    <td>{{ $peserta->tarikhLantikan }}</td>
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