@extends('layouts.app')

@section('content')

<div class="container">
	
	<div class="col-xs-4">
			
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Ringkasan Maklumat Penginapan</h4></div>
			<div class="panel-body">

				@foreach($agencies as $agency)

					<table class="table table-condensed">
						<tr>
							<td align="center"><h4><strong>{{ $agency->kod }}</strong></h4></td>
						</tr>
					</table>
					<table class="table table-condensed table-striped">
						
						@foreach($acaras as $acara)

							<tr>
								<td>
									<strong>#{{ $loop->index + 1}} {{ $acara->nama }}</strong><br />
									LELAKI : {{ 	
												$acara->peserta->where('agensi_id', $agency->id)
													->where('jantina', 'LELAKI')
													->count()
											}} <br />
									WANITA : {{ 	
												$acara->peserta->where('agensi_id', $agency->id)
													->where('jantina', 'WANITA')
													->count()
											}} <br />

								</td>
							</tr>
						@endforeach
						<tr>
							<td>
								<hr />
								<div align="right"><strong>### KESELURUHAN ###</strong><br />
								LELAKI :  <br />
								WANITA :  <hr height="2" />
								</div>

							</td>
						</tr>
					</table>
					<br />

				@endforeach


			</div>
		</div>


	</div>
</div>


@endsection