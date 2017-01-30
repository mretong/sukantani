@extends('layouts.pdf')

@section('content')

<div class="container">
    
    <div class="col-xs-12">


        <div class="panel panel-primary">
            <div class="panel-heading"><h4 class="panel-title">Senarai Peserta Acara {{ $acara->nama }}</h4></div>
            <div class="panel-body">

                <table class="table table-condensed table-hover table-striped">
                <tr>
                    <td><strong>Bil</strong></td>
                    <td><strong>Agensi</strong></td>
                    <td><strong>Foto</strong></td>
                    <td><strong>Nama</strong></td>
                    <td><strong>No Kad Pengenalan</strong></td>
                </tr>

                @foreach($pesertas as $peserta)

                    @if($loop->iteration % 10 == 0)
                        </table>
                        <div class="page-break"></div>
                        <table class="table table-condensed table-hover table-striped">
                        <tr>
                            <td><strong>Bil</strong></td>
                            <td><strong>Agensi</strong></td>
                            <td><strong>Foto</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>No Kad Pengenalan</strong></td>
                        </tr>
                    @endif
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peserta->agensi->kod }}</td>
                        <td><img src="<?= public_path(); ?>/{{ $peserta->photo }}" height="70" width="60"></td>
                        <td>{{ $peserta->nama }}</td>
                        <td>{{ $peserta->nokp }}</td>
                    </tr>                    
                @endforeach
                </table>



            </div>
        </div>
    </div>
</div>

@endsection