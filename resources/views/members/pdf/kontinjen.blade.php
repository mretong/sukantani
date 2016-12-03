@extends('layouts.pdf')

@section('content')

<div class="containter-fluid">
	<div class="col-xs-12">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Maklumat Kontinjen</h3></div>
				<div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <td><strong>Nama Kontinjen</strong></td>
                            <td>{{ Auth::user()->agensi->nama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ketua Kontinjen</strong></td>
                            <td>{{ $kontinjen->ketua }}</td>
                        </tr>
                        <tr>
                            <td><strong>Timbalan Ketua Kontinjen</strong></td>
                            <td>{{ $kontinjen->timbalan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 1</strong></td>
                            <td>{{ $kontinjen->urusetia1 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 2</strong></td>
                            <td>{{ $kontinjen->urusetia2 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 3</strong></td>
                            <td>{{ $kontinjen->urusetia3 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 4</strong></td>
                            <td>{{ $kontinjen->urusetia4 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 5</strong></td>
                            <td>{{ $kontinjen->urusetia5 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 6</strong></td>
                            <td>{{ $kontinjen->urusetia6 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 7</strong></td>
                            <td>{{ $kontinjen->urusetia7 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 8</strong></td>
                            <td>{{ $kontinjen->urusetia8 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 9</strong></td>
                            <td>{{ $kontinjen->urusetia9 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Urusetia 10</strong></td>
                            <td>{{ $kontinjen->urusetia10 }}</td>
                        </tr>
                    </table>

                </div>
			</div>
		</div>
	</div>
</div>

@endsection