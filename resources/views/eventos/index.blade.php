@extends('layouts.app', ['activePage' => 'eventos', 'titlePage' => 'Eventos'])

@section('content')
@section('css')
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Eventos Registrados</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                      {{--   <a class="btn btn-outline-info" href="{{route('eventos.index')}}">Nuevo Evento</a><br><br> --}}
                        <div class="table-responsive">

                            <table class="table table-striped mt-15 " id="table">
                                <thead style="background-color: #6777ef;">
                                    <!---->
                                    <!--<th style="display:none;">ID</th>-->
                                    <th class="text-center" style="color: #fff;">Nombre</th>
                                    <th class="text-center" style="color: #fff;">Descripcion</th>
                                    <th class="text-center" style="color: #fff;">Ubicacion</th>
                                    <th class="text-center" style="color: #fff;">Fecha</th>
                                    <th class="text-center" style="color: #fff;">Hora</th>
                                    <th class="text-center" style="color: #fff;">Precio</th>
                                    <th class="text-center" style="color: #fff;">Estado</th>
                                    <th class="text-center" style="color: #fff;">Código QR</th>
                                    <th class="text-center" style="color: #fff;"></th>

                                </thead>
                                <tbody>
                                    @foreach ($eventos as $evento)
                                    <tr>
                                       {{--  <td  class="text-center">
                                        <a href="{{route('productos.show', $producto->id)}}">{{$producto->codigo}} </a>
                                        </td> --}}
                                        <td  class="text-center">{{$evento->nombre}}</td>
                                        <td  class="text-center">{{$evento->descripcion}}</td>
                                        <td  class="text-center">{{$evento->ubicacion}}</td>
 
                                        <td  class="text-center">{{$evento->fecha}}</td>
                                        <td  class="text-center">{{$evento->hora}}</td>
                                        <td  class="text-center">{{$evento->precio}}</td>

                                        <td  class="text-center">
                                            @if($evento->estado== 'a')
                                            <div class="badge badge-pill badge-success">Activo</div>
                                            @else
                                            <div class="badge badge-pill badge-danger">De Baja</div>
                                            @endif
                                        </td>

                                        <td>
                                        <div class="img-container">
                                                    <img style="height: 170px; width: 147px;" src="{{asset($evento->code_qr)}}" alt="">
                                                </div>
                                        </td>

                                        <td>
                                        
                                        <a class="btn btn-info" href="{{ route('eventos.edit',$evento->id) }}">Editar</a>
                                        <form action="{{route('eventos.destroy', $evento->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" >Eliminar </button>
                                        </form>
                                        </td>
                                    </tr>
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
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@if (session('registrado') == 'ok')
<script>
    iziToast.success({
        title: 'SUCCESS',
        message: "Registro agregado exitosamente",
        position: 'topRight',
    });
</script>
@endif

<script type="application/javascript">
    function deleteItem(e) {
        let id = e.getAttribute('data-id');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger',
            },
            buttonsStyling: true
        });
        swalWithBootstrapButtons.fire({
            title: 'Esta seguro de que desea eliminar este registro?',
            text: "Este cambio no se puede revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'No, Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed) {
                    let id = e.getAttribute('data-id');
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route('fotografos.destroy', '') }}/' + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            if (data.success) {
                                swalWithBootstrapButtons.fire(
                                    'Eliminado!',
                                    'El registro ha sido eliminado.',
                                    "success",
                                ).then(function() {
                                    window.location = "productos";
                                });
                            }

                        }
                    });

                }

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'No se registro la eliminación',
                    'error'
                );
            }
        });

    }
</script>
<script>
    let
        ('.formulario-eliminar2').submit(function(e) {
            console.log()
            e.preventDefault();
            Swal.fire({
                title: 'Estas Seguro(a)?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, Eliminarlo!'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            })
        });
</script>
@section('page_js')
<script>
    $('#table').DataTable({
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningun dato disponible en esta tabla",
            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Ãšltimo",
                sNext: "Siguiente",
                sPrevious: "Anterior"
            },
            oAria: {
                sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente"
            }
        },
        columnDefs: [{
            orderable: false,
            targets: 6
        }]
    });
</script>


@endsection
@endsection
@section('css')

.tablecolor {
background-color: #212121;
}

@endsection
