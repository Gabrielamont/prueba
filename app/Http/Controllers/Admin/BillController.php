<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Auth;
use DB;
use App\Models\Purchase;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {

        $sale = Purchase::where("status", 0)->get();

        $bill = Bill::all();

        return view('admin.bill', [
            'sale' => $sale,
            'bill' => $bill
        ]);
    }

    public function view($id)
    {
        $bill = Bill::findOrFail($id);
        $sale        = Purchase::where('bill_id', $id)
            ->orderBy('created_at', 'desc')->get();



        return view('admin.bill.view', [
            'bill' => $bill,
            'sale' => $sale,
        ]);
    }

    public function store(Request $request)
    {

        $prueba = DB::table('purchases')
            ->where('status', 0)
            ->select('buyer_user_id', DB::raw('count(*) as total'))
            ->groupBy('buyer_user_id')
            ->get();

        foreach ($prueba as $p) {
            $bill = new Bill;
            $bill->order_identification = Auth::id() . 'P' . getRandomToken(15);
            $bill->client_id = $p->buyer_user_id;

            $bill->save();

            if ($bill->client_id == $p->buyer_user_id) {
                DB::table('purchases')
                    ->where('status', 0)
                    ->where('buyer_user_id', $p->buyer_user_id)
                    ->update(['status' => 1, 'bill_id' => $bill->id]);
            }
        }

        return redirect("/admin/bills")->with([
            'flash_msj'   => 'Factura generada!',
            'flash_class' => 'alert-success',
        ]);
    }
}
