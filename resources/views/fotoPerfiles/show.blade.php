@extends('layouts.app', ['activePage' => 'fotos', 'titlePage' => 'FotoPerfil'])

@section('content')
    <div class="row">
        <div class="col-lg-4">
            @forelse ($fotoReconocida as $fotoReconocidas)
                <div class="card">
                    <div class="card-body">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset($fotoReconocidas->path_foto) }}"
                                class="card-img-fluid" alt="...">
                            <div class="card-body">
                                <p>Nombre evento: {{$fotoReconocidas->nombre}}</p>
                                <p>Fecha: {{$fotoReconocidas->fecha}}</p>

                            </div>
                        </div>

                    </div>
                </div>

            @empty
                <h1>NO hay fotos</h1>
            @endforelse


        </div>

    </div>
@endsection
