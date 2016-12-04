@extends('layouts.pdf')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">

                <div class="panel-heading"><strong>{{ Auth::User()->agensi->kod }} :: {{ Auth::User()->agensi->nama }}</strong></div>

                <div class="panel-body">

                @foreach($pesertas as $peserta)                    

                    @if($loop->index == 0)
                        <table class="table table-hover">
						<tr>
							<td><strong>Bil</strong></td>
							<td><strong>Vegetarian</strong></td>
							<td><strong>Nama</strong></td>
							<td><strong>No KP</strong></td>
							<td><strong>Jantina</strong></td>
							<td><strong>Taraf Jawatan</strong></td>
							<td><strong>Gred jawatan</strong></td>
							<td><strong>No Pekerja / No KWSP</strong></td>
							<td><strong>Tarikh Lantikan</strong></td>
						</tr>
                    @endif

                    @if($loop->index != 0 && (($loop->index + 1) % 11) == 0)
                        </table>
                        <div class="page-break"></div>
                        <table class="table table-hover">
						<tr>
							<td><strong>Bil</strong></td>
							<td><strong>Vegetarian</strong></td>
							<td><strong>Nama</strong></td>
							<td><strong>No KP</strong></td>
							<td><strong>Jantina</strong></td>
							<td><strong>Taraf Jawatan</strong></td>
							<td><strong>Gred jawatan</strong></td>
							<td><strong>No Pekerja / No KWSP</strong></td>
							<td><strong>Tarikh Lantikan</strong></td>
						</tr>
                    @endif

        				<tr>
							<td>{{ $loop->index + 1 }}</td>
							<td>{{ $peserta->vege }}</td>
							<td>{{ $peserta->nama }}</td>
							<td>{{ $peserta->nokp }}</td>
							<td>{{ $peserta->jantina }}</td>
							<td>{{ $peserta->tarafJawatan }}</td>
							<td>{{ $peserta->gredJawatan }}</td>
							<td>{{ $peserta->noPekerja }}</td>
							<td>{{ $peserta->tarikhLantikan }}</td>
						</tr>
    				
                @endforeach
				</table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection