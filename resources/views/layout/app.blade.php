<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Nusa Indah Jaya Utama</title>

  <!--vendor-->
    <link rel="stylesheet" href="{{ url('forntend/libraries/bootstrap2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('forntend/style/main.css')}}">

    
    <link
      href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap"
      rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap"
      rel="stylesheet"/>
</head>
<body>
    <!-- nav niju -->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light">
            <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ url('forntend/images/imageedit_4_9087602155.png')}}" alt="logo NIJU" width="100px" height="100px">
        </a>
        <h3><b>PT. NUSA INDAH JAYA UTAMA</b></h3>
            <button class="navbar-toggler navbar-toggler-right" type="button" 
            data-toggle="collapse"data-target="#navb">

            <span class="navbar-toggler-icon"></span>    
            
        </button>
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3"> 
                    <li class="nav-item mx-md-2"> <a href="#" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2"> <a href="#" class="nav-link">About</a>
                </li>
                <li class="nav-item mx-md-2"> <a href="#" class="nav-link">Customers</a>
                </li>
                </ul>
                <!--mobile button-->
                <form action="login" class="form-inline d-sm-block d-md-none">
                    <button  class="btn btn-login my-2 my-sm-0 px-4">
                    login
                    </button>
                </form>

                <!--desktop-->
                <form action="{{ route('login_pengguna') }}" class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                    login
                    </button>
                </form>
            </div>
    
        </nav>
    </div>
    <!-- header niju -->
    <header class="text-center">
        <div class="container">
        <h1>Welcome to PT Nusa Indah Jaya Utama</h1>
        <hr/>
            <br/>
        <h2>Sistem Informasi Laporan Harian Produksi</h2>
        <a href="#" class="btn btn-get-started px-4 mt-4">About
          </a>
          </div>
    </header>
<!--main-->
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <h2 class="section-heading">About</h2>
        <hr class="light">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
            <img src="{{ url('forntend/images/undraw_factory_dy0a.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>Sistem Informasi Laporan Harian Produksi</h3>
            <hr/>
            <ul>
              <li> Sistem informasi laporan harian produksi ditujukan kepada Departen Produksi PT Nusa Indah Jaya Utama.</li>
              <li> Dimana sistem ini dapat membantu proses laporan harian produksi pada PT Nusa Indah Jaya Utama.</li>
              <li> Pada sistem informasi laporan harian produksi terdapat fitur-fitur penunjang yang dapat membantu proses laporan harian produksi pada PT Nusa Indah Jaya Utama.</li>
            </ul>
            <a href="#" class="read-more px-4 mt-4">Customers</i></a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
  </main>
    

        <!-- JS Files -->
    <script src="{{ url('forntend/libraries/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ url('forntend/libraries/bootstrap2/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('forntend/libraries/retina/retina.min.js')}}"></script>

</body>
</html>