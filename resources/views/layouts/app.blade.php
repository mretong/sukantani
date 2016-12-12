<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/mada.ico">

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!-- PACE JS -->
    <script src="{{ asset('/js/pace.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pace.min.') }}">

    <!-- Sweet Alert -->
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/sweetalert-dev.js') }}"></script>

    


    <title>MADA :: Sistem Pendaftaran Sukan Tani</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootsrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><strong>Sistem Pendaftaran Sukan Tani </strong></a>
        </div>

        @if(!Auth::guest())
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/home')}}">Home</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pendaftaran <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('peserta')}}">Atlet</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carian <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('carian') }}">Carian Mengikut Acara</a></li>
                <li><a href="{{ route('carian-nama') }}">Carian Mengikut Nama</a></li>

                @if(Auth::user()->agensi_id == 1)
                  <li><a href="{{ route('carian-acara-agensi') }}">[ Admin ] :: Carian Mengikut Agensi dan Acara</a></li>
                @endif
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                @if(Auth::user()->agensi->id == 1)
                  <li><a href="{{ route('tagging') }}" target="_blank">ADMIN :: Senarai Tag Peserta</a></li>
                  <li><a href="{{ route('penginapan') }}" target="_blank">ADMIN :: Penginapan</a></li>
                  <li><a href="#" target="_blank">ADMIN :: Profil Semua Peserta</a></li>
                @endif
                <li><a href="{{ route('laporan-keseluruhan') }}">Laporan Jumlah Keseluruhan Peserta</a></li>
                <li><a href="{{ route('acara-keseluruhan') }}">Laporan Keseluruhan Penyertaan Acara</a></li>
                <li><a href="#">Laporan Keseluruhan Acara Mengikut Jantina</a></li>
                <li><a href="{{ route('senarai-semak') }}">Senarai Semak</a></li>
              </ul>
            </li>

            @if(Auth::user()->email == 'suhairi81@gmail.com')
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Settings <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('setting1') }}">Remove peserta_id not_in peserta</a></li>
                <li><a href="{{ route('setting2') }}">Remove penyertaan that exceed limit</a></li>
                <li><a href="{{ route('setting3') }}">Remove peserta with no acara</a></li>
              </ul>
            </li>
            @endif
            <li><a href="{{ route('nota')}}">Nota</a></li>
            <li><a href="{{ url('/pengesahan')}}">Pengesahan</a></li>


          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @if (!Auth::guest())
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu" role="menu">
                          <li>
                              <a href="{{ url('/logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                  </li>
              @endif
          </ul>
        </div><!--/.nav-collapse -->
        @endif
      </div>
    </nav>

    @if(Session::has('error'))
      <div class="alert alert-danger"><strong>{{ Session::get('error') }}</strong></div>
    @endif

    @if(Session::has('success'))
      <div class="alert alert-success"><strong>{{ Session::get('success') }}</strong></div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    @yield('content')


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->    
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>  
    <script src="{{ asset('/js/app.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    @yield('js')
  </body>
</html>
