@extends('layouts.pdf')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-12 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Keputusan Carian</h3></div>

                <div class="panel-body">
                    <div align="left">
                        <h3>Rumusan Bilangan Pendaftaran Online Sehingga {{ date('d - m - Y') }}</h3>
                    </div>
                    

                        @foreach($collections as $collection)
                            @if($loop->index == 0)
                                <table class="table table-condensed table-hover table-striped">
                                <tr>
                                    <td colspan="3"><strong>{{ $agensi->kod }}</strong></td>
                                </tr>
                                <tr>                            
                                    <td><strong>Bil</strong></td>
                                    <td><strong>Acara</strong></td>
                                    <td><strong>Bilangan</strong></td>
                                </tr>
                            @endif
                            @if($loop->index != 0 && (($loop->iteration) % 12) == 0)
                                </table>
                                <div class="page-break"></div>
                                <table class="table table-condensed table-hover table-striped">
                                <tr>
                                    <td colspan="3"><strong>{{ $agensi->kod }}</strong></td>
                                </tr>
                                <tr>                            
                                    <td><strong>Bil</strong></td>
                                    <td><strong>Acara</strong></td>
                                    <td><strong>Bilangan</strong></td>
                                </tr>
                            @endif

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $collection['acara'] }}</td>
                                <td>{{ $collection['bilangan'] }}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection