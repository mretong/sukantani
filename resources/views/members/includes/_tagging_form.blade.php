<h3>Tagging :: Ekspot ke PDF</h3>

{!! Form::open(['route' => 'pdf-tag']) !!}

{!! Form::label('Acara') !!}
{!! Form::select('id', $agencies, '', ['class' => 'form-control', 'placeholder' => 'PILIH ACARA...']) !!}

{!! Form::label('') !!}
<div align="right">{!! Form::submit('Ekspot ke PDF', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}