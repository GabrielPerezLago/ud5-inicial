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
                    <h4>Inserte dos Numeros que serán multiplicados</h4>
                    <br>
                    <div class="row">
                        <div class="col-12 col-lg-1">
                            <div class="mb-3">
                                <!--<label for="alias"></label>-->
                                <input type="text" class="form-control" name="numeroUno" id="alias" value="" />
                            </div>
                        </div>
                        <p> * </p>
                        <div class="col-12 col-lg-1">
                            <div class="mb-3">
                                <!--<label for="alias"></label>-->
                                <input type="text" class="form-control" name="numeroDos" id="alias" value="" />
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
                            <input type="submit" value="Enviar" name="enviar" class="btn btn-primary ml-2"/>
                        </div>
                    </div>
            </form>
            <p><?php /*echo isset($_POST['numeroUno']) ? $resultado : 'Inserte dos numeros para hacer la operacion' */ echo $resultado?></p>
        </div>
    </div>