@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Albumes Registrados</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('albums.store')}}" method="POST" enctype="multipart/form-data">
                                <!--@csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="price" type="number"
                                               class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                               name="price"
                                               tabindex="1" placeholder="Precio de la fotografía" value="{{ old('price') }}"
                                               autofocus>
                                    </div>
                                </div> 
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="file" name="file" id="" accept="image/*">
                                        <br>
                                        @error('file')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Subir Foto</button>
                                </div>-->
                            </form>
                        </div>
                    </div>
                </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="cardbody">
                <div class="row">
                @foreach($files as $file)
                <div  class="col-4">
                    <div class="card border-dark mb-3">
                        <img src="{{asset($file->file)}}" alt="" class="img-fluid"> 
                        <div class="card-footer">

                         <div class='card' style= 'width: 18rem'>
                         <!-- <img src="{{asset($file->file)}}" class='card-img-top' alt='...'> -->

                          <div class='card-body'>
                          <!--<h5 class='card-title'>Fotos</h5> -->
                <!-- <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                   
                            <form action="{{route('albums.destroy', $file->id)}}" class="d-inline" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                           </div>
                            </div>
                             <a class="btn btn-outline-info" href="{{route('albums.create')}}">Nuevo Album</a>

                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    {{$files->links()}}
                </div>
              </div>
                </div>
            </div>
        </div>
     </div>
 </div>
</section>
@endsection

