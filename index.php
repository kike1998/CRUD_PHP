<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
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
              <select class="form-control" name="puesto" placeholder="Puesto" autofocus>
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
              <input type="date" name="fecha" class="form-control" placeholder="Fecha_Nacimiento" autofocus>
          </p>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Puesto</th>
            <th>Fecha de Nacimiento</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM empleado";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td> <?php echo $row['nombres']; ?> </td>
          <td> <?php echo $row['apellidos']; ?> </td>
          <td> <?php echo $row['direccion']; ?> </td>
          <td> <?php echo $row['telefono']; ?> </td>
          <td> <?php echo $row['id_puesto']; ?> </td>
          <td> <?php echo $row['fecha_nacimiento']; ?> </td>
            <td>
              <a href="edit.php?id_empleados=<?php echo $row['id_empleados']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id_empleados=<?php echo $row['id_empleados']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
