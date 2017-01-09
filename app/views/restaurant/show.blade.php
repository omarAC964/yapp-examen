@extends('layouts.principal')

@section('content')
    @if(isset($lol))
        <div class="row">
            <div class="container-fluid">
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5>Nota </h5>
                    Estas en esta pagina porque no has ingresado Restaurantes en la base de datos ingresa uno porfavor.
                </div>

            </div>
        </div>
    @endif

    <div class="row btr">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="javascript:history.back(1)"> <i class="material-icons right">replay</i> Regresar</a>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="jumbotron">
            <div class="row">
                <div class="col s12">

                    <div class="input-field col s6">
                        <ul class="list-group">
                            <li class="list-group-item"><p class="title-panel">Nombre Restaurante</p>{{ $restaurante->nombre_restaurante }}</li>
                            <li class="list-group-item"><p class="title-panel">Dirección</p>{{ $restaurante->direccion }}</li>
                            <li class="list-group-item"><p class="title-panel">telefono</p>{{ $restaurante->telefono }}</li>

                        </ul>
                    </div>

                    <div class="input-field col s6">
                        <ul class="list-group">
                            <li class="list-group-item"><p class="title-panel">Horario de atencion</p>
                                @foreach($restaurante->dias as $dia)
                                    @if($dia->hora_inicio == '00:00:00')
                                    <p class="cerrado">{{ $dia->dia.' Cerrado' }}</p>
                                    @else
                                        <p>{{ $dia->dia.' '.$dia->hora_inicio.' '.$dia->hora_fin }}</p>
                                        @endif

                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

