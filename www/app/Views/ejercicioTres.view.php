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
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <h4>El mayor de tres</h4>
                    <br>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="alias">Numero Uno:</label>
                                <input type="text" class="form-control" name="numeroUno" id="alias" value="" />
                                <p class="small text-danger"><?php echo $errors['numeroUno'] ?? '' ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="alias">Numero Dos:</label>
                                <input type="text" class="form-control" name="numeroDos" id="alias" value="" />
                                <p class="small text-danger"><?php echo $errors['numeroDos'] ?? '' ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="alias">Numero Tres:</label>
                                <input type="text" class="form-control" name="numeroTres" id="alias" value="" />
                                <p class="small text-danger"><?php echo $errors['numeroTres'] ?? '' ?></p>
                            </div>
                        </div>
                        <!--<div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="nombre_completo">Nombre completo:</label>
                                <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" value="" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label for="id_tipo">Tipo:</label>
                                <select name="id_tipo[]" id="id_tipo" class="form-control select2" data-placeholder="Tipo proveedor" multiple>
                                    <option value="">-</option>
                                    <option value="3" >Componentes móviles</option>
                                    <option value="4" >Componentes PC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="id_continente">Continente:</label>
                                <select name="id_continente" id="id_continente" class="form-control" data-placeholder="Continente">
                                    <option value="">-</option>
                                    <option value="1" >Europa</option>
                                    <option value="2" >Asia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="anho_fundacion">Año fundación:</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="min_anho" id="min_anho" value="" placeholder="Mí­nimo" />
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="max_anho" id="max_anho" value="" placeholder="Máximo" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    </div>
                    <div class="card-footer">
                        <div class="col-12 text-right">
                            <!--<a href="/proveedores" value="" name="reiniciar" class="btn btn-danger">Reiniciar filtros</a>-->
                            <input type="submit" value="Calcular" name="enviar" class="btn btn-primary ml-2"/>
                        </div>
                    </div>
            </form>
            <?php
                if(!empty($resultado)){
            ?>
            <div class="col-12">
                <div class="alert alert-success">
                    El numero mayor es : <?php echo $resultado ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>