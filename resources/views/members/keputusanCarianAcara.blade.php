@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-10">
            <div class="panel panel-primary">
                <div class="panel-heading"><h2 class="panel-title">{{ $acara->nama }}</h3></div>

                <div class="panel-body">
                	
                	<br />
                    <table class="table table-hover">
                    	<tr>
                    		<th colspan="10">Senarai Atlet </th>
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
						</tr>

						@if(!empty($pesertas))
							@foreach($pesertas as $peserta)
								<tr>
									<td>
									<a href="{{ route('peserta-info', $peserta->id) }}" title="Klik Untuk Maklumat Tambahan" target="_blank"> {{ $peserta->nama }}</a><br />
									<font color="green"><strong>{{ $peserta->role }}</strong></font> <br />
									{{ $peserta->noAtlet }}

									</td>
									<td>
										<strong><font color="blue">{{ $peserta->agensi->kod }}</font></strong> <br />
										{{ $peserta->nokp }}
									</td>
									<td>{{ $peserta->jantina }}</td>
									<td>{{ $peserta->tarafJawatan }}</td>
									<td>{{ $peserta->gredJawatan }}</td>
									<td>{{ $peserta->noPekerja }}</td>
									<td>
										@unless($peserta->acara->isEmpty())
											<ul>
											@foreach($peserta->acara as $acara)
												<li>{{ $acara->nama }}</li>
											@endforeach
											</ul>
										@endunless

									</td>									
									<td>
										@if($peserta->photo)
											<img src="{{ asset($peserta->photo) }}" height="50" width="50" class="profile">
										@else
											<img src="{{ asset('/images/peserta/noPhoto.svg') }}" height="50" width="50" class="profile">
										@endif
									</td>
								</tr>
							@endforeach
						@else
						<tr>
							<td colspan="8" class="alert alert-danger">Tiada Data</td>
						</tr>
						@endif
					</table>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection