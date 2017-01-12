@extends('layouts.pdf')

@section('content')

<style type="text/css">
    td  {
        font-size: 60px;
        border-right: 15px;
    }

    img {
        border-radius: 5px;
    }
</style>


@foreach($pesertas as $peserta)
@if($loop->iteration != 1)
    <div class="page-break"></div>
@endif

    <table border="0" width="100%" height="100%">
        <tr>
            <td colspan="2" valign="bottom" align="center">
                <br /><br /><br /><br /><br /><br /><br /><br />
                <br /><br />
                <font size="10px"><br /><br /><br /></font>

                <font face="arial" size="175px">ATLET</font>
                <br /><br />
            </td>
        </tr>

        <tr>
            <td rowspan="3" align="center" valign="top" style="border-left: 0px">
                &nbsp;&nbsp;&nbsp;
                <img src="<?= public_path(); ?>/{{ $peserta->photo }}" height="385" width="350">
            </td>
            <td valign="top" align="center" width="100%">
                <strong>{{ $peserta->nama }}</strong>
            </td>
        </tr>
        <tr>
            <td valign="top" align="center">
                <strong>{{ $peserta->nokp }}</strong>
            </td>
        </tr>
        <tr>
            <td valign="top" align="center">
                <font size="65"><strong>{{ $peserta->noAtlet }}</strong></font>
            </td>
        </tr>


    </table>
@if($loop->iteration == 1)
    @break
@endif
@endforeach



@endsection