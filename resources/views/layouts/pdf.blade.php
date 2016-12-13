<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Sistem Pendaftaran Karnival Sukan MOA">
    <meta name="author" content="Suhairi Abdul Hamid">
    <link rel="icon" href="{{ asset('images/mada.ico') }}">

    <!-- PACE JS -->
    <script src="{{ asset('/js/pace.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/pace.min.css') }}">

    <!-- Sweet Alert -->
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/sweetalert-dev.js') }}"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style type="text/css">
    
    .profile {
      display: inline-block;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }

    </style>

    <title>MADA :: Sistem Pendaftaran Sukan Tani</title>

    

  </head>

  <body>

    @yield('content')


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->    
    <script src="{{ asset('/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>  

    @yield('js')
  </body>
</html>
