@extends('layouts.base')

@section('contenedor')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-1">Usuarios Registrados</h2>
                <a class="btn mb-1" href="{{url('/Criptomoneda/Guardar')}}"style="background-color:#c56280">Agregar Criptomoneda</a>

                <table class="table table-bordered table-striped text-center">
                    <table border="1" cellpadding="0" cellspacing="0" width="100%" bgcolor="lightpink">

                        <thead style="background-color:#c56280">
                        <tr>
                            <th>Logotipo</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>Lenguaje</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody class="text-center">
                        @foreach($criptos as $cripto)
                            <tr>
                                <td> <img src="{{ asset('storage').'/'.$cripto->logotipo}}" alt="" height="100"></td>
                                <td>{{$cripto->nombre}}</td>
                                <td>Q. {{$cripto->precio}}</td>
                                <td>{{$cripto->descripcion}}</td>
                                <td>{{$cripto->lenguaje}}</td>
                                <td>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                {{ $criptos->links() }}

            </div>
        </div>
    </div>
@endsection
