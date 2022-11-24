@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Sistema de facturación - Productos</h1>
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
                                {{ count($product) }}
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
                        <div class="box-header with-border">
                            <span class="float-right">
                                <a href="{{ route('product_create') }}" class="btn btn-flat btn-primary"><i
                                        class="fa fa-plus" aria-hidden="true"></i>Agregar nuevo</a>
                            </span>
                        </div>
                        <div class="box-body">
                            <table id="example" class="table data-table table-bordered table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Impuestos</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Accion</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($product as $p)
                                        <?php
                                        $porcentaje_iva = $p->iva;
                                        $total = $p->price;
                                        $iva = $total * ($porcentaje_iva / 100);
                                        $total_con_iva = $total + $iva;
                                        ?>
                                        <tr>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->price }}</td>
                                            <td>{{ $p->iva }}</td>
                                            <td>{{ $total_con_iva }}</td>
                                            <td>
                                                @if ($p->status == 0)
                                                    <span class="badge badge-warning text-white">En espera</span>
                                                @else
                                                    <span class="badge badge-success">Vendido</span>
                                                @endif
                                            </td>
                                            <td>{{ date_format($p->created_at, 'Y/m/d') }}</td>

                                            @if ($p->status == 0)
                                                <td class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{ route('edit_product', $p->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <font color="white"><i class="fa fa-edit"></i></font>
                                                        </a>
                                                    </div>
                                                    <form action={{ route('delete_product', $p->id) }} method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Estas seguro de eliminar el producto?')"
                                                            href="{{ route('delete_product', $p->id) }}"><i
                                                                class="fa fa-trash"></i></button>

                                                    </form>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    -
                                                </td>
                                            @endif

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
