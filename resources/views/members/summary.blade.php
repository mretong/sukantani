@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-xs-10">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Ringkasan Penyertaan Keseluruhan Agensi</h4>
                    <small>*Tidak termasuk peserta yang tiada acara.</small>
                </div>
            
                <div class="panel-body">
                    <table class="table table-condensed table-bordered table-striped">
                    <tr bgcolor="#CCC">
                        <td><strong>BIL</strong></td>
                        <td><strong>AGENSI</strong></td>
                        <td><strong>JANTINA</strong></td>
                        <td><strong>JUMLAH</strong></td>
                        <td><strong>JUMLAH BESAR</strong></td>
                    </tr>
                
                    <?php $grandTotal = 0; ?>
                    @foreach($collections as $collection)
                        <tr>
                            <td rowspan="2" align="center" valign="middle">{{ $loop->iteration }}</td>
                            <td rowspan="2" valign="middle">{{ $collection['agensi'] }}</td>
                            <td>LELAKI</td>
                            <td align="center">{{ $collection['lelaki'] }}</td>
                            <td rowspan="2" align="center" valign="middle">{{ $collection['jumlah'] }}</td>            
                        </tr>
                        <tr>
                            <td>WANITA</td>
                            <td align="center">{{ $collection['wanita'] }}</td>
                        </tr>
                        <?php
                            $grandTotal += $collection['jumlah'];
                        ?>     
                    @endforeach
                    <tr>
                        <td colspan="4" align="right"><strong><font size="5">JUMLAH BESAR</font></strong></td>
                        <td align="center"><strong><font size="5">{{ $grandTotal }}</font></strong></td>
                    </tr>

                    </table>                
                </div>
            </div>



        </div>
    </div>
    

</div>



@endsection