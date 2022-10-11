@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Bienvenido</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4"> 
                                <div class="card bg-c-red order-card">
                                <div class="card-blok">
                                 <h5>Eventos Registrados</h5>
                                 <h2 class="text-right"><i class="fa fa-bell f-left"></i><span></span></h2>
                                 <p class="m-b-0 text-right"><a href="/eventos" class="text-purple">Ver más</a></p>

                                </div> 
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> 

    </section>
@endsection

