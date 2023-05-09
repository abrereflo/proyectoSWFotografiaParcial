@extends('layouts.app', ['activePage'=>'fotos', 'titlePage'=>'FotoPerfil'])

@section('content')
<!-- Clientes -->
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Mi Perfil</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                     <form action="{{ route('fotoPerfiles.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('img/subirFoto.png')}}" class="card-img-fluid" alt="...">
                            <div class="card-body">
                                @csrf
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
                            </div>
                         </div> 
                      </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection