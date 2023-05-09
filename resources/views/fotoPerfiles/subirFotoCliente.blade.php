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
            <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="col-md-8">
                <div class="form-group">
                  <input type="file" name="imagen" id="" accept="image/*">
                  <br>
                  @error('file')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Subir Foto</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection