<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


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
    public function store(Request $request)
    {
        // ya existe este producto cargado como detalle?
        $cart = auth()->user()->cart;
        $detail = $cart->details()->where('product_id', $request->product_id)->first();

        if ($detail) {
            //en caso de si , solo actualiza el carrito
            $detail->quantity += $request->quantity;
            $detail->save();
        } else {
            //en el caso que no , hacemos lo de siempre

            $cartDetail = new CartDetail();
            $cartDetail->cart_id = auth()->user()->cart->id;
            $cartDetail->product_id = $request->product_id;
            $cartDetail->quantity = $request->quantity;
            $cartDetail->save();
        }
        return back()->with('info', 'Producto añadido correctamente!');
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


    public function destroy(Request $request)
    {
        $cartDetail = CartDetail::find($request->cart_detail_id);
        $cartDetail->delete();
        return back()->with('success', 'producto eliminado de tu carrito');
    }
}
