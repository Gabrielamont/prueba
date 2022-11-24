@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    @include('partials.flash')
    <div class="content">
        <div class="box">
            <div class="box box-danger bg-white">
                <div class="box-header with-border">
                    <center>
                        <h3 class="box-title center"><b>AGREGAR PRODUCTO</b></h3>
                    </center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Formulario -->
                    <div class="row">
                        <div class="form-group col-sm-12 ">
                            <form class="w-full" action="{{ route('update_product', $product->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="row">

                                    <div class="col-md-12">
                                        <label class="control-label" for="cedula">Nombre: *</label>
                                        <input step="0.01" class="form-control" type="text" name="name"
                                            value="{{ $product->name }}" placeholder="Nombre" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="control-label" for="cedula">Precio: *</label>
                                        <input step="0.01" class="form-control" type="number" name="price"
                                            value="{{ $product->price }}" placeholder="Precio" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="control-label" for="cedula">Iva: *</label>
                                        <input step="0.01" class="form-control" type="number" name="iva"
                                            value="{{ $product->iva }}" placeholder="Impuesto" required>
                                    </div>

                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-warning float-right">Actualizar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div><!-- fin box body -->
            </div><!-- /.box -->
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
