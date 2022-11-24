<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>prueba</title>

    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.18/r-2.2.2/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('login-css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-css/glyphicons.css') }}">
    <link rel="icon" type="image/png" sizes="240x240" href="{{ asset('img/logo.png') }}">

</head>


<body>
    <div class="d-flex flex-column align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Bienvenido , {{ auth()->user()->name }}</h5>
        <br>

        <a class="btn btn-outline-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>{{ __('Cerrar Sesion') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <br><br><br>
    <center>
        <h1 class="display-4">Compra nuestro productos!</h1>
    </center>



    @if (count($errors) > 0)
        <div class="alert alert-danger alert-important">
            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        @include('partials.flash')

        <table class="table data-table table-bordered table-hover table-condensed" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
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
                        <td>{{ date_format($p->created_at, 'Y/m/d') }}</td>
                        <td>
                            <form class="w-full" action="{{ route('purchase_product', $p->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <button type="submit" class="btn btn-warning btn-sm"
                                    onclick="return confirm('Estas seguro de comprar el producto?')"
                                    href="{{ route('purchase_product', $p->id) }}"><font color="white">Comprar</font></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Accion</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
    <script>
        function salir() {
            if ($('#br-cart-items').text() > 0) {
                $('#ModalSingOut').modal('show');
            } else {
                location.href = '{{ url('/logout') }}';
            }
        }
    </script>

</body>

</html>
