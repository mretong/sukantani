@extends('layouts.pdf')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Senarai Atlet Mengikut Acara {{ ucwords(strtolower($acara->nama)) }}</h4></div>

            <div class="panel-body">

    				@foreach($participants as $participant) 

                        @if($loop->index == 0)
                            <table class="table table-hover table-striped">
                            <tr>
                                <td><strong>Bil</strong></td>
                                <td><strong>Nama</strong></td>
                                <td><strong>No KP</strong></td>
                                <td><strong>Jantina</strong></td>
                            </tr>
                        @endif
                        @if($loop->index != 0 && (($loop->iteration) % 10) == 0)
                            </table>
                            <div class="page-break"></div>
                            <table class="table table-hover table-striped">
                            <tr>
                                <td><strong>Bil</strong></td>
                                <td><strong>Nama</strong></td>
                                <td><strong>No KP</strong></td>
                                <td><strong>Jantina</strong></td>
                            </tr>
                        @endif
    				<tr>
						<td>{{ $loop->iteration }}</td>
						<td>
                            @if($participant['role'] == 'PENGURUS' || $participant['role'] == 'JURULATIH')
                                    <font color="green"><strong>{{ $participant['role'] }}</strong></font> <br />
                            @endif
                            {{ $participant['nama'] }}<br />
                            {{ $participant['noAtlet'] }}
                        </td>
						<td>
                            {{ $participant['nokp'] }} <br />
                            {{ $participant['notel'] }}

                        </td>
						<td>{{ $participant['jantina'] }}</td>
    				</tr>

    				@endforeach

        		</table>


            </div>
        </div>
        </div>
    </div>
</div>

@endsection