@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-5 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Keputusan Carian</h3></div>

                <div class="panel-body">

                    @include('members.includes._carian_rumusan')

                    <br /><br />
                    <div align="right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="{{ route('pdf-rumusan', $agensi->id) }}" target="_blank"> PDF </a></span></div>
                    <div align="left">
                        <h3>Rumusan Bilangan Pendaftaran Online Sehingga {{ date('d - m - Y') }}</h3>
                    </div>
                    <table class="table table-condensed table-hover table-striped">
                        <tr>
                            <td colspan="3"><strong>{{ $agensi->kod }}</strong></td>
                        </tr>
                        <tr>                            
                            <td><strong>Bil</strong></td>
                            <td><strong>Acara</strong></td>
                            <td><strong>Bilangan</strong></td>
                        </tr>

                        @foreach($collections as $collection)
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