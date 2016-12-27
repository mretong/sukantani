@extends('layouts.app')

@section('content')

<div class="container-fluid">

	<div class="row">
		<div class="col-xs-3 col-xs-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4 class="panel-title">Duplikasi</h4></div>
				<div class="panel-body">

					<table class="table table-condensed table-striped">
					<tr>
						<td><strong>Bil</strong></td>
						<td><strong>No Atlet</strong></td>
						<td><strong>Bilangan Ulangan</strong></td>
					</tr>
					@foreach($collections as $collection)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $collection->noAtlet }}</td>
						<td>{{ $collection->count }}</td>
					</tr>
					@endforeach

				</table>
			
				</div>
			</div>

		</div>	
	</div>
</div>



@endsection