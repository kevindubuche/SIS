
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>I.F.A</title>

  <!-- Favicon -->
  <link rel="icon" href="{{asset('logo.jpg')}}">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/coming-soon.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <div class="overlay"></div>
  <div class="masthead">
    <div
     {{-- class="masthead-bg" --}}
     
    ></div>
    <div class="container ">
      <div class="row h-100">
        <div class="col-12 my-auto">
          <div class="masthead-content text-white py-5 py-md-0">
            <a href="#"><img src="img/core-img/logo.png" alt="logo" style="width: 110px; height: 100px"></a>
       
            <h1 >Institution Frère André <h1><h2> Foyer Eveil</h2>
            <p style="color: white;">Bienvenue dans votre école en ligne !<br> 
              Connectez-vous pour commencer.</p>
         
        
                <div >
                    @if(Auth::check())
                        <a href="{{url('/login')}}" class="btn btn-lg btn-secondary" role="button">Compte</a>
                        <span> | </span>
                        <a href="{{ url('/logout') }}" class="btn btn-lg btn-secondary" role="button"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Déconnection
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{url('/login')}}" class="btn btn-lg btn-secondary" role="button">Connexion</a>
                    @endif
               </div>
          
          </div>
        </div>

      </div>
    </div>
    
      <div class="row " style="margin-left: 20%; margin-top: 25%;">
        <span>33, Route des Dalles Carrefour Feuille<br>
          +509 3867 2526  |  +509 2227 6816  |  +509 3107 8119</p>
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tout droit reservé | Institution Frère André _ Foyer Eveil
      </div>
    
  </div>
 



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/coming-soon.min.js"></script>


  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="js/bootstrap/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <!-- All Plugins js -->
  <script src="js/plugins/plugins.js"></script>
  <!-- Active js -->
  <script src="js/active.js"></script>
</body>

</html>
