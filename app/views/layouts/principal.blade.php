<!DOCTYPE html>
<html lang="es_MX">

<head>
    <title>Yapp Examen</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Byte Control">
    <link rel="icon" href="img/favicon.ico">

    <title>Página Principal</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/simple-sidebar.css') }}" />

    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/materialize.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}" />

    <script type="text/javascript">
    </script>
    <style>
    </style>

    @yield('ajax')

</head>

<body>

<!-- /#sidebar-wrapper -->
<div class="header">
    <div class="cabeza">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- <a class="navbar-brand" href="#">Brand</a> -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <!--<li class="active"><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a></li>-->
                    <li><a class="no-padding" href="{{url('restaurantes')}}"><img src="{{ URL::to('/img/favicon.ico') }}" class="icono" lt=""></a> </li>
                    <li>Restaurantes</li>

                </ul>

            </div>
        </nav>
    </div>


</div>
<!-- Page Content -->



@yield('content')

<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<!-- JS materialize -->
<script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>

<!-- Scripts para byte -->
<script type="text/javascript" src="{{ URL::asset('js/scripts.js') }}"></script>
<!-- Bootbox -->
<script type="text/javascript" src="{{ URL::asset('js/bootbox.min.js') }}"></script>

<!-- Menu Toggle Script -->

@yield('scripts')



<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });

    HTMLCollection.toString();
</script>


</body>

</html>