@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="col-xs-12">


        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Senarai Peserta Acara {{ $acara->nama }}</h4></div>
            <div class="panel-body">

                <table class="table table-condensed table-hover table-striped">
                <div align="right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="{{ route('pdf-pengurus-pertandingan', $acara->id) }}">PDF</a>&nbsp;&nbsp;</div>
                <tr>
                    <td><strong>Bil</strong></td>
                    <td><strong>Agensi</strong></td>
                    <td><strong>Foto</strong></td>
                    <td><strong>Nama</strong></td>
                    <td><strong>No Kad Pengenalan</strong></td>
                </tr>

                @foreach($pesertas as $peserta)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peserta->agensi->kod }}</td>
                        <td><img src="{{ asset($peserta->photo) }}" height="100" width="75"></td>
                        <td>    
                            {{ $peserta->nama }} <br />
                            {{ $peserta->role }}
                        </td>
                        <td>{{ $peserta->nokp }}</td>
                    </tr>                    
                @endforeach
                </table>



            </div>
        </div>
    </div>
</div>

@endsection