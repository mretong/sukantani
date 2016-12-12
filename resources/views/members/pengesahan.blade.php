@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			
			<div class="panel panel-primary">
				<div class="panel-heading" align="center"><h4>Perakuan Pengesahan</h4></div>
				<div class="body" style="margin: 10px">
					<p>Dengan ini saya mengesahkan bahawa maklumat di bawah adalah benar!</p>

					@if($pengesahan->status == "TIDAK")
						<div align="right">
							{!! Form::open() !!}
								<button class="btn btn-primary">SAH</button>
							{!! Form::close() !!}

						</div>
					@else
						<div align="center"><font color="green"><strong>Pengesahan telah dilakukan.</strong></font></div>

					@endif
				</div>

			</div>
		</div>	
	</div>
</div>



@endsection