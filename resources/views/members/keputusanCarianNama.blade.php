@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
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
									<a href="{{ route('peserta-info', $participant->id) }}" title="Klik Untuk Maklumat Tambahan" target="_blank"> {{ $participant->nama }}</a><br />
									<font color="green"><strong>{{ $participant->role }}</strong></font> <br />
									{{ $participant->noAtlet }} 

									</td>
									<td>{{ $participant->nokp }}</td>
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
    </div>
</div>



@endsection