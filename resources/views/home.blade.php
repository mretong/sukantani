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
                <div class="panel-heading"><h4>Maklumat Kontinjen {{ $agensi->kod }}</h4></div>
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

                        @forelse($contingents as $contingent)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $contingent->nama }}<br />
                                    <strong><small><font color="green">{{ $contingent->role }}</font></small></strong>
                                </td>
                                <td>{{ $contingent->nokp }}</td>
                                <td>{{ $contingent->notel }}</td>
                                <td>{{ $contingent->jantina }}</td>
                                <td>
                                    <a href="{{ route('kontinjen-kemaskini', $contingent->id) }}"><button class="btn alert-info">Kemaskini</button></a>
                                    <a href="{{ route('kontinjen-hapus', $contingent->id) }}"><button class="btn alert-danger">Gugur</button></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"><div class="alert alert-danger">Tiada Maklumat</div></td>
                            </tr>
                        @endforelse

                        <!-- END CODING HERE -->
                    </table>

                </div>
            </div>
        </div>

        <div class="col-xs-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Pendaftaran Maklumat Kontinjen</h4></div>
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
