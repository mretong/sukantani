
@extends('layouts.pdf')

@section('content')

<div class="container">
    
    <div class="col-xs-12">

        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title">Senarai Peserta Mengikut Jenis Sukan {{ $agensi->kod }} </h3></div>
            <div class="panel-body">
                
                @foreach($games as $acara)
                    <table class="table table-condensed table-hover table-striped">

                    @if($loop->iteration != 1)
                        <div class="page-break">
                    @endif
                    <tr>
                        <td width="100"><strong>Jenis Sukan</strong></td>
                        <td colspan="3"># {{ $loop->iteration }} <strong>{{ $acara->nama }}</strong></td>
                    </tr>
                    <tr>
                        <td>Bil</td>
                        <td>Nama</td>
                        <td>No KP</td>
                        <td>No Atlet</td>
                    </tr>
                    
                    <?php
                        $collections = $acara->peserta->filter(function($peserta) use ($agensi) {
                                            if($peserta->agensi_id == $agensi->id)
                                                return true;
                                        });
                    ?>

                    @foreach($collections as $collection)
                        @if($loop->iteration == 6)
                            <div class="page-break"></div>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $collection->nama }}</td>
                                <td>{{ $collection->nokp }}</td>
                                <td>{{ $collection->noAtlet }}</td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $collection->nama }}</td>
                                <td>{{ $collection->nokp }}</td>
                                <td>{{ $collection->noAtlet }}</td>
                            </tr>
                        @endif                        
                    @endforeach
                    <tr>
                        <td colspan="4"><hr /></td>
                    </tr>

                    @if($loop->iteration == 1)
                        @break
                    @endif

                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection