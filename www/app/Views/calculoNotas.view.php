<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <input type="hidden" name="order" value="1"/>
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $titulo ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h4>Calculo de las Notas de los Alumnos</h4>
                    <br>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="alias">Inserte los datos en formato JSON</label>
                                <textarea name="notas" id="alias" class="form-control" > </textarea>
                                <p class="small text-danger"><?php echo $error ?? '' ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12 text-right">
                            <input type="submit" value="Calcular" name="enviar" class="btn btn-primary ml-2"/>
                        </div>
                    </div>
            </form>
            <?php
            if (empty($error) && isset($datosRecibidos) && !$datosRecibidos == '') {
                if (isset($errors) && !empty($errors)) {
                    ?>
                    <div class="container">
                        <div class="row col-12">
                            <div class="alert alert-danger col-lg-12">
                                <?php
                                foreach ($errors as $error) {
                                    echo $error . '<br>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="container">
                        <div class="row col-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Media</th>
                                    <th>Aprobados</th>
                                    <th>Suspensos</th>
                                    <th>Alumno Nota Máxima</th>
                                    <th>Nota Máxima</th>
                                    <th>Alumno Nota Mínima</th>
                                    <th>Nota Mínima</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($_resultados as $asignatura => $resultados) { ?>
                                    <tr>
                                        <td><?php echo $asignatura; ?></td>
                                        <td><?php echo is_array($resultados['media']) ? implode(', ', $resultados['media']) : $resultados['media']; ?></td>
                                        <td><?php echo $resultados['aprobados']; ?></td>
                                        <td><?php echo $resultados['suspensos']; ?></td>
                                        <td><?php echo $resultados['nota maxima']['alumno']; ?></td>
                                        <td><?php echo is_array($resultados['nota maxima']['nota']) ? implode(', ', $resultados['nota maxima']['nota']) : $resultados['nota maxima']['nota']; ?></td>
                                        <td><?php echo $resultados['nota minima']['alumno']; ?></td>
                                        <td><?php echo is_array($resultados['nota minima']['nota']) ? implode(', ', $resultados['nota minima']['nota']) : $resultados['nota minima']['nota']; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>