<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM consulta WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $mot_consul = $row['mot_consul'];
        $fec_regis = $row['fec_regis'];
        $observaciones = $row['observaciones'];
        $tratamientos = $row['tratamientos'];
        $diagnostic = $row['diagnostic'];
        $sugerencias = $row['sugerencias'];

    }
}
if (isset($_POST['modificar'])) {
    $id = $_GET['id'];
    $mot_consul = $_POST['mot_consul'];
    $fec_regis = $_POST['fec_regis'];
    $observaciones = $_POST['observaciones'];
    $tratamientos = $_POST['tratamientos'];
    $diagnostic = $_POST['diagnostic'];
    $sugerencias = $_POST['sugerencias'];
   

    $query = "UPDATE consulta set mot_consul = '$mot_consul', fec_regis = '$fec_regis', observaciones = '$observaciones',
     tratamientos = '$tratamientos', diagnostic = '$diagnostic', sugerencias = '$sugerencias' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'ACTUALIZADO';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}

?>
<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card-body">
                <form action="" class="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="mot_consul" value="<?php echo $mot_consul; ?>" class="form-control"
                            placeholder="Modificar">
                    </div>
                    <div class="form-group">
                        <textarea name="fec_regis" rows="3"><?php echo $fec_regis; ?></textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="observaciones" rows="3"><?php echo $observaciones; ?></textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="tratamientos" rows="3"><?php echo $tratamientos; ?></textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="diagnostic" rows="3"><?php echo $diagnostic; ?></textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="sugerencias" rows="3"><?php echo $sugerencias; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="modificar">
                        Modificar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>