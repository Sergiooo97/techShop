<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\ventas;
use App\Models\carrito;

use Auth;

class ventasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $nombre_producto)
    {
        $ventas = new ventas();
        $ventas->precio_producto = $request->input('precio_producto');
        $ventas->nombre_producto = $request->input('nombre_producto');
        $ventas->categoria_producto = "0";
        $ventas->id_usuario = Auth::user()->id;
        $ventas->producto_id  = $request->input('producto_id');
        $ventas->save();
        $nom = $nombre_producto;

        return view('venta.comprado', compact('nom'));
    }
    public function cartSuccess(Request $request)
    {

        foreach ($request->get('producto_id') as $key => $value) {
            $ventas = new ventas();
            $ventas->precio_producto = $request->input('precio_producto')[$key];
            $ventas->nombre_producto = $request->input('nombre_producto')[$key];
            $ventas->categoria_producto = "0";
            $ventas->id_usuario = Auth::user()->id;
            $ventas->producto_id  = $request->input('producto_id')[$key];
            $ventas->save();


        }
        $ventads = carrito::where('user_id', Auth::user()->id);
        $ventads->delete();

        $nom = "Tus productos de tu carrito de compra";
        return view('venta.comprado', compact('nom'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
