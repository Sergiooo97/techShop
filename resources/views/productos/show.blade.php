@extends('layouts.app')
@section('content')
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">


        <!--END SECCION DE CATEGORIA DE PRODUCTOS-->
          <hr>
          <div s class="container">
            <div class="row mt-12 col-sm-12">
              <p>Productos</p>
              <div class="row">
              @foreach ($productos as $com)

                @csrf
                <div class="col-md-4 col-sm-12">
                  <div tyle="margin-left:1.5em;" class="card mb-2">
                    <img class="card-img-top" width="100" height="250px" src="{{ \Illuminate\Support\Facades\Storage::url("".$com->img_url) }}"
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


              </div>
            </div>


          </div>



      </div>
    </div>
  </div>

@endsection

