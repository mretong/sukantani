@extends('layouts.tagging')

@section('content')

@foreach($pesertas as $peserta)
    @if($loop->iteration != 1)
        <div class="page-break"></div>

        <table border="0" width="108%">
            <tr>
                <td valign="bottom" align="center" height="630" width="100%">&nbsp;</td>
                <td colspan="2" valign="bottom" align="right">                    
                    <img src="<?= public_path(); ?>/images/tagging/memacu.png" width="500" height="70">
                </td>
            </tr>
            <tr>
                <td colspan="3" valign="middle" align="center" height="250">
                    <font size="15px">
                        <br /><br /><br /><br /><br />
                    </font>
                    <img src="<?= public_path(); ?>/images/tagging/atlet.png" width="500" height="175">
                    <font size="8px">
                        <br /><br /><br /><br /><br /><br /><br /><br /><br />
                    </font>
                    <font size="3px">
                        <br />
                    </font>
                    <font size="2px">
                        <br />
                    </font>
                </td>
            </tr>
            <tr>
                <td width="255" rowspan="3" align="left" valign="top">
                    <img src="<?= public_path(); ?>/{{ $peserta->photo }}" height="385" width="350">
                </td>
                <td valign="top" width="100%" colspan="2" style="padding-left: 25px">
                    <strong>{{ $peserta->nama }}</strong>
                </td>
            </tr>
            <tr>
                <td valign="top" colspan="2" style="padding-left: 25px">
                    <strong>{{ $peserta->nokp }}</strong>
                </td>
            </tr>
            <tr>
                <td valign="top" width="100%" style="padding-left: 25px">
                    <font size="65"><strong>{{ $peserta->noAtlet }}</strong></font>
                </td>
                <td align="right">
                    <img src="<?= public_path(); ?>/images/tagging/{{ $peserta->agensi->kod2 }}.png" height="140" width="150">                    
                </td>
            </tr>
        </table>
    @else
        <table border="0" width="108%">
            <tr>
                <td valign="bottom" align="center" height="630" width="100%">&nbsp;</td>
                <td colspan="2" valign="bottom" align="right">                    
                    <img src="<?= public_path(); ?>/images/tagging/memacu.png" width="500" height="70">
                </td>
            </tr>
            <tr>
                <td colspan="3" valign="middle" align="center" height="250">
                    <font size="15px">
                        <br /><br /><br /><br /><br />
                    </font>
                    <img src="<?= public_path(); ?>/images/tagging/atlet.png" width="500" height="175">
                    <font size="8px">
                        <br /><br /><br /><br /><br /><br /><br /><br /><br />
                    </font>
                    <font size="3px">
                        <br />
                    </font>
                    <font size="2px">
                        <br />
                    </font>
                </td>
            </tr>
            <tr>
                <td width="255" rowspan="3" align="left" valign="top">
                    <img src="<?= public_path(); ?>/{{ $peserta->photo }}" height="385" width="350">
                </td>
                <td valign="top" width="100%" colspan="2" style="padding-left: 25px">
                    <strong>{{ $peserta->nama }}</strong>
                </td>
            </tr>
            <tr>
                <td valign="top" colspan="2" style="padding-left: 25px">
                    <strong>{{ $peserta->nokp }}</strong>
                </td>
            </tr>
            <tr>
                <td valign="top" width="100%" style="padding-left: 25px">
                    <font size="65"><strong>{{ $peserta->noAtlet }}</strong></font>
                </td>
                <td align="right">
                    <img src="<?= public_path(); ?>/images/tagging/{{ $peserta->agensi->kod2 }}.png" height="140" width="150">                    
                </td>
            </tr>
        </table>
    @endif
@endforeach



@endsection