<?php include('db.php') ?>

<?php include("includes/header.php") ?> <!--para modificar encabezado-->
<div class="container-fluid">

    <div class="row">

        <div class="col-md-4 position-absolute top-20 start-20%">

            <?php if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="guardar.php" method="POST">


                    <div class="form-group">
                        <input type="text" name="mot_consul" class="form-control" placeholder="Motivo de consulta"
                            aotufocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fec_regis" class="form-control" placeholder="Fecha de registro de expediente" aotufocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="observaciones" class="form-control" placeholder="Observaciones" aotufocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="tratamientos" class="form-control" placeholder=" Tratamiento médico" aotufocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="diagnostic" class="form-control" placeholder="Diagnóstico" aotufocus>
                    </div>
                    <div class="form-group">

                        <input type="text" name="sugerencias" class="form-control" placeholder="Sugerencias" aotufocus>
                    </div>
                    <div class="form-group">

                       
                    <input type="submit" class="btn btn-success btn-block" name="Guardar_datos" value="Guardado">
                </form>
            </div>

        </div>
        <div class="col-md-10 position-absolute top-0 start-100">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Motivo de consulta</th>
                        <th>Fecha de registro de expediente</th>
                        <th>Observaciones</th>
                        <th>Tratamiento médico</th>
                        <th>Diagnóstico</th>
                        <th>Sugerencias</th>
                        <th>Acciones    </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM consulta";
                    $result_registros = mysqli_query($conn, $query);


                    while ($row = mysqli_fetch_array($result_registros)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['mot_consul'] ?>
                            </td>
                            <td>
                                <?php echo $row['fec_regis'] ?>
                            </td>
                            <td>
                                <?php echo $row['observaciones'] ?>
                            </td>
                            <td>
                                <?php echo $row['tratamientos'] ?>
                            </td>
                            <td>
                                <?php echo $row['diagnostic'] ?>
                            </td>
                            <td>
                                <?php echo $row['sugerencias'] ?>
                            </td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>


                        </tr>

                    <?php } ?>
                </tbody>
        </div>

    </div>

</div>

<?php include("includes/footer.php") ?>