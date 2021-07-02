<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\productos;
use App\Models\carrito;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use ToSweetAlert;
class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = productos::orderBy('categoria_producto')->orderBy('id', 'ASC')->orderBy('categoria_producto', 'ASC')->get();
        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = new productos();
        $antes =  $request->input('precio_producto');
        $off = $request->input('off_producto');
       (float) $total_DESC = ((float)$antes * (float)$off)/100;
       (float)$actual =  (float)$antes -  (float)$total_DESC;
        $productos->precio_actual = $actual;
        $productos->precio_antes = $request->input('precio_producto');
        $productos->marca_id = $request->input('marca_producto');
        $productos->nombre_producto = $request->input('nombre_producto');
        $productos->descripcion_producto = $request->input('descripcion_producto');
        $productos->categoria_producto = $request->input('categoria_producto');
        $productos->off_producto = $request->input('off_producto');
        if($request->hasFile('img_url')){
            $productos->img_url =$request->file('img_url')->store('public');
        }
        $productos->save();

    return back();
    }

    public function storeCarrito(Request $request)
    {
        $carrito = new carrito();
        $carrito->precio_producto = $request->input('precio_producto');
        $carrito->nombre_producto = $request->input('nombre_producto');
        $carrito->off_producto = $request->input('off_producto');
        $carrito->pagado = "0";
        $carrito->img_url = "ejemplo.jpg";
        $carrito->producto_id = $request->input('producto_id');
        $carrito->user_id = Auth::user()->id;
        $carrito->save();

    return back();
    }

    public function indexCarrito(Request $request)
    {
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

        return view('carrito.index', compact('carrito', 'carritoTot'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        toast('puedes agregar productos a tu carrito','info');

        $productos=productos::where('categoria_producto', $id)->get();

        return view('productos.show', compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
