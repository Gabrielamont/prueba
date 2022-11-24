<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $product = Product::all();

        return view('admin.product', ['product' => $product]); //entonces pon el dashboard aqui y que la ruta sea aqui

    }

    public function create()
    {

        return view("admin.product.create");
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.edit', [
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        if ($product->save()) {

            return redirect('/admin/product')->with([
                'flash_class'   => 'alert-success',
                'flash_message' => 'Producto Actualizado con exito.',
            ]);
        } else {
            return redirect('/admin/product')->with([
                'flash_class'     => 'alert-danger',
                'flash_message'   => 'Ha ocurrido un error.',
                'flash_important' => true,
            ]);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect('/admin/product')->with([
            'flash_class'   => 'alert-success',
            'flash_message' => 'Producto eliminado con exito.',
        ]);
    }

    public function store(Request $request)
    {

        $product = new Product();
        $product->user_id = Auth::id();
        $product->status = 0;
        $product->fill($request->all());

        if ($product->save()) {
            return redirect("/admin/product")->with([
                'flash_msj'   => 'Producto registrado!',
                'flash_class' => 'alert-success',
            ]);
        } else {
            return redirect("/admin/product")->with([
                'flash_message'   => 'Ha ocurrido un error.',
                'flash_class'     => 'alert-danger',
                'flash_important' => true,
            ]);
        }
    }
}
