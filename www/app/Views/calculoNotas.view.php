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
            if (empty($error) && $datosRecibidos) {
                ?>
            <div class="container">
                <div class="row col-12">
                    <p class="alert-success"> <?php echo $validado ?> </p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>