@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Sistema de facturación - Facturas (Crtl + P Imprimir)</h1>
@stop

@section('content')



    <br>


    <div class="content">
        <div class="box bg-white">
            <div class="box box-success">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12  arial">
                            <div>
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th colspan="5" class="font-weight-bold">Numero de orden -
                                                {{ $bill->order_identification }} - </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <th>Nombre producto</th>
                                            <th>Precio</th>
                                            <th>IVA %</th>
                                            <th>Total + IVA %</th>
                                            <th>Fecha</th>


                                        </tr>

                                        <?php
                                        $price = [];
                                        $iva = [];

                                        foreach ($sale as $s) {
                                            $cantidad_price = $s->product->price;
                                            $price[] = $cantidad_price;

                                            $cantidad_iva = $s->iva;
                                            $iva[] = $cantidad_iva;
                                        }

                                        $total_price = array_sum($price);
                                        $total_iva = array_sum($iva);

                                        $iva_final = $total_price * ($total_iva / 100);
                                        $total_final = $total_price + $iva_final;

                                        ?>

                                        @foreach ($sale as $s)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $s->product->name }}

                                                </td>
                                                <td class="text-center">
                                                    {{ $s->product->price }}

                                                </td>
                                                <td class="text-center">
                                                    {{ $s->iva }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $s->total_iva }}
                                                </td>
                                                <td class="text-center">
                                                    {{ date_format($s->created_at, 'Y/m/d') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div>
                                <table class="table table-bordered table-sm">
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <tr>

                                            <th>Cliente</th>
                                            <th>Precio total</th>
                                            <th>IVA Total %</th>
                                            <th>Total + IVA %</th>


                                        </tr>


                                        <tr>
                                            <td class="text-center">
                                                {{ $bill->client->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $total_price }}
                                            </td>
                                            <td class="text-center">
                                                {{ $total_iva }}
                                            </td>
                                            <td class="text-center">
                                                {{ $total_final }}
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop
