@extends('layouts.app', ['activePage' => 'fotos', 'titlePage' => 'FotoPerfil'])

@section('content')

<div class="row">
    <div class="col-lg-4">

            <div class="card">
                <div class="card-body">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/albums/1664936977-WhatsApp Image 2020-10-14 at 09.40.16 (1).jpeg') }}" class="card-img-fluid" alt="...">
                        <div class="card-body">
                            <p>Nombre evento</p>
                            <p>Fecha</p>

                        </div>
                    </div>

                </div>
            </div>


    </div>

</div>
@endsection
