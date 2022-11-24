<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="icon" type="image/png" sizes="240x240" href="{{ asset('img/logo.png') }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('login-css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('login-css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('login-css/AdminLTE.min.css') }}">
    <style>
        body {
            font-family: helvetica;
            background-image: url("{{ asset('img/fondo1.png') }}");
            background-color: black;
            background-position: center center;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            border-color: white;
        }

        .white {}

        #btn_reg:hover {
            color: #D9D9D9;
            text-decoration: none;
        }
    </style>
</head>

<body>
    @include('partials.flash')
    <br><br>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-primary" style="background-color: rgba(14, 0, 0, 0.6); color: #fff;">
                <div class="panel-heading">
                    <h3 class="text-center">
                        <i class="fa fa-user-plus"></i>
                        Registro de empleado
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('registerUser') }}">
                        {{ csrf_field() }}

                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-important">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h4>Agregar Usuario</h4>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="control-label" for="cedula">Nombre: *</label>
                            <input id="cedula_buscar" class="form-control" type="text" name="name"
                                value="" placeholder="Nombre" required>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="control-label" for="cedula">Email: *</label>
                            <input id="cedula_buscar" class="form-control" type="email" name="email"
                                value="{{ old('cedula') ? old('cedula') : '' }}" placeholder="Email" required>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="control-label" for="cedula">Contraseña: *</label>
                            <input id="cedula_buscar" class="form-control" type="password" name="password"
                                value="{{ old('cedula') ? old('cedula') : '' }}" placeholder="*******" required>
                        </div>
                        <div class="form-group text-right">
                            <a class="btn btn-flat btn-default" href="{{ route('login') }}"><i class="fa fa-reply"></i>
                                Atras</a>
                            <button class="btn btn-flat btn-primary" id="btn_cedula" type="submit"><i
                                    class="fa fa-user"></i> Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
