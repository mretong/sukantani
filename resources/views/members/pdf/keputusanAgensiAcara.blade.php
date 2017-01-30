@extends('layouts.pdf')

@section('content')

<div class="container">
    
    <div class="col-xs-12">

        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title">Senarai Peserta Mengikut Jenis Sukan {{ $agensi->kod }} </h3></div>
            <div class="panel-body">
                
                @foreach($games as $acara)                    

                    @if($loop->iteration != 1)
                        <div class="page-break"></div>
                    @endif  
                        <?php
                            $collections = $acara->peserta->filter(function($peserta) use ($agensi) {
                                                if($peserta->agensi_id == $agensi->id)
                                                    return true;
                                            });
                            $collections = $collections->sortByDesc('role');
                        ?>
                        <table class="table table-condensed table-hover table-striped">
                        <tr>
                            <td width="100"><strong>Jenis Sukan</strong></td>
                            <td colspan="3"># {{ $loop->iteration }} <strong>{{ $acara->nama }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Bil</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>No KP</strong></td>
                            <td><strong>No Atlet</strong></td>
                        </tr>

                        @foreach($collections as $collection)

                            @if($loop->iteration % 16 == 0)
                                </table>
                                <div class="page-break"></div>

                                <table class="table table-condensed table-hover table-striped">
                                <tr>
                                    <td width="100"><strong>Jenis Sukan</strong></td>
                                    <td colspan="3"># {{ $loop->parent->iteration }} <strong>{{ $acara->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Bil</strong></td>
                                    <td><strong>Nama</strong></td>
                                    <td><strong>No KP</strong></td>
                                    <td><strong>No Atlet</strong></td>
                                </tr>
                            @endif
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $collection->nama }}
                                    @if($collection->role != 'ATLET')
                                        <br />
                                        ({{ $collection->role }})
                                    @endif
                                </td>
                                <td>{{ $collection->nokp }}</td>
                                <td>{{ $collection->noAtlet }}</td>
                            </tr>
                        @endforeach

                        </table>

{{--                         @if($loop->iteration == 5)
                            @break
                        @endif --}}
                    
                @endforeach
                
            </div>
        </div>
    </div>
</div>

@endsection