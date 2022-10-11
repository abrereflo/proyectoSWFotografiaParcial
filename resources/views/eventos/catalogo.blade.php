<?php
  /*for($i=0; $i<=30; $i++){
      echo "<div class='card' style= 'width: 18rem'>
      <img src='...' class='card-img-top' alt='...'>
      <div class='card-body'>
        <h5 class='card-title'>Fotos $i</h5>
        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href='#' class='btn btn-primary'>Go somewhere</a>
      </div>
    </div>"
  ;}  */
  $db_hosting='127.0.0.1';
  $db_name = 'postgres';
  $db_pass = 'moira123';
  $db_database = 'db_fotografia';

  $con = postgres_connect($db_hosting, $db_name, $db_pass, $db_database);
  if(postgres_connect_errno()){
 echo 'No se pudo conectar a la base de datos: '.postgres_connect_error();
  }
  
?>