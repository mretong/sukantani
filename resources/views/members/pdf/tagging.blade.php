@extends('layouts.pdf')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-xs-12">
        <h3>Senarai Tagging :: {{ $agency->nama }}</h3>
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Senarai Kontinjen</h4></div>

            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <tr>
                        <td><strong>Bil</strong></td>
                        <td><strong>Nama</strong></td>
                        <td><strong>Jawatan</strong></td>
                        <td><strong>No Atlet/Pegawai</strong></td>
                    </tr>
                    @forelse($contingents as $contingent)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contingent->nama }}</td>
                        <td>{{ $contingent->role }}</td>
                        <td align="center">{{ $agency->kod2 }}01</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4"><div class="alert alert-danger">Tiada Maklumat.</div></td>
                    </tr>

                    @endforelse
                </table>


            </div>
        </div>

        <div class="page-break"></div>
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Senarai Atlet</h4></div>

            <div class="panel-body">

                @foreach($participants as $participant)                    

                    @if($loop->index == 0)
                        <table class="table table-hover table-striped">
                        <tr>
                            <td><strong>Bil</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>No KP</strong></td>
                            <td><strong>No Atlet</strong></td>
                        </tr>
                    @endif

                    @if($loop->index != 0 && (($loop->index + 1) % 18) == 0)
                        </table>
                        <div class="page-break"></div>
                        <table class="table table-hover table-striped">
                        <tr>
                            <td><strong>Bil</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>No KP</strong></td>
                            <td><strong>No Atlet</strong></td>
                        </tr>
                    @endif

        				<tr>
    						<td>{{ $loop->index + 1 }}</td>
    						<td>
                                @if($participant['role'] == 'PENGURUS' || $participant['role'] == 'JURULATIH')
                                    <font color="green"><strong>{{ $participant['role'] }}</strong></font> <br />
                                @endif
                                {{ $participant['nama'] }}
                            </td>
    						<td>{{ $participant['nokp'] }}</td>
    						<td>{{ $participant['noAtlet'] }}</td>
        				</tr>
    				
                @endforeach
                    </table>


            </div>
        </div>
        </div>
    </div>
</div>

@endsection