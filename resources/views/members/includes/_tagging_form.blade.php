<h3>Tagging :: Ekspot ke PDF</h3>

{!! Form::open(['route' => 'pdf-tag']) !!}

{!! Form::label('AGENSI') !!}
{!! Form::select('id', $agencies, '', ['class' => 'form-control', 'placeholder' => 'PILIH AGENSI']) !!}

{!! Form::label('') !!}
<div align="right">{!! Form::submit('Ekspot ke PDF', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}