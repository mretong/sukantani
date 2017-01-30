{!! Form::open(['route' => 'laporan-pengurus-pertandingan-post']) !!}

{!! Form::label('ACARA') !!}
{!! Form::select('acara_id', $games, '', ['class' => 'form-control', 'placeholder' => 'PILIH PERTANDINGAN']) !!}

{!! Form::label('') !!}
<div align="right">{!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}