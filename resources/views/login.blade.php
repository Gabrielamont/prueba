<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>prueba</title>

    <link rel="stylesheet" href="{{ asset('login-css/login.css') }}">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('login-css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('login-css/font-awesome.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('login-css/AdminLTE.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-css/glyphicons.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('login-css/_all-skins.min.css') }}">

    <link rel="icon" type="image/png" sizes="240x240" href="{{ asset('img/logo.png') }}">

</head>
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


<body>
    <br><br><br>

    <div class="container">
        @include('partials.flash')
    </div>
    <form action="{{ route('auth') }}" method="POST">
        {{ csrf_field() }}

        <div class="container-fluid">

            <div class="row-fluid">




                <div class="col-md-offset-4 col-md-4" id="box">
                    <div class="login-logo">
                        <center>
                            <i style="color:#fff;" class="fa fa-users fa-3x white"></i>
                        </center>
                    </div>

                    <center>
                        <h4 style="color:#fff;">- PODER JUDICIAL -</h4>
                        <h5 style="color:#fff;">- SISTEMA DE GESTIÓN DE FACTURA -</h5>
                    </center>

                    <hr>


                    <fieldset>
                        <!-- Form Name -->


                        <!-- Text input-->

                        <div class="form-group has-feedback">
                            <input class="form-control" type="text" name="email" placeholder="Correo">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                        </div>

                        <div class="form-group has-feedback">
                            <input id="password" class="form-control" type="password" name="password"
                                placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>




                        <div class="form-group">
                            <button id="b-login" type="submit"
                                class="btn btn-success btn-block btn-flat">Entrar</button>
                        </div>

                        <div class="form-group text-center">
                            <span style="color:#fff;">¿Aun no tienes cuenta?</span>
                            <span>
                                <a href="{{ route('register') }}" class="btn btn-link white" id="btn_reg">
                                    <i class="fa fa-hand-o-up"></i> Registrate!
                                </a>
                            </span>
                        </div>


                    </fieldset>
    </form>
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-important">
            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    </div>


    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="{{ asset('login-js/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script type="text/javascript" src="{{ asset('login-js/bootstrap.min.js') }}"></script>

</body>

</html>
