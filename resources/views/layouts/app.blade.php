<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->

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
                <li><a href="{{ route('home')}}">Kontinjen</a></li>
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
                  <li><a href="{{ route('carian-rumusan') }}">[ Admin ] :: Carian Rumusan Penyertaan Mengikut Agensi</a></li>                  
                  <li><a href="{{ route('carian-acara') }}">[ Admin ] :: Carian Semua Peserta Mengikut Acara</a></li>
                @endif
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                @if(Auth::user()->agensi->id == 1)
                  <li><a href="{{ route('laporan-kontinjen') }}" target="_blank">ADMIN :: Senarai Kontinjen</a></li>
                  <li><a href="{{ route('tagging') }}" target="_blank">ADMIN :: Senarai Tag Peserta</a></li>
                  <li><a href="{{ route('senarai-pengurus') }}" target="_blank">ADMIN :: Senarai Pengurus dan Jurulatih</a></li>
                  <li><a href="{{ route('penginapan') }}" target="_blank">ADMIN :: Penginapan</a></li>
                  <li><a href="{{ route('pdf-profil') }}" target="_blank" id="profil">ADMIN :: Profil Peserta</a></li>
                  <li><a href="{{ route('laporan-agensi-acara') }}" target="_blank" id="profil">ADMIN :: Laporan Senarai Peserta Mengikut Acara</a></li>
                  <li><a href="{{ route('laporan-agensi-acara2') }}" target="_blank" id="profil">ADMIN :: Laporan Senarai Peserta Mengikut Acara 2</a></li>
                  <li><a href="{{ route('laporan-pengurus-pertandingan') }}" target="_blank" id="profil">ADMIN :: Laporan Kepada Pengurus Pertandingan</a></li>
                  <li><a href="{{ route('summary') }}">ADMIN :: Rumusan</a></li>
                  <li><a href="{{ route('transaksi') }}">ADMIN :: Transaksi</a></li>
                  <li><a href="{{ route('setting6') }}">ADMIN :: No KP bermasalah</a></li>
                @endif
                <li><a href="{{ route('laporan-keseluruhan') }}">Laporan Jumlah Keseluruhan Peserta</a></li>
                <li><a href="{{ route('acara-keseluruhan') }}">Laporan Keseluruhan Penyertaan Acara</a></li>
                <li><a href="{{ route('senarai-semak') }}">Senarai Semak</a></li>
                
              </ul>
            </li>

            @if(Auth::user()->email == 'suhairi81@gmail.com')
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tagging <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('tagging-kontinjen')}}" target="_blank">Kontinjen</a></li>
                <li><a href="{{ route('tagging-atlet')}}" target="_blank">Atlet</a></li>
              </ul>
            </li>

            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Settings <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('setting1') }}">Remove peserta_id not_in peserta</a></li>
                <li><a href="{{ route('setting2') }}">Remove penyertaan that exceed limit</a></li>
                <!-- <li><a href="{{ route('setting3') }}">Remove peserta with no acara</a></li> -->
                <li><a href="{{ route('setting8') }}">Senarai Peserta Tiada Acara</a></li>
                <li><a href="{{ route('setting4') }}">Display duplicated No Atlet</a></li>
                <li><a href="{{ route('setting7') }}">Display duplicated No KP</a></li>
                <li><a href="{{ route('setting5') }}">Update User Login Status</a></li>
              </ul>
            </li>
            <li><a href="{{ route('nota')}}">Nota</a></li>
            @endif
            
            <!-- <li><a href="{{ route('peta')}}">Peta Lokasi</a></li> -->


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
    <script src="{{ asset('/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>  
    <!-- <script src="{{ asset('/js/app.js') }}"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <script type="text/javascript">

      $('#profil').click(function() {
        swal("Info", "Proses Janaan Profil Keseluruhan Peserta akan mengambil masa yang lama...");
      });
      

    </script>

    @yield('js')
  </body>
</html>
