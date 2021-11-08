@extends('layouts.base')

@section('contenedor')
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            <!--Mensaje Flash -->
            @if(session('criptomonedaGuardada'))
                <div class="alert alert-success">
                    {{ session('criptomonedaGuardada') }}
                </div>
            @endif


        <!--validacion errores -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $errors)
                            <li>{{$errors}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <form action="{{url('/Criptomoneda/Guardar/Guardado')}}" method="POST" enctype="multipart/form-data">
                    @csrf{{csrf_field()}}

                    <div class="card-header text-center">AGREGAR CRIPTOMONEDA</div>

                    <div class="card-body">

                        <div class="row form-group">
                            <label for="" class="col-3">Logotipo:</label>
                            <div class="custom-file col-8 text-center">
                                <input type="file" name="logotipo" class="custom-file-input "  >
                                <label class="custom-file-label" for="inputGroupFile04" style="color:limegreen">Cargar Foto</label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-3">Nombre:</label>
                            <input type="text" name="nombre" class="form-control col-md-8">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-3">Precio en Q:</label>
                            <input type="text" name="precio" class="form-control col-md-8">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-3">Descripción:</label>
                            <input type="text" name="descripcion" class="form-control col-md-8">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-3">Lenguaje:</label>
                            <select name="lenguaje" class="form-control col-md-8" >
                                <option value="">--Seleccione un Lenguaje--</option>
                                @foreach( $lenguaje as $lenguajes)
                                    <option value="{{$lenguajes->id}}"> {{$lenguajes->lenguaje}}  </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-8 offset-3">Guardar</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>

    </div>

    <a class="btn btn-light btn-xs mt-5" href="{{ url('/') }}">&laquo volver</a>

    </div>

@endsection
