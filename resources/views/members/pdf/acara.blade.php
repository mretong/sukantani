@extends('layouts.pdf')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Senarai Atlet Mengikut Acara -> {{ ucwords(strtolower($acara->nama)) }}</h4></div>

            <div class="panel-body">

    				@foreach($pesertas as $peserta) 

                        @if($loop->index == 0)
                            <table class="table table-hover table-striped table-bordered">
                            <tr>
                                <td><strong>Bil</strong></td>
                                <td><strong>Nama</strong></td>
                                <td><strong>No KP</strong></td>
                                <td><strong>Jantina</strong></td>
                                <td width="50"><strong>Acara</strong></td>
                            </tr>
                        @endif
                        @if($loop->index != 0 && (($loop->iteration) % 9) == 0)
                            </table>
                            <div class="page-break"></div>
                            <table class="table table-hover table-striped table-bordered">
                            <tr>
                                <td><strong>Bil</strong></td>
                                <td><strong>Nama</strong></td>
                                <td><strong>No KP</strong></td>
                                <td><strong>Jantina</strong></td>
                                <td width="50"><strong>Acara</strong></td>
                            </tr>
                        @endif
    				<tr>
						<td>{{ $loop->iteration }}</td>
						<td>
                            @if($peserta->role == 'PENGURUS' || $peserta->role == 'JURULATIH')
                                    <font color="green"><strong>{{ $peserta->role }}</strong></font> <br />
                            @endif
                            {{ $peserta->nama }}<br />
                            <font color="lightblue">{{ $peserta->agensi->kod }}</font> <br />
                            {{ $peserta->nolet }}
                        </td>
						<td>
                            {{ $peserta->nokp }} <br />
                            {{ $peserta->notel }}

                        </td>
                        <td>{{ $peserta->jantina }}</td>
                        <td>
                            <ul>
                            @foreach($peserta->acara as $acara)
                                <li>{{ $acara->nama }}</li>
                            @endforeach
                            </ul>
                        </td>
    				</tr>

    				@endforeach

        		</table>


            </div>
        </div>
        </div>
    </div>
</div>

@endsection