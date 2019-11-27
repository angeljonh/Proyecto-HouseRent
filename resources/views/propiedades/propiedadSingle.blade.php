@extends('layouts.master')
{{-- el "." equivale a "/" --}}

@section('content')
 
<div class="click-closed"></div>
  <!--/ Form Search Star /-->
<div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Buscar propiedad</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Palabra clave</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Palabra Clave">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">Ciudad</label>
              <select class="form-control form-control-lg form-control-a" id="city">
                <option>Guadalajara</option>
                <option>Tonala</option>
                <option>Zapopan</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bedrooms">Dormitorios</label>
              <select class="form-control form-control-lg form-control-a" id="bedrooms">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
				<option>4</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bathrooms">Baños</label>
              <select class="form-control form-control-lg form-control-a" id="bathrooms">
			    <option>0</option>
				<option>1</option>
                <option>2</option>
                <option>3</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Minnimo Precio</label>
              <select class="form-control form-control-lg form-control-a" id="price">
                <option>$500</option>
                <option>$1,500</option>
				<option>$2,500</option>
				<option>$3,000</option>
				<option>$3,500</option>
				<option>$4,500</option>
				<option>$5,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Buscar Propiedad</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--/ Form Search End /-->

  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="{{ route('inicio') }}">House<span class="color-b">Rent</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('acerca') }}">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('propiedad') }}">Propiedades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('propiedad.create') }}">crear anuncio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="http://localhost:8000/propiedad">Mis propiedades</a>
          </li>
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesiòn') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('inicio') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesiòn') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

  </nav>
  </nav>
  <br>
  <br>
  <br>
  <!--/ Nav End /-->

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{ $propiedad->domicilio }} {{ $propiedad->numero }}</h1>
            <span class="color-text-a">{{ $propiedad->zona->zona }}, {{ $propiedad->cp }}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('inicio') }}">Inicio</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('propiedad') }}">Propiedades</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
              {{ $propiedad->domicilio }} {{ $propiedad->numero }}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <div class="carousel-item-b">
              <img src="C:\laragon\www\HouseRent5\public\img\slide-2.jpg" alt="">
            </div>
            <div class="carousel-item-b">
              <img src="img/slide-3.jpg" alt="">
            </div>
            <div class="carousel-item-b">
              <img src="img/slide-1.jpg" alt="">
            </div>
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">$</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{ $propiedad->precio }}</h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Datos de la propiedad</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Propiedad ID:</strong>
                      <span>{{ $propiedad->id}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Dueño:</strong>
                      <span>{{ $propiedad->nombre}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Ubicación:</strong>
                      <span>{{ $propiedad->zona->zona}}, {{ $propiedad->cp}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Area:</strong>
                      <span>{{ $propiedad->area}}m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Camas:</strong>
                      <span>{{ $propiedad->camas}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Baños:</strong>
                      <span>{{ $propiedad->baños}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Cuartos:</strong>
                      <span>{{ $propiedad->cuartos}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Telefono:</strong>
                      <span>{{ $propiedad->telefono}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Descripción de la propiedad</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                {{ $propiedad->descripcion}}
                </p>
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="list-a no-margin">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Property Single End /-->

  <!--/ footer Star /-->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">HouseRent</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Una pagina donde puedes encontrar tu alojamiento en las zonas de guadalajara, tonala, zapopan y tlaquepaque.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Correo.</span> angel.renteria.hernandez@gmail.com</li>
                <li class="color-a">
                  <span class="color-text-a">Telefono.</span> +521 3331300949</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Compañia</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="{{ route('contacto') }}">Mapa del sitio</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Sitio Nacional</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="{{ route('inicio') }}">Mexico</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">HouseRent</span> Todos los derechos reservados.
            </p>
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
            Diseñado por HouseRent</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
  
  <!-- JavaScript Libraries -->
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('lib/popper/popper.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('lib/scrollreveal/scrollreveal.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('js/main.js')}}"></script>

@endsection