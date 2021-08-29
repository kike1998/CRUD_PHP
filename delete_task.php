<?php
    include('db.php');

    if (isset($_GET['id_empleados'])) {
        $id = $_GET['id_empleados'];
        $query = "DELETE FROM empleado WHERE id_empleados = $id"; 
        $result = mysqli_query($conn, $query);


        if (!$result) {

            die("Fail");
        }

        $_SESSION['message'] = 'Los datos se eliminaron satisfactoriamente.';
        $_SESSION['message_type'] = 'danger'; 
        header('Location: index.php');  
    }

?>

