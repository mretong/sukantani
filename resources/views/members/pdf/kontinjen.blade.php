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

                            @if(($loop->iteration % 10) == 0)
                                <div class="page-break"></div>
                                </table>
                                <table class="table table-hover">
                                <tr>
                                    <td>{{ $contingent->role }} KONTINJEN</td>
                                    <td>{{ $contingent->nama }}</td>
                                    <td>{{ $contingent->nokp }}</td>
                                    <td>{{ $contingent->jantina }}</td>
                                    <td>{{ $contingent->notel }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $contingent->role }} KONTINJEN</td>
                                    <td>{{ $contingent->nama }}</td>
                                    <td>{{ $contingent->nokp }}</td>
                                    <td>{{ $contingent->jantina }}</td>
                                    <td>{{ $contingent->notel }}</td>
                                </tr>
                            @endif

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