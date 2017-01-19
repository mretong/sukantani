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
							<td><strong>Acara</strong></td>
							<td><strong>Foto</strong></td>
							<td><strong>Pilihan</strong></td>
						</tr>

						@if(!empty($participants))
							@foreach($participants as $participant)
								<tr>
									<td>
									<a href="{{ route('peserta-info', $participant->id) }}" title="Klik Untuk Maklumat Profil" target="_blank"> {{ $participant->nama }}</a><br />
									{{ $participant->noAtlet }}

									</td>
									<td>
										{{ $participant->nokp }} <br />
										{{ $participant->notel }}
									</td>
									<td>{{ $participant->jantina }}</td>
									<td>{{ $participant->tarafJawatan }}</td>
									<td>{{ $participant->gredJawatan }}</td>
									<td>{{ $participant->noPekerja }}</td>
									<td>
									@unless($participant->acara->isEmpty())
										<ul>
										@foreach($participant->acara as $acara)
											<li>{{ $acara->nama }}</li>
										@endforeach
										</ul>
									@endunless

									</td>									
									<td>
										@if($participant->photo)
											<img src="{{ asset($participant->photo) }}" height="50" width="50" class="profile">
										@else
											<img src="{{ asset('/images/peserta/noPhoto.svg') }}" height="50" width="50" class="profile">
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

        <?php $readonly = 'readonly'; ?>
        @if(Auth::user()->id == 13 || Auth::user()->id == 6 || Auth::user()->id == 5)
            <?php $readonly = ''; ?>
        @endif

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Pendaftaran Peserta</strong></div>

                <div class="panel-body">

        		{!! Form::open(['files' => 'true', 'autocomplete' => 'off']) !!}

        		<div class="form-group">
	        		{!! Form::label('Adakah Vegetarian?') !!}<br />
					{!! Form::radio('vege', 'YA', true) !!} YA <br />
					{!! Form::radio('vege', 'TIDAK', true) !!} TIDAK <br />
                </div>

                <div class="form-group">
                	{!! Form::label('*Nama Penuh') !!}	
                	{!! Form::text('nama', '', ['class' => 'form-control', 'autofocus' => 'on', $readonly]) !!}
            	</div>

				{!! Form::label('*No Kad Pengenalan') !!}	
				{!! Form::text('nokp', '', ['class' => 'form-control', 'placeholder' => 'Contoh : 710150025697', $readonly]) !!}

				{!! Form::label('No Telefon') !!}	
				{!! Form::text('notel', '', ['class' => 'form-control', 'placeholder' => 'Contoh : 0123456789']) !!}

				{!! Form::label('*Jantina') !!}	
				{!! Form::select('jantina', ['Jantina', 'LELAKI' => 'LELAKI', 'WANITA' => 'WANITA'], '', ['class' => 'form-control']) !!}

				{!! Form::label('*Taraf Jawatan') !!}
				{!! Form::text('tarafJawatan', '', ['class' => 'form-control', 'placeholder' => 'Contoh : TETAP']) !!}

				{!! Form::label('Gred jawatan') !!}	
				{!! Form::text('gredJawatan', '', ['class' => 'form-control', 'placeholder' => 'CONTOH : E41']) !!}

				{!! Form::label('No Pekerja / No KWSP') !!}	
				{!! Form::text('noPekerja', '', ['class' => 'form-control']) !!}

				{!! Form::label('Tarikh lantikan') !!}	
				{!! Form::text('tarikhLantikan', '', ['class' => 'form-control', 'placeholder' => 'Contoh: 16082008']) !!}

				{!! Form::label('*Penyertaan') !!}
				{!! Form::select('role', ['ATLET' => 'ATLET', 'PENGURUS' => 'PENGURUS', 'JURULATIH' => 'JURULATIH'], '', ['class' => 'form-control', 'id' => 'penyertaan']) !!}

				{!! Form::label('*Acara') !!}
				@foreach($games as $game)
					 <br />{!! Form::checkbox('acara[]', $game->id) !!} {{ $game->nama }}
				@endforeach

				<br />
				<!-- {!! Form::label('Agensi') !!}	 -->
				{!! Form::hidden('agensi_id', Auth::user()->agensi->kod) !!}

				{!! Form::label('*Gambar berukuran passpot') !!}	
				{!! Form::file('photo', '', ['class' => 'form-control']) !!}

				{!! Form::hidden('agensi_id', Auth::user()->agensi_id) !!}

				<br />
				<div align="right">

					{!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
					{!! Form::submit('Daftar Peserta', ['class' => 'btn btn-primary']) !!}
					
					
				</div>

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