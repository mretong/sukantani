<h3>Carian Senarai Atlet Mengikut Nama</h3>

{!! Form::open(['route' => 'carianNama-post', 'autocomplete' => 'off']) !!}

{!! Form::label('Nama') !!}
{!! Form::text('nama', '', ['class' => 'form-control', 'required' => 'true',  'placeholder' => 'NAMA...']) !!}

{!! Form::label('') !!}
<div align="right">{!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}