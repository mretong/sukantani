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


<table>
    <td style="margin-left: 20px">here</td>
</table>


@foreach($pesertas as $peserta)
    @if($loop->iteration != 1)
        <div class="page-break"></div>

        <table border="0">
            <tr>
                <td colspan="3" valign="bottom" align="center">
                    <br /><br /><br /><br /><br /><br /><br /><br />
                    <br /><br />
                    <font size="10px"><br /><br /><br /></font>

                    <font face="arial" size="175px" color="yellow">ATLET</font>
                    <br /><br />
                </td>
            </tr>

            <tr>
                <td rowspan="3" align="center" valign="top" style="border-left: 0px">
                    <img src="<?= public_path(); ?>/{{ $peserta->photo }}" height="385" width="350">
                </td>
                <td valign="top" width="100%" colspan="2" style="margin-left: 55px">
                    <strong>{{ $peserta->nama }}</strong>
                </td>
            </tr>
            <tr>
                <td valign="top" colspan="2">
                    <strong>{{ $peserta->nokp }}</strong>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <font size="65"><strong>{{ $peserta->noAtlet }}</strong></font>
                </td>
                <td align="left">
                    <img src="<?= public_path(); ?>/images/tagging/{{ $peserta->agensi->kod2 }}.png" height="150" width="150">                    
                </td>
            </tr>
        </table>
    @else
        <table border="0">
            <tr>
                <td colspan="3" valign="bottom" align="center">
                    <br /><br /><br /><br /><br /><br /><br /><br />
                    <br /><br />
                    <font size="10px"><br /><br /><br /></font>

                    <font face="arial" size="175px" color="yellow">ATLET</font>
                    <br /><br />
                </td>
            </tr>

            <tr>
                <td rowspan="3" align="center" valign="top" style="border-left: 0px">
                    <img src="<?= public_path(); ?>/{{ $peserta->photo }}" height="385" width="350">
                </td>
                <td valign="top" width="100%" colspan="2" style="margin-left: 55px">
                    <strong>{{ $peserta->nama }}</strong>
                </td>
            </tr>
            <tr>
                <td valign="top" colspan="2">
                    <strong>{{ $peserta->nokp }}</strong>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <font size="65"><strong>{{ $peserta->noAtlet }}</strong></font>
                </td>
                <td align="left">
                    <img src="<?= public_path(); ?>/images/tagging/{{ $peserta->agensi->kod2 }}.png" height="150" width="150">                    
                </td>
            </tr>
        </table>
    @endif
@endforeach

@endsection