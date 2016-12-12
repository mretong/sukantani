@extends('layouts.app')

@section('content')

<style type="text/css">
	
input {
	text-transform: uppercase;
}

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-9">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>

                <div class="panel-body">
                	
                	<br />
                    <table class="table table-hover">
                    	<tr>
                    		<th colspan="7">Senarai Peserta </th>
                    		<th colspan="3"><div align="right">(Jumlah : {{ $count }} Peserta)</div></th>
                    	</tr>
						<tr>
							<td><strong>Nama</strong></td>
							<td><strong>No KP</strong></td>
							<td><strong>Jantina</strong></td>
							<td><strong>Taraf Jawatan</strong></td>
							<td><strong>Gred jawatan</strong></td>
							<td><strong>No Pekerja / No KWSP</strong></td>		
							<td><strong>Tarikh Lantikan</strong></td>
							<td><strong>Agensi</strong></td>
							<td><strong>Foto</strong></td>
							<td><strong>Pilihan</strong></td>
						</tr>

						@if(!empty($participants))
							@foreach($participants as $participant)
								<tr>
									<td><a href="{{ route('peserta-info', $participant->id) }}" title="Klik Untuk Maklumat Tambahan" target="_blank"> {{ $participant->nama }}</a></td>
									<td>{{ $participant->nokp }}</td>
									<td>{{ $participant->jantina }}</td>
									<td>{{ $participant->tarafJawatan }}</td>
									<td>{{ $participant->gredJawatan }}</td>
									<td>{{ $participant->noPekerja }}</td>
									<td>{{ $participant->tarikhLantikan }}</td>
									<td>{{ $participant->agensi->kod }}</td>									
									<td>
										@if($participant->photo)
											<img src="{{ asset($participant->photo) }}" height="50" width="50">
										@else
											<img src="{{ asset('/images/peserta/noPhoto.svg') }}" height="50" width="50">
										@endif
									</td>
									<td>
									<a href="{{ route('peserta-kemaskini', $participant->id) }}"><span class="btn alert-info">Kemaskini</span></a>
									<a href="{{ route('peserta-hapus', $participant->id) }}"><span class="btn alert-danger">Hapus</span></a>
									</td>
								</tr>
							@endforeach
						@else
						<tr>
							<td colspan="8" class="alert alert-danger">Tiada Data</td>
						</tr>
						@endif
					</table>

					<div align="center">{{ @$participants->render() }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Kemaskini Peserta</strong></div>

                <div class="panel-body">

        		{!! Form::model($peserta, ['route' => ['peserta-kemaskini-post', $peserta->id], 'files' => 'true', 'autocomplete' => 'off']) !!}

        		{!! Form::hidden('id', $peserta->id) !!}

        		<div class="form-group">
	        		{!! Form::label('Adakah Vegetarian?') !!}<br />
					{!! Form::radio('vege', 'YA', $peserta->vege) !!} YA <br />
					{!! Form::radio('vege', 'TIDAK', $peserta->vege) !!} TIDAK <br />
                </div>
                	
                <div class="form-group">
                	{!! Form::label('Nama Penuh') !!}	
                	{!! Form::text('nama', $peserta->nama, ['class' => 'form-control', 'autofocus' => 'on']) !!}
            	</div>

				{!! Form::label('No Kad Pengenalan') !!}	
				{!! Form::text('nokp', $peserta->nokp, ['class' => 'form-control', 'placeholder' => 'Contoh : 710150025697']) !!}

				{!! Form::label('No Telefon') !!}	
				{!! Form::text('notel', $peserta->notel, ['class' => 'form-control', 'placeholder' => 'Contoh : 0123456789']) !!}

				{!! Form::label('Jantina') !!}	
				{!! Form::select('jantina', ['Jantina', 'LELAKI' => 'LELAKI', 'WANITA' => 'WANITA'], $peserta->jantina, ['class' => 'form-control']) !!}

				{!! Form::label('Taraf Jawatan') !!}
				{!! Form::text('tarafJawatan', $peserta->tarafJawatan, ['class' => 'form-control', 'placeholder' => 'Contoh : TETAP']) !!}

				{!! Form::label('Gred jawatan') !!}	
				{!! Form::text('gredJawatan', $peserta->gredJawatan, ['class' => 'form-control']) !!}

				{!! Form::label('No Pekerja / No KWSP') !!}	
				{!! Form::text('noPekerja', $peserta->noPekerja, ['class' => 'form-control']) !!}

				{!! Form::label('Tarikh lantikan') !!}	
				{!! Form::text('tarikhLantikan', $peserta->tarikhLantikan, ['class' => 'form-control', 'placeholder' => 'Contoh: 06082008']) !!}

				{!! Form::label('Penyertaan') !!}
				{!! Form::select('role', ['ATLET' => 'ATLET', 'PENGURUS' => 'PENGURUS', 'JURULATIH' => 'JURULATIH'], $peserta->role, ['class' => 'form-control', 'id' => 'penyertaan']) !!}

				{!! Form::label('Acara') !!}
				@foreach($games as $game)
					<?php
						$play = '';
						if(in_array($game->id, $participates))
							$play = 'true';
					?>
					 <br />{!! Form::checkbox('acara[]', $game->id, $play) !!} {{ $game->nama }}
				@endforeach

				<br />
				<!-- {!! Form::label('Agensi') !!}	 -->
				{!! Form::hidden('agensi_id', Auth::user()->agensi->kod, ['class' => 'form-control', 'readonly']) !!}

				{!! Form::label('Gambar Berukuran Passpot') !!}	
				{!! Form::file('photo', '', ['class' => 'form-control']) !!}

				{!! Form::hidden('agensi_id', Auth::user()->agensi_id) !!}

				<div align="right"><button class="btn btn-primary">Kemaskini</button></div>

                {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


@section('js')

<script type="text/javascript">
	
$('input[type=text]').keyup(function() {
	$(this).val($(this).val().toUpperCase());
});

$('#penyertaan').change(function() {

	var val = $('#penyertaan').val();
	
	if(val != 'ATLET'){
		swal({
	      title: "<strong>Peringatan Mesra</strong>",
	      text: "Bagi Penyertaan sebagai Pengurus atau Jurulatih, hanya satu acara dibenarkan.",
	      html: true
    });
	}
})

</script>

@endsection