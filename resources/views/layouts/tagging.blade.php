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

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <title>MADA :: Sistem Pendaftaran Sukan Tani</title>


    <style type="text/css">
        body {
                /*background: url("images/tag.png") no-repeat center center fixed; */
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                padding-left: 15px;
        }

        img {
            border-radius: 25px;
        }
        
        .page-break {
          page-break-after: always;
        }

        td  {
            font-size: 60px;
            padding-left: 5px;
        }

        td img {
            align: left;
        }

    </style>
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
