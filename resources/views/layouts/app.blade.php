
<!--
=========================================================
Material Kit - v2.0.7
=========================================================

Product Page: https://www.creative-tim.com/product/material-kit
Copyright 2020 Creative Tim (https://www.creative-tim.com/)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    TechShop
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/material-kit.css?v=2.0.7') }}" rel="stylesheet">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{route('home')}}">
          TechShop </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
              @if (Auth::check())
                  @if (Auth::user()->rol_id ==1)


                      <li class="nav-item">
                          <a  href="{{route('formasdepago')}}" class=" nav-link" >
                              Formas de pago
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('productos.create')}}" class=" nav-link" >
                              Registrar producto
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('productos.index')}}" class=" nav-link" >
                              Todos los productos
                          </a>
                      </li>
                  @endif

              @endif
              <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <i class="material-icons">apps</i> Productos
                  </a>
                  <div class="dropdown-menu dropdown-with-icons">
                      <a href="{{ route('productos.show',['id'=> "com"])}}" class="dropdown-item">
                          <i class="material-icons">layers</i> Computacion
                      </a>
                      <a href="{{ route('productos.show',['id'=> "cel"])}}" class="dropdown-item">
                          <i class="material-icons">layers</i> Celulares y telefonia
                      </a>
                      <a href="{{ route('productos.show',['id'=> "au"])}}" class="dropdown-item">
                          <i class="material-icons">layers</i> Audio y video
                      </a>
                      <a href="{{ route('productos.show',['id'=> "acc"])}}" class="dropdown-item">
                          <i class="material-icons">layers</i> Accesorios
                      </a>
                  </div>
              </li>
              <li class="nav-item">
                  <a href="{{route('carrito.index')}}" class=" nav-link" >
                      <i class="fa fa-shopping-cart fixed-plugin-button-nav cursor-pointer"></i>
                  </a>
              </li>

              @if (Auth::check())
                  <li class="nav-item">
                      {{Auth::user()->nombre}}
                  </li>
                      <li class="nav-item">
                          <a href="{{route('logout')}}" class=" nav-link" >
                              Cerrar Sesion
                          </a>
                      </li>
              @else
                      <li class="nav-item">
                          <a href="{{route('login')}}" class=" nav-link" >
                              Iniciar Sesion
                          </a>
                      </li>
              @endif


          </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset(''.request()->is('productos/cel') ? 'img/cel_wall.jpg' : 'img/wall.jpg' )}}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">
            {{request()->is('productos/cel') ? 'La mejor telefonia solo en TECHSHOP' : 'El mejor producto de tecnologia solo en TechShop' }}
            {{request()->is('productos/com') ? 'Lo mejor en computadoras solo en TECHSHOP' : '' }}
          </h1>
          <h4>Every landing page needs a small description after the big bold title, that&apos;s why we added this text here. Add here all the information that can make you or your product create the first impression.</h4>
          <br>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> Abrir este video
          </a>
        </div>
      </div>
    </div>
  </div>
            @yield('content')

  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com/">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/blog">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

  <script>

    var has_errors = {{$errors->count() > 0 ? 'true' : 'false'}};
    if( has_errors ){
      Swal.fire({
          title: '<strong>Error!</br> <ul style="font-size:16px; margin-right: 1.7em;"><li>Solo se permite numeros</li><li>Maximo 4 numeros</li><li>No puede quedar campo vacio</li></ul>',
          type: 'errors',
          icon: 'error',
          html:jQuery("#ERROR_COPY").html(),
          showCloseButton: true,

        })
    }
 function confirmAlert() {
  event.preventDefault();
   let form = event.target;
          Swal.fire({
                title: '¡Está seguro de realizar esta compra?',
                text: "Estás a tiempo de cancelar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, comprar!'
              }).then((result) => {
                if (result.value) {
                  document.getElementById("form").submit();
                  if(form.submit()){
                    Swal.fire(
                    'compra realizada con éxito!',
                    ':).',
                    'success'
                  )
                  }

                }
              })
     }
</script>


<script src="{{asset('js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/moment.min.js')}}"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.js?v=2.0.7')}}" type="text/javascript"></script>

</body>

</html>
