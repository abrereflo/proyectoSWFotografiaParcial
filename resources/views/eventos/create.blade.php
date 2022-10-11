@extends('layouts.app', ['activePage' => 'productos', 'titlePage' => 'Productos'])

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Nuevo Evento</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <br>
                        <form action="{{ route('eventos.store') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre<span class="required">*</span></label>
                                        <input type="text" class="form-control  @error('nombre') is-invalid @enderror" name="nombre" placeholder="Nombre del Evento...">
                                        @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion<span class="required">*</span></label>
                                        <input type="text" class="form-control  @error('descripcion') is-invalid @enderror" name="descripcion" placeholder="Descripcion del Evento...">
                                        @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ubicacion">Ubicacion<span class="required">*</span></label>
                                        <input type="text" class="form-control  @error('ubicacion') is-invalid @enderror" name="ubicacion" placeholder="Ubicacion del Evento...">
                                        @error('ubicacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha">Fecha<span class="required">*</span></label>
                                        <input type="date" class="form-control  @error('fecha') is-invalid @enderror" name="fecha" placeholder="Fecha del Evento...">
                                        @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hora">Hora<span class="required">*</span></label>
                                        <input type="time" class="form-control  @error('hora') is-invalid @enderror" name="hora" placeholder="Hora del Evento...">
                                        @error('hora')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio">Precio<span class="required">*</span></label>
                                        <input type="number" class="form-control  @error('precio') is-invalid @enderror" name="precio" placeholder="Precio del Evento...">
                                        @error('precio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="estado">Estado<span class="required">*</span></label>
                                        <div class="selectric-hide-select">
                                            <select name="estado" class="form-control selectric">
                                                <option value="a">Activo</option>
                                                <option value="b">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a class="btn btn-danger" href="{{route('eventos.index')}}">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection