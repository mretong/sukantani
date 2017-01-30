{!! Form::open(['route' => 'laporan-agensi-acara-post2']) !!}

{!! Form::label('Agensi') !!}
{!! Form::select('agensi_id', $agencies, '', ['class' => 'form-control', 'placeholder' => 'PILIH AGENSI...']) !!}

{!! Form::label('') !!}
<div align="right">{!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}