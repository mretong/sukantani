<h3>Carian Senarai Atlet Mengikut Acara</h3>

{!! Form::open(['route' => 'carian-post']) !!}

{!! Form::label('Acara') !!}
{!! Form::select('acara', $acaras, '', ['class' => 'form-control', 'placeholder' => 'PILIH ACARA...']) !!}

{!! Form::label('') !!}
<div align="right">{!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}