<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {

        $sale = Purchase::all();

        return view('admin.sales', ['sale' => $sale]);

    }
}
