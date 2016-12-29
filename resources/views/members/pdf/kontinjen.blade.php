@extends('layouts.pdf')

@section('content')

<div class="containter-fluid">
	<div class="col-xs-12">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Maklumat Kontinjen {{ $agensi->kod }}</h3></div>
				<div class="panel-body">
                    <table class="table table-hover">
                        @forelse($contingents as $contingent)
                            <tr>
                                <td>{{ $contingent->role }} KONTINJEN</td>
                                <td>{{ $contingent->nama }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2"><div class="alert">TIADA MAKLUMAT</div></td>
                            </tr>
                        @endforelse
                    </table>

                </div>
			</div>
		</div>
	</div>
</div>

@endsection