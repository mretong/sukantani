@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>KARNIVAL SUKAN TANI 2017</strong></div>
                <div class="panel-heading">
                <div align="center">
                    <img src="{{ asset('images/logosukanmadasmall.gif') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <!--  <img src="{{ asset('images/maskot.jpg') }}"  height='150' width='150'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="{{ asset('images/moa.png') }}"  height='150' width='180'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="{{ asset('images/mada.jpg') }}"  height='150' width='150'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group has-success">
                            <label for="email" class="col-md-4 control-label">Kata Nama</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class=" glyphicon glyphicon-envelope"></span> </span>
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-success">
                            <label for="password" class="col-md-4 control-label">Kata Laluan</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-key"></i> </span>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Log Masuk
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

    swal({
      title: "<strong>Peringatan Mesra</strong>",
      text: "Pendaftaran Online akan dibuka pada 15 Disember 2016 sehingga 2 Disember 2017.",
      html: true
    });

</script>


@endsection
