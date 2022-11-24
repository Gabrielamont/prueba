@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Sistema de facturación - Ventas</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-align-left"></i></span>

                        <div class="info-box-content">
                            <span class="font-bold info-red-text">Total</span>
                            <span class="info-box-number retro">
                                {{ count($sale) }}
                            </span>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->

                </div>

            </div>
            @include('partials.flash')




            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info bg-white">
                        <div class="box-body">
                            <table id="example" class="table data-table table-bordered table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">Comprador</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Iva</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($sale as $s)

                                        <tr>
                                            <td>{{ $s->id }}</td>
                                            <td>{{ $s->product->name }}</td>
                                            <td>{{ $s->buyer->name }}</td>
                                            <td>{{ $s->product->price }}</td>
                                            <td>{{ $s->iva }}</td>
                                            <td>{{ $s->total_iva }}</td>
                                            <td>
                                                @if($s->status == 0)
                                                <span class="badge badge-warning text-white">Aun no facturado</span>
                                                @else
                                                <span class="badge badge-success">Facturado</span>
                                                @endif
                                            </td>
                                            <td>{{ date_format($s->created_at, 'Y/m/d') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>




        </div>
    </section>
@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@stop
