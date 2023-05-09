@extends('layouts.app', ['activePage' => 'fotografos', 'titlePage' => 'Fotografos'])



@section('content')
@section('css')
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Fotografos Registrados</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                     
                        <div class="table-responsive">

                            <table class="table table-striped mt-15 " id="table">
                                <thead style="background-color: #6777ef;">
                                    <!---->
                                    <!--<th style="display:none;">ID</th>-->
                                    <th class="text-center" style="color: #fff;">Nombre Completo</th>
                                    <th class="text-center" style="color: #fff;">CI</th>
                                    <th class="text-center" style="color: #fff;">Genero</th>
                                    <th class="text-center" style="color: #fff;">Celular</th>
                                    <th class="text-center" style="color: #fff;">Direccion</th>
                                    <th class="text-center" style="color: #fff;">Estado</th>
                                    <th class="text-center" style="color: #fff;"></th>

                                </thead>
                                <tbody>
                                    @foreach ($fotografos as $fotografo)
                                    <tr>
                                       {{--  <td  class="text-center">
                                            <a href="{{route('productos.show', $producto->id)}}">{{$producto->codigo}} </a>
                                        </td> --}}
                                        <td  class="text-center">{{$fotografo->persona->nombre}}  - {{$fotografo->persona->primer_apellido}}</td>
                                        <td  class="text-center">{{$fotografo->persona->ci}}</td>

                                        <td  class="text-center">
                                            @if($fotografo->persona->genero == 'm')
                                            <div class="badge badge-pill badge-success">Masculino</div>
                                            @else
                                            <div class="badge badge-pill badge-warning">Femenino</div>
                                            @endif
                                        </td>
                                        <td  class="text-center">{{$fotografo->persona->celular}}</td>
                                        <td  class="text-center">{{$fotografo->persona->direccion}}</td>

                                        <td  class="text-center">
                                            @if($fotografo->estado== 'b')
                                            <div class="badge badge-pill badge-danger">De Baja</div>
                                            @else
                                            <div class="badge badge-pill badge-success">Activo</div>
                                            @endif
                                        </td>

                                   <!--     <td  class="text-center">
                                            <div class="dropdown" style="position: absolute;">
                                                <a href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="{{ route('fotografos.edit', $fotografo->id) }}">Editar</a></li>
                                                    <li><a href="#" class="dropdown-item" data-id="{{ $fotografo->id }}" onclick="deleteItem(this)">Eliminar</a></li>
                                                </ul>

                                            </div>
                                        </td>
                                    </tr> -->
                                    <td>
                                    <form action="{{route('fotografos.destroy', $fotografo->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar </button>
                                    </form>
                                    </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

