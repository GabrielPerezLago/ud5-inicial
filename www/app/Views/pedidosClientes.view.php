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
                    <h4>Gestion de Pedidos</h4>
                    <br>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="alias">Inserte el registro de <span style="color: red">Pedidos</span> en formato JSON</label>
                                <textarea name="pedidos" id="alias" class="form-control" > </textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="alias">Inserte el registro de <span style="color: red">Clientes</span> en formato JSON</label>
                                <textarea name="clientes" id="alias" class="form-control" > </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12 text-right">
                            <input type="submit" value="Procesar" name="enviar" class="btn btn-primary ml-2"/>
                        </div>
                    </div>
            </form>
            <?php
                if (!isset($_errores) || empty($_errores) && isset($pedidosJson) && !$pedidosJson == '') {
            ?>
                <div class="col">
                    <div class="row">
                        <?php
                        if(!isset($_resultados)){
                        $_resultados = '';
                        }else{
                            ?>
                            <div class="container">
                            <?php
                            foreach ($_resultados as $claveDatos => $datos) {
                                if($claveDatos == 'clientes') {
                                    foreach ($datos as $key => $clientes){
                                        if($key == 'con_pedidos') {
                            ?>
                        <div class="alert alert-success col-lg-12">
                            <h3 class="text-black">Clientes con al menos 1 pedido:</h3>
                            <?php

                                            foreach ($clientes as $cliente) {
                                                $codigo = $cliente['codigo_cliente'];
                                                $nombre = $cliente['nombre_cliente'];
                                                echo $codigo . ' : ' . $nombre . '<br>';
                                            }

                            ?>
                        </div>
                        <?php
                        }   else if($key == 'sin_pedidos') {
                        ?>
                        <div class="alert alert-danger col-lg-12">
                                            <h3 class="text-black">Clientes con al menos 1 pedido:</h3>
                                            <?php
                                            foreach ($clientes as $cliente) {
                                                $codigo = $cliente['codigo_cliente'];
                                                $nombre = $cliente['nombre_cliente'];
                                                echo $codigo. ' : ' . $nombre . '</br>';
                                            }
                            }
                            ?>
                        </div>
                                <?php
                                    }
                                }
                            }
                                ?>
                            </div>
                            <div class="alert alert-info col-lg-12">
                                <h3 class="text-black">¡Los 10 productos más vendidos!</h3>
                                <?php
                                foreach ($_resultados as $claveDatos => $datos) {
                                    if (is_array($datos) && $claveDatos == 'mas_vendidos') {
                                        foreach ($datos as $claveProducto => $datosProducto) {
                                            $nombre = $datosProducto['nombre'];
                                            $proveedor = $datosProducto['proveedor'];
                                            $cantidad = $datosProducto['cantidad'];
                                            echo $claveProducto . ' - ' . $nombre . ' - ' . $proveedor . ' - ' . $cantidad . '<br>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="alert alert-warning">
                                <h3>Pedidos con más Cuantia</h3>
                                <?php
                                foreach ($_resultados as $clave => $resultdo) {
                                    if ($clave == 'pedidos_mas_cuantia'){
                                        foreach ($resultdo as $clave => $pedidos) {
                                            $codigo = $clave;
                                            $nombreCliente = $pedidos['nombre_cliente'];
                                            $cuantia = $pedidos['cuantia'];
                                            echo $codigo . ' : ' . $nombreCliente . ' - ' . $cuantia . '€' . '<br>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="container">
                                <table class="table">
                                    <tr>
                                        <th>Codigo Cliente</th>
                                        <th>Nombre Cliente</th>
                                        <th>Total Pedidos</th>
                                        <th>Total Gastado</th>
                                    </tr>
                                    <?php
                                       foreach ($_resultados as $clave => $resultdo) {
                                           if ($clave == 'clientes_mas_gastos') {
                                               foreach ($resultdo as $claveCliete => $datosCLiente) {
                                                   $codigo = $claveCliete;
                                                   $nombre = $datosCLiente['nombre_cliente'];
                                                   $pedidos = $datosCLiente['numero_pedidos'];
                                                   $gastos = $datosCLiente['total_gastado'];
                                                   ?>
                                                   <tr>
                                                       <td><?php echo $codigo ?></td>
                                                       <td><?php echo $nombre ?></td>
                                                       <td><?php echo $pedidos ?></td>
                                                       <td><?php echo $gastos ?></td>
                                                   </tr>
                                                   <?php
                                                }
                                           }
                                       }
                                    ?>
                                </table>
                            </div>
                    </div>
                </div>


            <?php
                            }
                } else{

            ?>
                    <div class="col">
                        <div class="row">
                            <div class="alert alert-danger col-lg-12">
                                <?php echo $_errores ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>