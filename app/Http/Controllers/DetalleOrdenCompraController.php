<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleOrdenCompra;
use App\Models\Album;
use App\Models\OrdenCompra;

class DetalleOrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalle_orden_compras = DetalleOrdenCompra::all();
        return view('detalleOrdenCompras.index', compact('detalleOrdenCompras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detalleOrdenCompras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalle_orden_compra  = new DetalleOrdenCompra();
        $detalle_orden_compra->precio = $request->precio;
        $detalle_orden_compra->cantidad = $request->cantidad;
        $detalle_orden_compra->subtotal = $request->subtotal;
        $detalle_orden_compra->album_id = $request->input('album_id');
        $detalle_orden_compra->orden_compra_id = $request->input('orden_compra_id');
        $detalle_orden_compra->save();
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
