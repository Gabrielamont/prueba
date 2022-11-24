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
                        <form class="w-full" action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="row">

                                <div class="col-md-12">
                                    <label class="control-label" for="cedula">Nombre: *</label>
                                    <input id="cedula_buscar" class="form-control" type="text" name="name"
                                        value="" placeholder="Nombre" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label" for="cedula">Precio: *</label>
                                    <input id="cedula_buscar" class="form-control" step="0.01" type="number" name="price"
                                        value="" placeholder="Precio" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label" for="cedula">Iva: *</label>
                                    <input id="cedula_buscar" class="form-control" step="0.01" type="number" name="iva"
                                        value="" placeholder="Impuesto" required>
                                </div>

                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success float-right">Guardar</button>
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
