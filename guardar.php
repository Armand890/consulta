<?php

include("db.php");

if (isset($_POST['Guardar_datos'])) {


    $mot_consul = $_POST['mot_consul'];
    $fec_regis = $_POST['fec_regis'];
    $observaciones = $_POST['observaciones'];
    $tratamientos = $_POST['tratamientos'];
    $diagnostic = $_POST['diagnostic'];
    $sugerencias = $_POST['sugerencias'];
    

    $query = "INSERT INTO consulta(mot_consul, fec_regis, observaciones, tratamientos, diagnostic, sugerencias) VALUES
('$mot_consul', '$fec_regis', '$observaciones', '$tratamientos', '$diagnostic', '$sugerencias')";

    $result = mysqli_query($conn, $query);

}

$_SESSION['message'] = 'GUARDADO CON EXITO';
$_SESSION['message_type'] = "success";

header("Location: index.php");

?>