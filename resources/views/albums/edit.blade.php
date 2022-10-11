@extends('layouts.main',['activePage'=>'albumes','titlePage'=>'Editar Album'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('albums.update') }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            {{--Cabecera--}}
                            <div class="card-header card-header-rose">
                                <h4 class="card-title"> Edición</h4>
                            </div>
                            {{--Cuerpo de la tabla--}}
                            <div class="card-body">
                                <div class="row">
                                    <label for="cantidad_fotos" class="col-sm-2 col-form-label"> Editar Cantidad de Fotos </label>
                                    <div class="col-sm-7">
                                        <input type="number"
                                               class="form-control"
                                               name="cantidad_fotos"
                                               value="{{ old('cantidad_fotos',$album->cantidad_fotos) }}" autofocus>
                                        @if ($errors->has('cantidad_fotos'))
                                            <span class="error text-danger" for="input-cantidad_fotos">
                                                {{ $errors->first('cantidad_fotos') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{--File}}
                            <div class="row">
                                    <label for="file" class="col-sm-2 col-form-label"> Editar Fotos </label>
                                    <div class="col-sm-7">
                                        <input type="file"
                                               class="form-control"
                                               name="file"
                                               value="{{ old('file',$album->file) }}" autofocus>
                                        @if ($errors->has('file'))
                                            <span class="error text-danger" for="input-file">
                                                {{ $errors->first('file') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{--Botones--}}
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-rose"> Actualizar </button>
                                <a class="btn btn-rose" href="{{ route('albums.index') }}"> Cancelar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
