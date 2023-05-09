@extends('layouts.app', ['activePage' => 'fotos', 'titlePage' => 'FotoPerfil'])

@section('content')
    <!-- Clientes -->
    <section class="section">
        <div class="section-header">
            <div class="row">
                <h3 class="page__heading">Mi Perfil</h3>
                <div class="ml-5">
                    <form action="{{ route('fotoPerfiles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="file" name="imagen" id="" accept="image/*">
                                <br>
                                @error('file')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4">
                    @forelse ($fotoPerfilCliente as $fotoPerfilClientes)
                        <div class="card">
                            <div class="card-body">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset($fotoPerfilClientes->imagen) }}" class="card-img-fluid" alt="...">
                                    <div class="card-body">

                                    </div>
                                </div>

                            </div>
                        </div>

                    @empty
                        <h1>No tienes fotos</h1>
                    @endforelse
                </div>

            </div>
        </div>
    </section>
@endsection
