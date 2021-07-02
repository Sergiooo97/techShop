@extends('layouts.app')
@section('content')
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <!--SECCION DE CATEGORIA DE PRODUCTOS-->
          <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
            <div class="row">
              <div class="col-xl-6 col-sm-6">
                <a  href="{{ route('productos.show',['id'=> "cel"])}}">
                  <div style=" height:90%" class="card card-cat">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-6">
                          <img style="width:100%;" src="{{asset('img/cel.png')}}" alt="Celular">
                        </div>
                        <div class="col-6 text-end">
                            <p>Celulares y Telefonia</p>
                          </div>
                        </div>
                      </div>
                    </div>
                </a>
                </div>
              <div class="col-xl-6 col-sm-6">
                <a  href="{{ route('productos.show',['id'=> "com"])}}"  >
                  <div style=" height:90%" class="card card-cat">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-6">
                          <img style="width:100%;" src="{{asset('img/com.png')}}" alt="Computacion">
                        </div>
                        <div class="col-6 text-end">
                            <p>Computacion</p>
                        </div>
                      </div>
                    </div>
{{--                  </div>--}}
                </a>
                </div>
              </div>
            <div class="row">
              <div class="col-xl-6 col-sm-6">
                <a href="{{ route('productos.show',['id'=> "au"])}}" >
                    <div style=" height:90%" class="card-cat card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <img style="width:100%;" src="{{asset('img/audi.png')}}"  alt="Audio">
                                </div>
                                <div class="col-6 text-end">
                                    <p>Electronica, audio y video</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>


                </div>

              <div class="col-xl-6 col-sm-6">
                  <a href="{{ route('productos.show',['id'=> "au"])}}" >
                <div  style=" height:90%" class="card-cat card">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-6">
                        <img style="width:100%;" src="{{asset('img/teclado.png')}}"  alt="Computacion">
                      </div>
                      <div class="col-6 text-end">
                          <p>Accesorios de computacion</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!--END SECCION DE CATEGORIA DE PRODUCTOS-->
            <hr>
            <div class="container">

              <!--SECCION COMPUTACION -->
              <div class="row mt-12 col-sm-12">
                <p>Computacion</p>
                <div class="row">
                @foreach ($comp as $com)
                  @csrf
                  <div class="col-md-4 col-sm-12">
                    <div tyle="margin-left:1.5em;" class="card mb-2">
                      <img class="card-img-top" width="200px" height="250px" src="{{ \Illuminate\Support\Facades\Storage::url("".$com->img_url) }}"
                           alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">{{ $com->nombre_producto }}<h4>
                          <p class="card-text">AHORA $ {{  number_format($com->precio_actual)}} <span class="text-success text-sm font-weight-bolder">{{$com->off_producto}}% DESCUENTO</span>

                            <input name="precio_producto" value="{{$com->precio_producto}}" hidden>
                            <input name="nombre_producto" value="{{$com->nombre_producto}}" hidden>
                            <input name="img_url" value="{{$com->img_url}}" hidden>
                            <input name="off_producto" value="{{$com->off_producto}}" hidden>

                          </p>
                          <p class="card-text antes-precio">ANTES $ {{  number_format($com->precio_antes)}}</p>

                        <p class="card-text">{{ $com->descripcion_producto}}
                        </p>
                        @if (Route::has('login'))
                            @auth
                            <form id="form" method="POST" action="{{ route('ventas.store',['nom'=> $com->nombre_producto])}}">
                              @csrf
                              <input name="precio_producto" value="{{$com->precio_actual}}" hidden>
                              <input name="nombre_producto" value="{{$com->nombre_producto}}" hidden>
                              <input name="img_url" value="{{$com->img_url}}" hidden>
                              <input name="off_producto" value="{{$com->off_producto}}" hidden>
                              <input name="producto_id" value="{{$com->id}}" hidden>

                                <button class="btn btn-primary" type="submit">Comprar</button>

                            </form>

                            <form method="POST" action="{{ route('carrito.store')}}">
                              @csrf
                              <input name="precio_producto" value="{{$com->precio_actual}}" hidden>
                              <input name="nombre_producto" value="{{$com->nombre_producto}}" hidden>
                              <input name="usuario_id" value="{{Auth::user()->id}}" hidden>
                              <input name="off_producto" value="{{$com->off_producto}}" hidden>
                              <input name="producto_id" value="{{$com->id}}" hidden>

                              <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart fixed-plugin-button-nav cursor-pointer"></i></button>

                            </form>





                            @else
                            <a class="btn btn-primary btn-sm" href="{{route('login')}}">Iniciar session </a>
                            @endauth
                    @endif
                      </div>
                    </div>
                  </div>
                </form>

                @endforeach

                  <div  class="col-md-4 clearfix d-none d-md-block align-self-end">
                    <div class="card mb-2">
                        <div class="card-body">
                          <a href="{{ route('productos.show',['id'=> "com"])}}" class="btn btn-primary"> CLICK PARA MAS PRODUCTOS...</a>
                        </div>
                      </div>
                </div>
                </div>
              </div>
              <!--END ECCION COMPUTACION -->

               <!--SECCION TELEFONNIA -->
              <div class="row mt-12 col-sm-12">
                <p>Celulares y Telefonia</p>
                <div class="row">
                @foreach ($celtel as $cel)

                  @csrf
                  <div class="col-md-4 col-sm-12">
                    <div tyle="margin-left:1.5em;" class="card mb-2">
                      <img style="padding-left:3em; padding-right:3em;" class="card-img-top" width="150px" height="250px"  src="{{ \Illuminate\Support\Facades\Storage::url("".$cel->img_url) }}"
                           alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">{{$cel->nombre_producto}}<h4>
                          <p class="card-text">AHORA $ {{  number_format($cel->precio_actual)}} <span class="text-success text-sm font-weight-bolder">{{$cel->off_producto}}% DESCUENTO</span>

                            <input name="precio_producto" value="{{$cel->precio_producto}}" hidden>
                            <input name="nombre_producto" value="{{$cel->nombre_producto}}" hidden>
                            <input name="img_url" value="{{$cel->img_url}}" hidden>
                            <input name="off_producto" value="{{$cel->off_producto}}" hidden>
                            <input name="producto_id" value="{{$cel->id}}" hidden>

                          </p>
                          <p class="card-text antes-precio">ANTES $ {{  number_format($cel->precio_antes)}}</p>

                        <p class="card-text">{{ $cel->descripcion_producto}}
                        </p>
                        @if (Route::has('login'))
                            @auth
                            <form id="form" method="POST" action="{{ route('ventas.store',['nom'=> $cel->nombre_producto])}}">
                              @csrf
                              <input name="precio_producto" value="{{$cel->precio_actual}}" hidden>
                              <input name="nombre_producto" value="{{$cel->nombre_producto}}" hidden>
                              <input name="img_url" value="{{$cel->img_url}}" hidden>
                              <input name="off_producto" value="{{$cel->off_producto}}" hidden>
                              <input name="producto_id" value="{{$cel->id}}" hidden>

                                <button class="btn btn-primary" type="submit">Comprar</button>

                            </form>

                            <form method="POST" action="{{ route('carrito.store')}}">
                                @csrf
                              <input name="precio_producto" value="{{$cel->precio_actual}}" hidden>
                              <input name="nombre_producto" value="{{$cel->nombre_producto}}" hidden>
                              <input name="usuario_id" value="{{Auth::user()->id}}" hidden>
                              <input name="off_producto" value="{{$cel->off_producto}}" hidden>
                              <input name="producto_id" value="{{$cel->id}}" hidden>

                              <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart fixed-plugin-button-nav cursor-pointer"></i></button>

                            </form>





                            @else
                            <a class="btn btn-primary btn-sm" href="{{route('login')}}">Iniciar session </a>
                            @endauth
                    @endif
                      </div>
                    </div>
                  </div>
                </form>

                @endforeach

                  <div  class="col-md-4 clearfix d-none d-md-block align-self-end">
                    <div class="card mb-2">
                        <div class="card-body">
                          <a href="{{ route('productos.show',['id'=> "com"])}}" class="btn btn-primary"> CLICK PARA MAS PRODUCTOS...</a>
                        </div>
                      </div>
                </div>
                </div>
              </div>
          <!-- END SECCION TELEFONNIA -->

                 <!--SECCION AUDIO -->
                 <div class="row mt-12 col-sm-12">
                  <p>AUDIO Y VIDEO </p>
                  <div class="row">
                  @foreach ($audio as $au)

                    @csrf
                    <div class="col-md-4 col-sm-12">
                      <div tyle="margin-left:1.5em;" class="card mb-2">
                        <img class="card-img-top"width="200px" height="250px"  src="{{ \Illuminate\Support\Facades\Storage::url("".$au->img_url) }}"
                             alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">{{$au->nombre_producto}}<h4>
                            <p class="card-text">AHORA $ {{  number_format($au->precio_actual)}} <span class="text-success text-sm font-weight-bolder">{{$au->off_producto}}% DESCUENTO</span>

                              <input name="precio_producto" value="{{$au->precio_actual}}" hidden>
                              <input name="nombre_producto" value="{{$au->nombre_producto}}" hidden>
                              <input name="img_url" value="{{$au->img_url}}" hidden>
                              <input name="off_producto" value="{{$au->off_producto}}" hidden>

                            </p>
                            <p class="card-text antes-precio">ANTES $ {{  number_format($au->precio_antes)}}</p>

                          <p class="card-text">{{ $au->descripcion_producto}}
                          </p>
                          @if (Route::has('login'))
                              @auth
                              <form id="form" method="POST" action="{{ route('ventas.store',['nom'=> $au->nombre_producto])}}">
                                @csrf
                                <input name="precio_producto" value="{{$au->precio_actual}}" hidden>
                                <input name="nombre_producto" value="{{$au->nombre_producto}}" hidden>
                                <input name="img_url" value="{{$au->img_url}}" hidden>
                                <input name="off_producto" value="{{$au->off_producto}}" hidden>
                              <input name="producto_id" value="{{$au->id}}" hidden>

                                  <button class="btn btn-primary" type="submit">Comprar</button>

                              </form>

                              <form method="POST" action="{{ route('carrito.store')}}">
                                  @csrf
                                <input name="precio_producto" value="{{$au->precio_actual}}" hidden>
                                <input name="nombre_producto" value="{{$au->nombre_producto}}" hidden>
                                <input name="usuario_id" value="{{Auth::user()->id}}" hidden>
                                <input name="off_producto" value="{{$au->off_producto}}" hidden>
                              <input name="producto_id" value="{{$au->id}}" hidden>

                                <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart fixed-plugin-button-nav cursor-pointer"></i></button>

                              </form>
                              @else
                              <a class="btn btn-primary btn-sm" href="{{route('login')}}">Iniciar session </a>
                              @endauth
                      @endif
                        </div>
                      </div>
                    </div>
                  </form>

                  @endforeach

                    <div  class="col-md-4 clearfix d-none d-md-block align-self-end">
                      <div class="card mb-2">
                          <div class="card-body">
                            <a href="{{ route('productos.show',['id'=> "com"])}}" class="btn btn-primary"> CLICK PARA MAS PRODUCTOS...</a>
                          </div>
                        </div>
                  </div>
                  </div>
                </div>
            <!-- END SECCION AUDIO -->

             <!--SECCION ACCESORIOS -->
             <div class="row mt-12 col-sm-12">
              <p>Accesorios </p>
              <div class="row">
              @foreach ($acce as $acc)

                @csrf
                <div class="col-md-4 col-sm-12">
                  <div tyle="margin-left:1.5em;" class="card mb-2">
                    <img class="card-img-top" width="100" height="250px" src="{{ \Illuminate\Support\Facades\Storage::url("".$acc->img_url) }}"
                         alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">{{$acc->nombre_producto}}<h4>
                        <p class="card-text">AHORA $ {{  number_format($acc->precio_actual)}} <span class="text-success text-sm font-weight-bolder">{{$acc->off_producto}}% DESCUENTO</span>

                          <input name="precio_producto" value="{{$acc->precio_producto}}" hidden>
                          <input name="nombre_producto" value="{{$acc->nombre_producto}}" hidden>
                          <input name="img_url" value="{{$acc->img_url}}" hidden>
                          <input name="off_producto" value="{{$acc->off_producto}}" hidden>

                        </p>
                        <p class="card-text antes-precio">ANTES $ {{  number_format($acc->precio_antes)}}</p>

                      <p class="card-text">{{ $acc->descripcion_producto}}
                      </p>
                      @if (Route::has('login'))
                          @auth
                          <form id="form" method="POST" action="{{ route('ventas.store',['nom'=> $acc->nombre_producto])}}">
                            @csrf
                            <input name="precio_producto" value="{{$acc->precio_actual}}" hidden>
                            <input name="nombre_producto" value="{{$acc->nombre_producto}}" hidden>
                            <input name="img_url" value="{{$acc->img_url}}" hidden>
                            <input name="off_producto" value="{{$acc->off_producto}}" hidden>
                            <input name="producto_id" value="{{$acc->id}}" hidden>

                              <button class="btn btn-primary" type="submit">Comprar</button>

                          </form>

                          <form method="POST" action="{{ route('carrito.store')}}">
                              @csrf
                            <input name="precio_producto" value="{{$acc->precio_actual}}" hidden>
                            <input name="nombre_producto" value="{{$acc->nombre_producto}}" hidden>
                            <input name="usuario_id" value="{{Auth::user()->id}}" hidden>
                            <input name="off_producto" value="{{$acc->off_producto}}" hidden>
                            <input name="producto_id" value="{{$acc->id}}" hidden>

                            <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart fixed-plugin-button-nav cursor-pointer"></i></button>

                          </form>
                          @else
                          <a class="btn btn-primary btn-sm" href="{{route('login')}}">Iniciar session </a>
                          @endauth
                  @endif
                    </div>
                  </div>
                </div>
              </form>

              @endforeach

                <div  class="col-md-4 clearfix d-none d-md-block align-self-end">
                  <div class="card mb-2">
                      <div class="card-body">
                        <a href="{{ route('productos.show',['id'=> "com"])}}" class="btn btn-primary"> CLICK PARA MAS PRODUCTOS...</a>
                      </div>
                    </div>
              </div>
              </div>
            </div>
            <!--END SECCION ACCESORIOS -->

            </div>




        </div>
      </div>
    </div>
@endsection
