@extends('layouts.principal')
@section('ajax')
    <script>
        function lol() {

        var abierto = '<div class="input-field col s6"><label class="fecha">Hora Abierto</label><input type="time" name="hora_inicio" value="09:00:00" max="23:59:59" min="00:00:00" step="1"></div>';
        var cerrado = '<div class="input-field col s6"><label class="fecha">Hora Cerrado</label><input type="time" name="hora_fin" value="20:00:00" max="23:59:59" min="00:00:00" step="1"></div>';
        document.getElementById('horarios').appendChild('<div class="input-field col s6"><label class="fecha">Hora Abierto</label><input type="time" name="hora_inicio" value="09:00:00" max="23:59:59" min="00:00:00" step="1"></div>');
            document.getElementById('horarios').appendChild(cerrado);



        }



    </script>
    @endsection
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

                    {{ Form::open(array('route' => 'restaurant.store','method'=>'POST' )) }}

                    <div class="input-field col s6">
                        {{ Form::label('nombre_restaurante', 'Nombre Restaurante')}}
                        {{ Form::text('nombre_restaurante',null,['class' => 'validate'])}}
                    </div>

                    <div class="input-field col s6">
                        {{ Form::label('direccion', 'Dirección')}}
                        {{ Form::text('direccion',null,['class' => 'validate'])}}
                    </div>

                    <div class="input-field col s6">
                        {{ Form::label('telefono', 'Teelefono')}}
                        {{ Form::text('telefono' ,null,['class' => 'validate'])}}
                    </div>



                    <div class="input-field col s3">
                        <label class="fecha">Hora Abierto lunes</label>
                        <input type="time" name="al" value="09:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Cerrado</label>
                        <input type="time" name="cl" value="20:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Abierto Martes</label>
                        <input type="time" name="am" value="09:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Cerrado</label>
                        <input type="time" name="cm" value="20:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>

                    <div class="input-field col s3">
                        <label class="fecha">Hora Abierto Miercoles</label>
                        <input type="time" name="amm" value="09:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Cerrado</label>
                        <input type="time" name="cmm" value="20:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Abierto Jueves</label>
                        <input type="time" name="aj" value="09:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Cerrado</label>
                        <input type="time" name="cj" value="20:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Abierto Viernes</label>
                        <input type="time" name="av" value="09:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Cerrado</label>
                        <input type="time" name="cv" value="20:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Abierto Sabado</label>
                        <input type="time" name="as" value="09:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Cerrado</label>
                        <input type="time" name="cs" value="20:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Abierto Domingo</label>
                        <input type="time" name="ad" value="09:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>
                    <div class="input-field col s3">
                        <label class="fecha">Hora Cerrado</label>
                        <input type="time" name="cd" value="20:00:00" max="23:59:59" min="00:00:00" step="1">
                    </div>

                    <div class="input-field col s12">
                        {{ Form::submit('Registrar',array('class'=>'btn btn-primary'))}}
                    </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>

@endsection