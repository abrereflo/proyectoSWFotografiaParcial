<div>
   <h4 class="mt-3">Lista de Mensajes</h4>
   @foreach ($mensajes as $mensaje)
      <li>{{$mensaje["usuario"]}})  - {{$mensaje["mensaje"] }}  </li>



   @endforeach
</div>
