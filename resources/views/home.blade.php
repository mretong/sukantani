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
        <div class="col-xs-6">
        <div align="right"><span class="glyphicon glyphicon-download-alt"></span> <a href="{{ route('pdf-kontinjen', Auth::user()->agensi_id) }}" target="_blank"> PDF </a></div>
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Maklumat Kontinjen</h4></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <td><strong>Nama Kontinjen</strong></td>
                            <td>{{ Auth::user()->agensi->nama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ketua Kontinjen</strong></td>
                            <td>{{ @$kontinjen->ketua }}</td>
                        </tr>
                        <tr>
                            <td><strong>Timbalan Ketua Kontinjen</strong></td>
                            <td>{{ @$kontinjen->timbalan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 1</strong></td>
                            <td>{{ @$kontinjen->urusetia1 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 2</strong></td>
                            <td>{{ @$kontinjen->urusetia2 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 3</strong></td>
                            <td>{{ @$kontinjen->urusetia3 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 4</strong></td>
                            <td>{{ @$kontinjen->urusetia4 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 5</strong></td>
                            <td>{{ @$kontinjen->urusetia5 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 6</strong></td>
                            <td>{{ @$kontinjen->urusetia6 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 7</strong></td>
                            <td>{{ @$kontinjen->urusetia7 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 8</strong></td>
                            <td>{{ @$kontinjen->urusetia8 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 9</strong></td>
                            <td>{{ @$kontinjen->urusetia9 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 10</strong></td>
                            <td>{{ @$kontinjen->urusetia10 }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-xs-5 col-xs-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Kemaskini Maklumat Kontinjen</h4></div>
                <div class="panel-body">
                {!! Form::model(@$kontinjen, ['route' => ['kontinjen-post', @$kontinjen], 'method' => 'post', 'autocomplete' => 'off']) !!}

                {!! Form::label('Nama Kontinjen') !!}
                {!! Form::text('nama', Auth::user()->agensi->nama, ['class' => 'form-control', 'readonly']) !!}

                {!! Form::label('Nama Ketua Kontinjen') !!}
                {!! Form::text('ketua', @$kontinjen->ketua, ['class' => 'form-control']) !!}

                {!! Form::label('Nama Timbalan Ketua Kontinjen') !!}
                {!! Form::text('timbalan', @$kontinjen->timbalan, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 1') !!}
                {!! Form::text('urusetia1', @$kontinjen->urusetia1, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 2') !!}
                {!! Form::text('urusetia2', @$kontinjen->urusetia2, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 3') !!}
                {!! Form::text('urusetia3', @$kontinjen->urusetia3, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 4') !!}
                {!! Form::text('urusetia4', @$kontinjen->urusetia4, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 5') !!}
                {!! Form::text('urusetia5', @$kontinjen->urusetia5, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 6') !!}
                {!! Form::text('urusetia6', @$kontinjen->urusetia6, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 7') !!}
                {!! Form::text('urusetia7', @$kontinjen->urusetia7, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 8') !!}
                {!! Form::text('urusetia8', @$kontinjen->urusetia8, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 9') !!}
                {!! Form::text('urusetia9', @$kontinjen->urusetia9, ['class' => 'form-control']) !!}

                {!! Form::label('Urusetia 10') !!}
                {!! Form::text('urusetia10', @$kontinjen->urusetia10, ['class' => 'form-control']) !!}

                {!! Form::hidden('agensi_id', Auth::user()->agensi_id) !!}

                <br>
                <div align="right">
                    {!! Form::submit('Kemaskini', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
