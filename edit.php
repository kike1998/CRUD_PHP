<?php
include("db.php");
$nombre= '';  
$apellido= '';
$direccion= '';
$telefono= ''; 
$puesto= '';
$fecha= '';

if  (isset($_GET['id_empleados'])) {
  $id_empleados = $_GET['id_empleados'];
  $query = "SELECT * FROM empleado WHERE id_empleados=$id_empleados";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre=$row['nombres'];  
    $apellido=$row['apellidos'];
    $direccion=$row['direccion'];
    $telefono=$row['telefono']; 
    $fecha=$row['fecha_nacimiento'];
    $puesto=$row['id_puesto'];
  }
}

if (isset($_POST['update'])) {
  $id_empleados = $_GET['id_empleados'];
  $nombre=$_POST['nombres'];  
  $apellido=$_POST['apellidos'];
  $direccion=$_POST['direccion'];
  $telefono=$_POST['telefono']; 
  $fecha=$_POST['fecha_nacimiento'];
  $puesto=$_POST['id_puesto'];
  $query = "UPDATE empleado set nombres = '$nombre', apellidos = '$apellido', direccion = '$direccion', telefono = '$telefono',  fecha_nacimiento= '$fecha', id_puesto = '$puesto' WHERE id_empleados=$id_empleados";  

  mysqli_query($conn, $query);
  $_SESSION['message'] = 'El registro fue actualizado correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
} 

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id_empleados=<?php echo $_GET['id_empleados']; ?>" method="POST">
        <div class="form-group">
        <p>
            <input type="text" name="nombres" class="form-control" placeholder="Nombre" autofocus>
        </p>
        <p>
            <input type="text" name="apellidos" class="form-control" placeholder="Apellido" autofocus>
        </p>
        <p>
            <input type="text" name="direccion" class="form-control" placeholder="Dirección" autofocus>
        </p>
        <p>
            <input type="text" name="telefono" class="form-control" placeholder="Teléfono" autofocus>
        </p>
        <p>
            <select class="form-control" name="id_puesto" placeholder="Puesto" autofocus>
              <option value=0>--- Puesto ---</option>
                <?php
                    $query = "SELECT id_puesto as id , puesto FROM puesto";
                    $result_usuario = mysqli_query($conn, $query);
                    while($fila = $result_usuario->fetch_assoc()){
                        echo "<option value=".$fila['id'].">".$fila['puesto']."</option>";
                    }
                ?>
            </select>
        </p>
        <p>
            <input type="date" name="fecha_nacimiento" class="form-control" placeholder="fecha_nacimiento" autofocus>
        </p>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>