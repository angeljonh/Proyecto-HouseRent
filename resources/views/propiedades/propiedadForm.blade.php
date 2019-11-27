@extends('layouts.app')

@section('content')


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
            <a class="nav-link active" href="{{ route('propiedad.create') }}">crear anuncio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:8000/propiedad">Mis propiedades</a>
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
  <!--/ Nav End /-->



  <!--/ Services Star /-->
      <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">Crear anuncio</div>

                <div class="card-body">

                    {{-- Muestra errores --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(isset($propiedad))
                        {!! Form::model($propiedad, ['route' => ['propiedad.update', $propiedad->id], 'method' => 'PATCH']) !!}
                    @else
                        {!! Form::open(['route' => 'propiedad.store']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre') !!}
                        {!! Form::text('nombre', Auth::user()->name, ['class' => $errors->has('nombre') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('descripcion', 'Descripcion') !!}
                        {!! Form::text('descripcion', null, ['class' => $errors->has('descripcion') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('domicilio', 'Domicilio') !!}
                        {!! Form::text('domicilio', null, ['class' => $errors->has('domicilio') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('numero', 'Numero') !!}
                        {!! Form::number('numero', null, ['class' => $errors->has('numero') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                          {!! Form::label('zona_id', 'Zona') !!}
                          {!! Form::select('zona_id', $zonas, null, ['class' => 'form-control']) !!}

                      </div>
                      <div class="form-group">
                        {!! Form::label('cp', 'Codigo postal') !!}
                        {!! Form::number('cp', null, ['class' => $errors->has('cp') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('precio', 'Precio') !!}
                        {!! Form::number('precio', null, ['class' => $errors->has('precio') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('area', 'Area') !!}
                        {!! Form::number('area', null, ['class' => $errors->has('area') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('camas', 'Camas') !!}
                        {!! Form::number('camas', null, ['class' => $errors->has('camas') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('cuartos', 'Cuartos') !!}
                        {!! Form::number('cuartos', null, ['class' => $errors->has('cuartos') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('baños', 'Baños') !!}
                        {!! Form::number('baños', null, ['class' => $errors->has('baños') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('telefono', 'Telefono') !!}
                        {!! Form::number('telefono', null, ['class' => $errors->has('telefono') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    {!! Form::close() !!}
                </div>

            </div>
      </div>
  </section>
  <!--/ Services End /-->

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
