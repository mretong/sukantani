@extends('layouts.app')

@section('content')

<style type="text/css">
    
input {
    text-transform: uppercase;
}

</style>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-8">
        <div align="right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="{{ route('pdf-kontinjen', Auth::user()->agensi_id) }}" target="_blank"> PDF </a></div>
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Maklumat Kontinjen</h4></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <td><strong>Bil</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>No KP</strong></td>
                            <td><strong>No Telefon</strong></td>
                            <td><strong>Jantina</strong></td>
                            <td><strong>Pilihan</strong></td>
                        </tr>
                        <!-- CODING HERE -->

                        @if($ketua == null && $timbalan == null && $urusetias == null)
                            <tr>
                                <td colspan="6"><font color="red"><strong>Tiada Data</strong></font></td>
                            </tr>
                        @endif


                        <?php $bil = 0; ?>
                        @if($ketua != null)

                        <?php $bil++; ?>
                        <tr>
                            <td>{{ $bil }}</td>
                            <td>
                                {{ $ketua->nama }} <br />
                                <font color="green"><strong><small>{{ $ketua->role }} KONTINJEN</small></strong></font>
                            </td>
                            <td>{{ $ketua->nokp }}</td>
                            <td>{{ $ketua->notel }}</td>
                            <td>{{ $ketua->jantina }}</td>
                            <td>
                                <a href="{{ route('kontinjen-kemaskini', $ketua->id) }}"><button class="btn alert-info">Kemaskini</button></a>
                                <a href="{{ route('kontinjen-hapus', $ketua->id) }}"><button class="btn alert-danger">Hapus</button></a>

                            </td>
                        </tr>
                        @endif
                        @if($timbalan != null)

                        <?php $bil++; ?>
                        <tr>
                            <td>{{ $bil }}</td>
                            <td>
                                {{ $timbalan->nama }} <br />
                                <font color="green"><strong><small>{{ $timbalan->role }} KETUA KONTINJEN</small></strong></font>
                            </td>
                            <td>{{ $timbalan->nokp }}</td>
                            <td>{{ $timbalan->notel }}</td>
                            <td>{{ $timbalan->jantina }}</td>
                            <td>
                                <a href="{{ route('kontinjen-kemaskini', $timbalan->id) }}"><button class="btn alert-info">Kemaskini</button></a>
                                <a href="{{ route('kontinjen-hapus', $timbalan->id) }}"><button class="btn alert-danger">Hapus</button></a>
                            </td>
                        </tr>
                        @endif

                        @if($urusetias != null)
                            @foreach($urusetias as $urusetia)
                            <?php $bil++; ?>
                            <tr>
                                <td>{{ $bil }}</td>
                                <td>
                                    {{ $urusetia->nama }} <br />
                                    <font color="green"><strong><small>{{ $urusetia->role }} {{ $loop->iteration }}</small></strong></font>
                                </td>
                                <td>{{ $urusetia->nokp }}</td>
                                <td>{{ $urusetia->notel }}</td>
                                <td>{{ $urusetia->jantina }}</td>
                                <td>
                                    <a href="{{ route('kontinjen-kemaskini', $urusetia->id) }}"><button class="btn alert-info">Kemaskini</button></a>
                                    <a href="{{ route('kontinjen-hapus', $urusetia->id) }}"><button class="btn alert-danger">Hapus</button></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif



                        <!-- END CODING HERE -->
                    </table>

                </div>
            </div>
        </div>

        <div class="col-xs-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Kemaskini Maklumat Kontinjen</h4></div>
                <div class="panel-body">
                {!! Form::model(@$kontinjen, ['route' => ['kontinjen-post', @$kontinjen], 'method' => 'post', 'autocomplete' => 'off']) !!}

                {!! Form::label('*Nama') !!}
                {!! Form::text('nama', @$kontinjen->nama, ['class' => 'form-control', 'required']) !!}

                {!! Form::label('*Posisi') !!}
                {!! Form::select('role', ['KETUA' => 'KETUA KONTINJEN', 'TIMBALAN' => 'TIMBALAN', 'URUSETIA' => 'URUSETIA'], @$kontinjen->role, ['class' => 'form-control', 'placeholder' => 'Posisi', 'required']) !!}

                {!! Form::label('*No KP') !!}
                {!! Form::text('nokp', @$kontinjen->nokp, ['class' => 'form-control', 'required']) !!}

                {!! Form::label('*No Tel') !!}
                {!! Form::text('notel', @$kontinjen->notel, ['class' => 'form-control', 'required']) !!}

                {!! Form::label('*Jantina') !!}
                {!! Form::select('jantina', ['LELAKI' => 'LELAKI', 'WANITA' => 'WANITA'], @$kontinjen->jantina, ['class' => 'form-control', 'required', 'placeholder' => 'Jantina']) !!}

                {!! Form::hidden('agensi_id', Auth::user()->agensi_id) !!}

                <br>
                <div align="right">
                    {!! Form::submit('Daftar', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
