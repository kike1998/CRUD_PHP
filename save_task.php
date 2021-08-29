<?php

include('db.php');

if(isset($_POST['save_task'])) { 
  $nombre=$_POST['nombres'];
  $apellido=$_POST['apellidos'];
  $direccion=$_POST['direccion'];
  $telefono=$_POST['telefono']; 
  $puesto=$_POST['puesto'];
  $fecha=$_POST['fecha'];

  $query="INSERT INTO empleado(nombres, apellidos, direccion, telefono, fecha_nacimiento, id_puesto) VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$fecha', '$puesto')"; 
  $result=mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
