<div>

    <div class="form-group">
        <label for="nombre">Nombre Evento</label>
        <input type="text" class="form-control" id="nombre" wire:model="nombre">
        <!--Llamamos a la var declarada en el controller de livewire-->
        <small>{{ $nombre }}</small>


    </div>

    <div class="form-group">
        <label for="mensaje">Descripcion del Evento</label>
        <input type="text" class="form-control" id="mensaje" wire:model="mensaje">
        <small>{{ $mensaje }}</small>


    </div>

    <button class="btn btn-info" wire:click="enviarmensaje">Sen the message!</button>

    {{-- Mensaje de Alerta --}}

    <div style="position: absolute;" class="alert alert-success collapse " role="alert" id= "avisoSuccess">Se envio correctamente</div>

    <script>
        $( document ).ready(function() {
            window.livewire.on('', function () {
                $("#avisoSuccess").fadeIn("slow");
                setTimeout(function(){ $("#avisoSuccess").fadeOut("slow"); }, 3000);
            });
        });

    </script>
</div>
