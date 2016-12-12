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
                    <tr>
                        <td>1. </td>
                        <td>{{ $contingent->ketua }}</td>
                        <td>Ketua Kontinjen</td>
                        <td align="center">{{ $agency->kod2 }}01</td>
                    </tr>
                    <tr>
                        <td>2. </td>
                        <td>{{ $contingent->timbalan }}</td>
                        <td>Timbalan Ketua Kontinjen</td>
                        <td align="center">{{ $agency->kod2 }}02</td>
                    </tr>
                    <tr>
                        <td>3. </td>
                        <td>{{ $contingent->urusetia1 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}03</td>
                    </tr>
                    <tr>
                        <td>4. </td>
                        <td>{{ $contingent->urusetia2 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}04</td>
                    </tr>
                    <tr>
                        <td>5. </td>
                        <td>{{ $contingent->urusetia3 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}05</td>
                    </tr>
                    <tr>
                        <td>6. </td>
                        <td>{{ $contingent->urusetia4 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}06</td>
                    </tr>
                    <tr>
                        <td>7. </td>
                        <td>{{ $contingent->urusetia5 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}07</td>
                    </tr>
                    <tr>
                        <td>8. </td>
                        <td>{{ $contingent->urusetia6 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}08</td>
                    </tr>
                    <tr>
                        <td>9. </td>
                        <td>{{ $contingent->urusetia7 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}09</td>
                    </tr>
                    <tr>
                        <td>10. </td>
                        <td>{{ $contingent->urusetia8 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}10</td>
                    </tr>
                    <tr>
                        <td>11. </td>
                        <td>{{ $contingent->urusetia9 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}11</td>
                    </tr>
                    <tr>
                        <td>12. </td>
                        <td>{{ $contingent->urusetia10 }}</td>
                        <td>Urusetia</td>
                        <td align="center">{{ $agency->kod2 }}12</td>
                    </tr>
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