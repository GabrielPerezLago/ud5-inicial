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

            if(empty($error) && $datosRecibidos){
                ?>
                <div class="col-12">

                        <?php
                        // Recorrer el array con resultados
                        foreach ($_resultados as $asignatura => $datos) {

                        ?>
                            <table class="table table-bordered table-striped">
                            <thead>
                            <h3> <?php echo $asignatura ?> </h3>
                            <tr>
                        <th>Media</th>
                        <th>Aprobados</th>
                        <th>Suspensos</th>
                        <th>Alumno con Nota Máxima</th>
                        <th>Nota Máxima</th>
                        <th>Alumno con Nota Mínima</th>
                        <th>Nota Mínima</th>
                    </tr>
                  </thead>
                        <tbody>

                            <tr>
                            <td><?php echo $datos['media'] ?></td>
                            <td><?php echo $datos['aprobados']              ?></td>
                            <td><?php echo  $datos['suspensos']             ?></td>
                           <td><?php echo $datos['nota maxima']['alumno']   ?></td>
                            <td><?php echo $datos['nota maxima']['nota']    ?></td>
                            <td><?php echo $datos['nota minima']['alumno']  ?></td>
                            <td><?php echo $datos['nota minima']['nota']    ?></td>
                            </tr>

                            </tbody>
                    </table>
                        <?php
                        }
                        ?>

                </div>
            <?php

            }
            ?>
        </div>
    </div>