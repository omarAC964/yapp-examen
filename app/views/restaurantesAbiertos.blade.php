@extends('layouts.principal')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row btr">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('restaurant.create')}}"> <i class="material-icons right">input</i>Agregar Restaurant</a>
                <a class="btn btn-primary" href="{{url('abiertos')}}"> <i class="material-icons right">schedule</i> Restaurantes Abiertos</a>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="jumbotron">
            <div class="row">
                <div class="col s12">

                    <table class="table table-striped">

                        <tr>

                            <th>Nombre</th>
                            <th>Diereccion</th>
                            <th>Telefono</th>


                            <th width="370px">Acciones</th>
                        </tr>

                        @foreach ($restaurantes as $key => $restaurant)

                            <tr>
                                <td>{{ $restaurant->nombre_restaurante }} </td>
                                <td>{{ $restaurant->direccion }}</td>
                                <td>{{ $restaurant->telefono }}</td>

                                <td>
                                    <a class="waves-effect waves-light btn light-blue" href="{{ route('restaurant.show',$restaurant->id) }}">Ver</a>


                                    <a class="waves-effect waves-light btn" href="{{ route('restaurant.edit',$restaurant->id) }}">Editar</a>


                                    {{ Form::open(['method' => 'DELETE','route' => ['restaurant.destroy', $restaurant->id],'style'=>'display:inline']) }}

                                    {{ Form::submit('Eliminar', ['class' => 'waves-effect waves-light btn red darken-3']) }}

                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection