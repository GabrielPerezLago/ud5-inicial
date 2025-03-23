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
                    <h4>Validar cadena de texto</h4>
                    <br>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="alias">Inserte una cadena de texto :</label>
                                <input type="text" class="form-control" name="texto" id="alias" value="" />
                                <p class="small text-danger"><?php echo $errors['texto'] ??  '' ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12 text-right">
                            <input type="submit" value="Limpiar" name="enviar" class="btn btn-primary ml-2"/>
                        </div>
                    </div>
            </form>
            <?php
            if(!empty($cuentaLetras)){
                ?>
                <div class="col-12">
                    <div class="alert alert-success">
                       <?php foreach ($cuentaLetras as $key => $conteo){
                          echo $key . ' => ' . $conteo . '<br>';
                       }?>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="col-12">
                    <div class="alert alert-danger">
                        Error : algo a salido mal , vuelvelo a intentar mas tarde.
                    </div>
                </div>
            <?php
            }
                ?>
        </div>
    </div>