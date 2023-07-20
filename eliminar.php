<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM consulta WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("fallo");
    }
    $_SESSION['message'] = 'Eliminado';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
}


?>