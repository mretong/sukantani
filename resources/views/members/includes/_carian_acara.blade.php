{!! Form::open(['route' => 'carian-acara-post']) !!}

{!! Form::label('Acara') !!}
{!! Form::select('acara_id', $games, '', ['class' => 'form-control', 'placeholder' => 'PILIH ACARA']) !!}

{!! Form::label('') !!}
<div align="right">{!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}