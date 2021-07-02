<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\productos;
use App\Models\carrito;
use RealRashid\SweetAlert\Facades\Alert;
use ToSweetAlert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        toast('puedes agregar productos a tu carrito','info');

        $celtel=productos::where('categoria_producto', 'cel')
        ->get()
        ->take(5);

        $comp=productos::where('categoria_producto', 'com')
        ->get()
        ->take(5);

        $audio=productos::where('categoria_producto', 'au')
        ->get()
        ->take(5);

        $acce=productos::where('categoria_producto', 'acc')
        ->get()
        ->take(5);

        if (Auth::check())
            {
                $carrito=carrito::where('user_id', Auth::user()->id)
                ->where('pagado','0')
                ->get();

                $carritoTot=carrito::select((\DB::raw('sum(precio_producto) as precio_total')))
                ->where('user_id', Auth::user()->id)
                ->where('pagado','0')->first();

            }else{
               $carrito=carrito::where('user_id', '00')
               ->where('pagado','0'
               )->get();

               $carritoTot=carrito::select((\DB::raw('sum(precio_producto) as precio_total')))
               ->where('user_id', '00')
               ->where('pagado','0')
               ->first();
            }

        return view('home', compact('celtel','comp', 'carrito', 'carritoTot', 'audio','acce'));
    }
}
