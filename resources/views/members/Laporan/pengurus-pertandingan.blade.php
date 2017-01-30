@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Janaan Laporan Kepada Pengurus Pertandingan</strong></div>

            <div class="panel-body">
                <h3>Janaan Laporan Kepada Pengurus Pertandingan</h3>

                @include('members.includes._laporan_pengurus_pertandingan')
                    
            </div>
        </div>
    </div>

</div>

@endsection