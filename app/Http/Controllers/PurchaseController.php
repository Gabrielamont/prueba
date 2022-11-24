<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use Auth;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {

        $product = Product::where("status", 0)->get();

        return view('purchases', ['product' => $product]);

    }

    public function purchase(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->status = 1;

        if ($product->save()) {

            $order = new Purchase;
            $order->buyer_user_id = Auth::id();
            $order->seller_user_id = $product->user_id;
            $order->product_id = $product->id;
            $order->total = $product->price;
            $order->iva = $product->iva;
            $order->status = 0;

            $porcentaje_iva = $product->iva;
            $total = $product->price;
            $iva = $total * ($porcentaje_iva / 100);

            $order->total_iva = $total + $iva;

            $order->save();

            return redirect('/purchases')->with([
                'flash_class'   => 'alert-success',
                'flash_message' => 'Compra realizada con exito.',
            ]);
        } else {
            return redirect('/purchases')->with([
                'flash_class'     => 'alert-danger',
                'flash_message'   => 'Ha ocurrido un error.',
                'flash_important' => true,
            ]);
        }
    }
}
