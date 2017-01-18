@extends('layouts.tagging')

@section('content')

@foreach($pesertas as $peserta)
    @if($loop->iteration != 1)
        {{-- <div class="page-break"></div> --}}

        <table border="0" width="100%">
            <tr>
                <td colspan="3" valign="bottom" align="center">
                    <br /><br /><br /><br /><br /><br /><br />
                    <br /><br />
                    <font size="10px"><br /><br /><br /><br /><br /></font>

                    <img src="<?= public_path(); ?>/images/tagging/atlet.png" width="350" height="200">
                    <font size="10px"><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></font>
                </td>
            </tr>

            <tr>
                <td width="100%" rowspan="3" align="left" valign="top" style="border-left: 0px">
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
                <td valign="top" width="100%">
                    <font size="65"><strong>{{ $peserta->noAtlet }}</strong></font>
                </td>
                <td align="center">
                    <img src="<?= public_path(); ?>/images/tagging/{{ $peserta->agensi->kod2 }}.png" height="150" width="150">                    
                </td>
            </tr>
        </table>
    @else
        <table border="1" width="115%">
            <tr>
                <td colspan="3" valign="bottom" align="center">
                    <br /><br /><br /><br /><br /><br /><br />
                    <br /><br />
                    <font size="10px">
                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                    </font>

                    <img src="<?= public_path(); ?>/images/tagging/atlet.png" width="350" height="140">
                    <font size="10px">
                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                    </font>
                </td>
            </tr>

            <tr>
                <td width="255" rowspan="3" align="left" valign="top" style="border-left: 0px">
                    {{-- <font size="5px">&nbsp;</font> --}}
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
                <td valign="top" width="100%">
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