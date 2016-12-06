@extends('layouts.pdf')

@section('content')

<div class="container">
	
	<div class="col-xs-12">

		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Ringkasan Maklumat Penginapan</h4></div>
			<div class="panel-body">

				@foreach($agencies as $agency)

					@if($loop->first)
						<table class="table table-condensed">
							<tr>
								<td align="center"><h4><strong>{{ $agency->kod }}</strong></h4></td>
							</tr>
						</table>
						<table class="table table-condensed table-striped">
					@endif

					@if(!$loop->first)
                        <div class="page-break"></div>
                        <table class="table table-condensed">
							<tr>
								<td align="center"><h4><strong>{{ $agency->kod }}</strong></h4></td>
							</tr>
						</table>
						<table class="table table-condensed table-striped">
					@endif

						<?php $kLelaki = $kWanita = 0; ?>						
						@foreach($acaras as $acara)

							@if($loop->first || ($loop->iteration % 6) != 0)
								<tr>
									<td>
										<strong>#{{ $loop->index + 1}} {{ $acara->nama }}</strong><br />
										LELAKI : {{ 	
													$acara->peserta->where('agensi_id', $agency->id)
														->where('jantina', 'LELAKI')
														->count()
												}} <br />
										<?php 
											$kLelaki += $acara->peserta->where('agensi_id', $agency->id)
													->where('jantina', 'LELAKI')
													->count();
										?>
										WANITA : {{ 	
													$acara->peserta->where('agensi_id', $agency->id)
														->where('jantina', 'WANITA')
														->count()
												}} <br />
										<?php
											$kWanita += $acara->peserta->where('agensi_id', $agency->id)
													->where('jantina', 'WANITA')
													->count();
										?>
									</td>
								</tr>
							@endif

							@if($loop->iteration % 6 == 0)
								<div class="page-break"></div>
								<tr>
									<td>
										<strong>#{{ $loop->index + 1}} {{ $acara->nama }}</strong><br />
										LELAKI : {{ 	
													$acara->peserta->where('agensi_id', $agency->id)
														->where('jantina', 'LELAKI')
														->count()
												}} <br />
										<?php 
											$kLelaki += $acara->peserta->where('agensi_id', $agency->id)
													->where('jantina', 'LELAKI')
													->count();
										?>
										WANITA : {{ 	
													$acara->peserta->where('agensi_id', $agency->id)
														->where('jantina', 'WANITA')
														->count()
												}} <br />
										<?php 
											$kWanita += $acara->peserta->where('agensi_id', $agency->id)
													->where('jantina', 'WANITA')
													->count();
										?>
									</td>
								</tr>
							@endif

						@endforeach

						<tr>
							<td>
								<div align="right">
									<strong>### KESELURUHAN ###</strong><br />
									LELAKI : {{ $kLelaki }} <br />
									WANITA :  {{ $kWanita }}<br />
								</div>
							</td>
						</tr>
					</table>
				@endforeach <!-- AGENSI -->


			</div>
		</div>


	</div>
</div>


@endsection