<!doctype html>
<html lang="en">

<head>
  <title>Application de Gestion des Prix du Marché</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">-->
  <!-- Material Kit CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets\js\core\css\bootstrap-select.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('public\assets\js\core\css\bootstrap-select.min.css') }}">
  <link href="{{asset('assets/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">



  <!--<link href="{{asset('assets/demo/demo.css') }}" rel="stylesheet">-->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
 <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->

 <link rel="icon" href="{{asset('assets/img/FAVICO1.ico')}}" type="image/gif" sizes="16x16">
<!--===============================================================================================-->
<!--	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->

<link rel="stylesheet" type="text/css" href="{{asset('assets\js\core\css\bootstrap-select.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('public\assets\js\core\css\bootstrap-select.min.css') }}">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css') }}">


</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="" data-image="{{asset('assets/css/FAVICO1.ico')}}">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="https://recrutement.mlouma.com" class="simple-text logo-normal">
            <img src="{{ asset('assets/css/mLouma.png')}}" alt="" srcset="">
        </a>
        <div class="text-center"><h6>Plateforme de Recrutement des mLoumers</h6></div>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{ url('/admin')}}" >
              <i class="material-icons">add_circle</i>
              <p  class="text-light">Campagnes</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="/admin/users">
              <i class="material-icons">account_circle</i>
              <p class="text-light" >Utilisateurs</p>
            </a>
          </li>
          {{-- <li class="nav-item active  ">
            <a class="nav-link" href="/users">
              <i class="material-icons">account_circle</i>
              <p class="text-light" >Utilisateurs</p>
            </a>
          </li> --}}

          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">
                @yield('page_title')
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
            @if ( !Cas::isAuthenticated() )

              <li class="nav-item">
                <a href="{{ url('login') }}" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('/register') }}" class="nav-link">Register</a>
              </li>
              @else
              <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                      {{ Cas::user() }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <a id='disconnect' href="{{ url('/logout') }}" class="dropdown-item">
                          Logout
                      </a> 

                      <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                            style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </div>
              </li>
              @endif 
          </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">  @yield('title_header')</h4>
                </div>
                <div class="card-body">

                        @yield('content')
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
  <!--   Core JS Files   -->

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.js"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/default-passive-events"></script>

  <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

  <script src="{{asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{asset('assets/js/candidats.js') }}"></script>
  <script src="{{asset('assets/js/app.js') }}"></script>

  
  <script>
      $(document).ready(function() {
   $('.t').dataTable( {
       responsive: true,
      
       
   } );
   table.buttons().container()
         .appendTo( '#t_wrapper .col-md-6:eq(0)' );
 } );
 
  </script>
  <script src="{{asset('assets/js/core/js/bootstrap-select.js')}}"></script>
  <script src="{{asset('assets/js/core/js/bootstrap-select.min.js')}}"></script>
  <script src="{{asset('assets/js/core/agpm.js') }}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{asset('assets/js/plugins/chartist.jquery.min.js') }}"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <!--  Google Maps Plugin    -->
  <!-- Chartist JS -->

  <!--  Notifications Plugin    -->
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->


  <!-- Material Dashboard DEMO methods, don't include it in your project! -->





</body>

</html>
