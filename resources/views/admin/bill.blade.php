@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Sistema de facturación - Facturas</h1>
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

                    </div>

                </div>

            </div>

            @if ($sale->count() > 0)
                <form action="{{ route('bill_store') }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Generar facturas pendientes</button>
                </form>
            @else
                <button type="button" disabled class="btn btn-primary btn-lg btn-block">No hay facturas pendientes que
                    generar</button>
            @endif

            <br>
            @include('partials.flash')




            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info bg-white">
                        <div class="box-body">
                            <table id="example" class="table data-table table-bordered table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Numero de orden</th>
                                        <th class="text-center">Cliente</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Accion</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($bill as $b)
                                        <tr>
                                            <td>{{ $b->id }}</td>
                                            <td>{{ $b->order_identification }}</td>
                                            <td>{{ $b->client->name }}</td>
                                            <td>{{ date_format($b->created_at, 'Y/m/d') }}</td>
                                            <td>
                                                <a href="{{ route('view_bill', $b->id) }}" class="btn btn-primary btn-sm">
                                                    <font color="white"><i class="fa fa-eye"></i></font>
                                                </a>
                                            </td>
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
