<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Cassandra\Map;
use Com\Daw2\Core\BaseController;

class EjerciciosController extends BaseController
{
    /**
     * @return void
     * @throws \Exception
     * @EjercicioUno
     *
     * Recibe un nombre y muestra un texto con ese nombre.
     *
     */

    public function ejercicioUno()
    {
        $data = array(
            'titulo' => 'Ejercicio 1',
            'breadcrumb' => ['Inicio', 'Ejercicio 1']

        );
        $this->view->showViews(array('templates/header.view.php', 'ejercicioUno.view.php', 'templates/footer.view.php'), $data);
    }

    /**
     * @return void
     * @throws \Exception
     * @EjercicioDos
     *
     * Recoje dos numeros y tras limpiar el input para que solo permita numeros,
     * multiplica los dos numeros anteriormente recibidos.
     *
     * @Errores
     * Un queda por solucionar los errores de las variables numeroUno y numeroDos,
     * Estas se encuentran bacias al iniciar la pagina.
     *
     */

    public function ejercicioDos()
    {
        $data = array(
            'titulo' => 'Ejercicio 2',
            'breadcrumb' => ['Inicio', 'Ejercicio 2'],
            'numeroUno' => $_POST['numeroUno'],
            'numeroDos' => $_POST['numeroDos']
        );

        if (empty($_POST['numeroUno']) || empty($_POST['numeroDos'])) {
            $data['resultado'] = 'Inserte los dos numeros porfavor';
        } else {
            if (filter_var($data['numeroDos'], FILTER_VALIDATE_FLOAT) && filter_var($data['numeroDos'], FILTER_VALIDATE_FLOAT)) {
                $data['resultado'] = $data['numeroUno'] * $data['numeroDos'];
            } else {
                $data['resultado'] = 'Error: Parametros no validos , debe insertar numeros.';
            }
        }

        $this->view->showViews(array('templates/header.view.php', 'ejercicioDos.view.php', 'templates/footer.view.php'), $data);
    }

    /**
     * @return void
     *
     * @EjercicioTres
     *
     * Recoje tres numeros y muestra el mayor.
     *
     */
    public function ejercicioTres()
    {
        $data = array(
            'titulo' => 'Ejercicio 3',
            'breadcrumb' => ['Inicio', 'Ejercicio 3'],
        );

        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['errors'] = $this->checkErrorsEjerecicioTres($_POST);
        if (empty($data['errors'])) {
            $data['resultado'] = max($_POST['numeroUno'], $_POST['numeroDos'], $_POST['numeroTres']);
        }
        $this->view->showViews(array('templates/header.view.php', 'ejercicioTres.view.php', 'templates/footer.view.php'), $data);
    }


    /**
     * @return array
     *
     * @CheckErrors
     *
     * Esta funcion se encarga de validar inputs
     * Esta funcion solo funciona para el ejercicio 3 , donde se dedica a validar los inputs
     *
     *
     * if(!isset($data['numeroUno']) || $data['numeroUno'] === '') {
     * $errors['numeroUno'] = 'Inserte el numero porfavor';
     * }elseif (filter_var($data['numeroUno'], FILTER_VALIDATE_FLOAT) === false) {
     * $errors['numeroUno'] = 'El valor introducido debe de ser un numero';
     * }
     *
     * if(!isset($data['numeroDos']) || $data['numeroDos'] === '') {
     * $errors['numeroDos'] = 'Inserte el numero porfavor';
     * }  elseif (filter_var($data['numeroDos'], FILTER_VALIDATE_FLOAT) === false) {
     * $errors['numeroDos'] = 'El valor introducido debe de ser un numero';
     * }
     *
     * if(!isset($data['numeroTres']) || $data['numeroTres'] === '') {
     * $errors['numeroTres'] = 'Inserte el numero porfavor';
     * }elseif (filter_var($data['numeroTres'], FILTER_VALIDATE_FLOAT) === false) {
     * $errors['numeroTres']= 'El valor introducido debe de ser un numero';
     * }
     */
    private function checkErrorsEjerecicioTres(array $data): array
    {
        $errors = [];
        // Pronbar con hacer un array con los tres datas **Numeros para que no recorra el resto del array data que tiene texto.8

        foreach ($data as $key => $input) {
            if (!isset($input) || $input === '') {
                $errors[$key] = 'Inserte un número por favor';
            } elseif (filter_var($input, FILTER_VALIDATE_FLOAT) === false) {
                $errors[$key] = 'El valor introducido debe ser un número';
            }
        }


        return $errors;
    }

    /******                                 Ejercicio 4                               *******/
    /**
     * @EjerecicioCuatro
     *
     * Recibe una cadena de texto como entrada. **Listo
     * Depurarla, eliminando espacios en blanco y asegurándonos de que solo contenga letras.**Listo
     * Contar la cantidad de veces que aparece cada letra en la cadena.
     * Ordenar las letras según la cantidad de veces que aparecen, de mayor a menor.
     * Devolver el resultado ordenado.
     */

    /**
     * @return void
     *
     * @Vista
     * Esta funcion solo se usa para inciar la ruta.
     *
     */
    public function ejercicioCuatro()
    {
        $data = array(
            'titulo' => 'Ejercicio 4',
            'breadcrumb' => ['Inicio', 'Ejercicio 4']
        );

        $this->view->showViews(array('templates/header.view.php', 'ejercicioCuatro.view.php', 'templates/footer.view.php'), $data);
    }

    /**
     * @return void
     *
     * @Ejercicio
     * Esta funcion es la que ejecuta el metodo que se realizara en el ejercicio 4
     *
     *  Recibe una cadena de texto como entrada. **Listo
     *  Depurarla, eliminando espacios en blanco y asegurándonos de que solo contenga letras.**Listo
     *  Contar la cantidad de veces que aparece cada letra en la cadena. **Listo
     *  Ordenar las letras según la cantidad de veces que aparecen, de mayor a menor.
     *  Devolver el resultado ordenado.
     */

    public function doEjerecicioCuatro()
    {
        $data = array(
            'titulo' => 'Ejercicio 4',
            'breadcrumb' => ['Inicio' ,'Ejercicio 4']
        );
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['errors'] = $this->checkErrorsEjercicioCuatro($_POST);
        if ($data['errors'] === []) {
            // Limpiar el codigo , reducir la cantidad de este y hacerlo mas legible.


            $data['textoLimpio'] = str_replace(' ', '', $_POST['texto']);
            $data['letras'] = str_split($data['textoLimpio']);
//            $data['cuentaLetras'] = array_count_values($data['letras']);
            arsort($data['cuentaLetras']);
        }
        $this->view->showViews(array('templates/header.view.php', 'ejercicioCuatro.view.php', 'templates/footer.view.php'), $data);
    }

    /**
     * @param array $data
     * @return array
     *
     * @CeckErrorsCuatro
     *
     * Funcion que se encarga de comprobar y limpiar los errores
     * de la funcion doEjercicioCuatro
     *
     */

    private function checkErrorsEjercicioCuatro(array $data): array
    {
        $errors = [];

        if (!preg_match('/^[\p{L} ]+$/u', $data['texto'])) {
            $errors['texto'] = 'El texto no puede contener numeros ni caracteres especiales, inserte solo textos porfavor.';
        }

        return $errors;
    }


    /******                                 Ejrecicio nostas ALumnos                                 *******/

    /**
     * @return void
     * @NotasAlumnos
     *
     * Esta es la funcion que se encarga de la vista del ejercicio
     *
     */
    public function notasAlumnos()
    {
        $data = array(
            'titulo' => 'Notas Aulumnos',
            'breadcrumb' => ['Inicio', 'Notas Aulumnos']
        );

        $this->view->showViews(array('templates/header.view.php', 'notasAlumnos.view.php', 'templates/footer.view.php'), $data);
    }

    /**
     * @return void
     * @main
     * @DoNotasAlumnos
     *
     * Esta funcion es la que se encarga del manejo de
     * lo que vamos a realizar en este ejercicio
     *
     */
    public function doNotasAulumnos()
    {
        $data = array(
            'titulo' => 'Notas Alumnos',
            'breadcrumb' => ['Inicio', 'Notas Alumnos']
        );
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['datosRecibidos'] = $_POST['notas'];
        if (isset($data['datosRecibidos'])) {
            /**
             * La variable $datosJson es la que se encarga de almacenar el json validado y transformado en array
             */
            $data['datosJson'] = $this->validateJsonAndTransformToArray($data['datosRecibidos']);
            if ($data['datosJson'] && is_array($data['datosJson'])) {
                /**
                 * Estas dos variables son las que se encargan de almacenar todos los datos.
                 * Siendo que $_datos almacena el JSON puro y $_resultados almacena los datos de las medias etc...
                 *
                 */

                $data['_resultados'] = $this->manejoNotasAlumnos($data['datosJson']);
                $data['_datos'] = $data['datosJson'];
            } else {
                $data['error'] = 'Error: El texto introducido debe esta en formato Json.';
            }
        }
        $this->view->showViews(array('templates/header.view.php', 'notasAlumnos.view.php', 'templates/footer.view.php'), $data);
    }

    /**
     * @param array $data
     * @return array
     * @manejoCalculoNotas
     *
     * Esta funcion es la que se encarga de realizar las operaciones sobre el json que se le pase como parametro
     *
     */
    private function manejoNotasAlumnos(array $data): array
    {
        $medias  = [];
        $aprobados  = [];
        $suspensos = [];
        $notaMaxima = null;
        $notaMinima = null;

        // La variable resultados sera la encargada de almacenar los datos,
            // de la nota minima , maxima , las medias y los aprobados/suspensos de cada asignatura.
        $resultados = [];

        foreach ($data as $asignaturas => $notas) {

            /**  Nostas Medias */
            // Calcula las medias de las notas de cada asignatura.
            $media = array_sum($notas) / count($notas);
            $medias = $media;

            /** Aprobados y Suspensos */
            // Calcula la cantidad de aprobados y suspensos de cada asignatura.
            $alumnosAprobados = [];
            $alumnosSuspensos = [];
            foreach ($notas as $nota) {
                if ($nota >= 5) {
                    $alumnosAprobados[] = $nota;
                } else {
                    $alumnosSuspensos[] = $nota;
                }
                // Guarda las el número de suspensos y aprobados de cada asignartura
                $aprobados = count($alumnosAprobados);
                $suspensos = count($alumnosSuspensos);
            }

            /** Notas minimas y maximas */

            // Saca la nota minima y maxima de cada asignatura con el nombre del alumno que saco dicha nota.
            $max = max($notas);
            $min = min($notas);

            // En el array_search le estas diciendo que con la nota maxima o minima te saque la clave de la nota equivalente a esta.
            $alumnoNotaMax = array_search($max, $notas);
            $alumnoNotaMin = array_search($min, $notas);
            $notaMaxima = [
                'alumno' => $alumnoNotaMax,
                'nota' => $max
            ];

            $notaMinima = [
                'alumno' => $alumnoNotaMin,
                'nota' => $min
            ];

            // Esta es la variable $resultados almacenando los datos de todoas la operacions ya realizadas
            $resultados[$asignaturas] = [
                'media' => $medias,
                'aprobados' => $aprobados,
                'suspensos' => $suspensos,
                'nota maxima' => $notaMaxima,
                'nota minima' => $notaMinima
            ];
        }

        return $resultados;
    }

    /**
     * @param $data
     * @return array
     *
     * @validateJsonAndTransformToArray
     *
     * Esta funcion se encarga de usando las otras funcines de validacion y transformacion del json,
     * validar si el texto pasado esta en formato json y si es el caso este convertirlo en un array.
     *
     * Y valida si los alumnos son un String y si las notas son de tipo int
     */
    private function validateJsonAndTransformToArray($data): array
    {

        if ($this->validarJson($data) == true) {
            $datosJson = $this->transformJson($data);
            if ($datosJson) {
                return $datosJson;
            }
        }
        return [];
    }

    /********** Hacer checkErrorsNotasAlumnos *******/

    /**
     * @param $data
     * @return bool
     * @validarJson
     * Esta funcion valida que el parametro recibido este en formato json
     *
     */
    private function validarJson($data): bool
    {
        json_decode($data);
        return json_last_error() === JSON_ERROR_NONE;
    }



    /**
     * @param $data
     * @return array
     * @transformJson
     *
     * Esta funcion transforma un texto en formato Json en un array
     *
     */
    private function transformJson($data): array
    {
        return json_decode($data, true);
    }


    /**
     * @param $string
     * @return bool
     *
     * Valida Strings
     */
    private function validateString($string): bool
    {
        if (isset($string) && trim($string) !== '') {
            return true;
        }
        return false;
    }

    /**
     * @param $int
     * @return bool
     *
     * valida numeros tipo int
     */
    private function validateInt($int): bool
    {

        if (isset($int) && is_int($int)) {
            if ($int >= 0 && $int <= 10) {
                return true;
            }
        }
        return false;
    }




    /* * * * * * * * * * * * * * * * * CALCULO NOTAS * * * * * * * * * * * * * * * * * * * * */


    public function calculoNotas()
    {
        $data = array(
            'titulo' => 'Calculo Notas',
            'breadcrumb' => ['Inicio', 'Calculo Notas']
        );

        $this->view->showViews(array('templates/header.view.php', 'calculoNotas.view.php', 'templates/footer.view.php'), $data);
    }

    public function doCalculoNotas()
    {
        $data = array(
            'titulo' => 'Calculo Notas',
            'breadcrumb' => ['Inicio', 'Calculo Notas']
        );
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $data['datosRecibidos'] = $_POST['notas']  ?? '';
        if (isset($data['datosRecibidos'])) {
            $data['datosJson'] = $this->validateJsonAndTransformToArray($data['datosRecibidos']);
                $results = $this->manejoCalculoNotas($data['datosJson']);
                if (isset($results['errores']) && $results['errores'] !== [] ) {
                    $data['errors'] = $results['errores'];
                } else {
                    $data['_resultados'] = $results['resultados'];
                }
            } else {
                $data['error'] = 'Error: El texto introducido debe esta en formato Json, y este debe tener la nota de los tres trimestres.';
            }

        $this->view->showViews(array('templates/header.view.php', 'calculoNotas.view.php', 'templates/footer.view.php'), $data);
    }

    private function manejoCalculoNotas(array $data) : array {
        $resultados = []; //Variable que guarda los datos
        $medias = [];
        $maxNotas = [];
        $minNotas = [];

        $errors = [];
        foreach($data as $asignatura => $alumnos){

            $aprobados = 0;
            $suspensos = 0;
            $mediaForAlumnoArr = [];
            foreach ($alumnos as $alumno => $notas) {

                if(is_array($notas) && !empty($notas) || !$notas === [] ) {
                    //Medias de cada Asignartura
                    $media = $this->doMedia($notas);
                    $mediaForAlumnoArr[$alumno] = $media;
                    $mediasAlumnos = $this->doMedia($mediaForAlumnoArr);
                    $medias = $mediasAlumnos;
                }else {
                    $media = null;
                }

                // Numero de aprobados y suspensos;
                if ($media >= 5) {
                    $aprobados++;
                } else {
                    $suspensos++;
                }

                //Notas minimas y maximas;
                $max = is_array($mediaForAlumnoArr) && !$mediaForAlumnoArr ==  [] ? max($mediaForAlumnoArr) : null;
                $min = is_array($mediaForAlumnoArr) && !$mediaForAlumnoArr == []  ? min($mediaForAlumnoArr) : null;

                $alumnoNotaMax = array_search($max, $mediaForAlumnoArr);
                $alumnoNotaMin = array_search($min, $mediaForAlumnoArr);


                $maxNotas = [
                    'alumno' => $alumnoNotaMax,
                    'nota' => $max
                ];

                $minNotas = [
                    'alumno' => $alumnoNotaMin,
                    'nota' => $min
                ];

                if(!is_string($asignatura) || !$this->validateString($asignatura) || is_numeric($asignatura) ){
                    $errors['asignatura'][$asignatura] = "Error: La asignatura " . $asignatura . " no puede estar vacia y debe de ser un campo de texto.";
                }else {
                    if (!$this->validateString($alumno)) {
                        $errors['alumno'][$alumno] = "Error: El alumno " . $alumno . " no puede estar vacio y debe de ser un campo de texto.";
                    }
                    if (!is_array($notas) || $notas === []) {
                        $errors['notas'][$alumno] = "Error: las notas del alumno " . $alumno . " no pueden estar vacias.";
                    }
                    if (empty($medias) || $medias === []) {
                        $errors['media'][$asignatura] = "Error: Ha ocurrido un error al realizar el calculo de la media de la asignatura.";
                    }

                    if(!isset($aprobados) || $aprobados === null){
                        $errors['aprobados'] = "Error: Ha ocurrido un error al realizar el conteo de alumnos aprobados";
                    } else if (isset($suspensos) && $suspensos === null) {
                        $errors['suspensos'] = "Error: Ha ocurrido un error al realizar el conteo de alumnos suspensos";
                    }

                    if(!$max || $max === null || !$this->validateFloat($max)){
                        $errors['maxNotas'][$asignatura]= "Error: Ha ocurrido un error en la busqueda de la nota maxima de la asignatura " . $asignatura . ".";
                    }

                    if(!$min || $min === null || !$this->validateFloat($min))  {
                        $errors['minNotas'][$asignatura] = "Error: Ha ocurrido un error en la busqueda de la nota minima de la asignatura " . $asignatura . ".";
                    }
                    if(!$alumnoNotaMax || $alumnoNotaMax === null || !$this->validateString($alumnoNotaMax)){
                        $errors['alumnoNotaMax'][$alumno] = "Error: Ha ocurrido un error en la busqueda de la nota maxima del alumno " . $alumno . " la asignatura.";
                    }

                    if (!$alumnoNotaMin || $alumnoNotaMin === null || !$this->validateString($alumnoNotaMin)){
                        $errors['alumnosNotaMin'] = "Error: Ha ocurrido un error en la busqueda de la nota minima del alumno " . $alumno . " la asignatura.";;
                    }

                }
            }


            if($errors === []) {
                $resultados[$asignatura] = [
                    'media' => $medias,
                    'aprobados' => $aprobados,
                    'suspensos' => $suspensos,
                    'nota maxima' => $maxNotas,
                    'nota minima' => $minNotas
                ];
            }

        }
        if(empty($data) || $data === []){
            $errors['array']['data'] = "Error: El Json esta vacío o peude que se le este pasando un numero entero como nombre de la asignatura";
        }

        if(!empty($errors) || !$errors === []){
            return ['errores' => $errors];
        }else{
            return ['resultados' => $resultados];
        }
    }

    private function checkErrorsCalculoNotas(array $data): bool
    {
        foreach ($data as $asignatura => $alumnos) {
            if (!is_array($alumnos) || !$this->validateString($asignatura)) {
                return false;
            }
            foreach ($alumnos as $alumno => $notas) {
                if (!$this->validateString($alumno)) {
                    return false;
                }
                foreach ($notas as $nota) {
                    if(!is_array($notas) || $notas === []) {
                        return false;
                    }
                    if (!$this->validateFloat($nota)) {
                        return false;
                    }
                }
            }

        }
        return true;
    }

    private function validateFloat($float) : bool
    {
        if(isset($float) && is_numeric($float)) {
            if(filter_var($float, FILTER_VALIDATE_FLOAT)) {
                if($float >= 0 && $float <= 10) {
                    return true;
                }
            }
        }
        return false;
    }

    private function doMedia(array $array) : float {
        $media = array_sum($array) / count($array);
        return (float) number_format($media, 2);
    }

    /********************************** Pedidos Clientes ***********************************/

    public function pedidosClientes()
    {
        $data = array(
            'titulo' => 'Pedidos y Clientes',
            'breadcrumb' => ['Inicio', 'Pedidos y Clientes']
        );

        $this->view->showViews(array('templates/header.view.php', 'pedidosClientes.view.php', 'templates/footer.view.php'), $data);
    }

    /**
     * @return View
     */
    public function doPedidosClientes()
    {
        $data = array(
            'titulo' => 'Pedidos y Clientes',
            'breadcrumb' => ['Inicio', 'Pedidos Y Clientes']
        );

        //Procesamienteo de datos
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $data['inputPedidos'] = $_POST['pedidos'] ?? '';
        $data['inputClientes'] = $_POST['clientes'] ?? '';

        $data['pedidosJson'] = $this->validateJsonAndTransformToArray($data['inputPedidos']);
        $data['clientesJson'] = $this->validateJsonAndTransformToArray($data['inputClientes']);

        if (($data['pedidosJson'] && is_array($data['pedidosJson'])) && ($data['clientesJson'] && is_array($data['clientesJson']))) {
            $_results = $this-> manejoPedidosClientes($data['pedidosJson'], $data['clientesJson']);
            $data['_resultados'] = $_results;
        }else {
            $data['_errores'] = 'Error: Alguno de los registros no an sido insertados correctamente';
        }


        $this->view->showViews(array('templates/header.view.php', 'pedidosClientes.view.php', 'templates/footer.view.php'), $data);
    }

    private function manejoPedidosClientes(array $pedidos, array $clientes) : array
    {
        //Guardado de los resultados en $resultados
        $resultados = [];

        //Manejadores de datos
        $pedidosPorCliente = [];
        $contar_articulos = [];
        $clientesProcesados = [];
        $calculoCuantias = [];
        $totalGastado = [];
        $clientesMasGasto = [];
        foreach ($pedidos as $pedido) {
            $pedidosPorCliente = $this->contarColumnasArray($pedidos, 'codigo_cliente');
            $codigoPedido = $pedido['codigo_pedido'];
            $nombreCliente = $pedido['nombre_cliente'];
            $codigoCliente = $pedido['codigo_cliente'];

            if(isset($pedido['articulos']) && is_array($pedido['articulos'])){
                foreach ($pedido['articulos'] as $articulo) {
                    $codigoArticulo = $articulo['codigo_producto'];
                    $cantidadVendida = $articulo['cantidad'];
                    $proveedor = $articulo['proveedor'];
                    $nombreProducto = $articulo['nombre'];

                    if (!isset($contar_articulos[$codigoArticulo])) {
                        $contar_articulos[$codigoArticulo] = [
                            'cantidad' => 0,
                            'proveedor' => $proveedor,
                            'nombre' => $nombreProducto
                        ];
                    }
                    $contar_articulos[$codigoArticulo]['cantidad'] += $cantidadVendida;

                }
                $calculoCuantias[$codigoPedido] =[
                    'nombre_cliente' => $nombreCliente,
                    'cuantia' => $this->calcularCuantia($pedido['articulos'], 'precio_unidad', 'cantidad')
                ];
                if(!isset($totalGastado[$pedido['codigo_cliente']])){
                    $totalGastado[$pedido['codigo_cliente']] = 0;
                }
                $totalGastado[$codigoCliente] += $this->calcularCuantia($pedido['articulos'], 'precio_unidad', 'cantidad');
                foreach ($pedidosPorCliente as $pClave => $pValor) {
                    foreach ($totalGastado as $tClave => $tValor){
                        if($pClave == $codigoCliente && $tClave == $codigoCliente){
                            $clientesMasGasto[$codigoCliente] = [
                                'nombre_cliente' => $nombreCliente,
                                'numero_pedidos' => $pValor,
                                'total_gastado' => $tValor
                            ];
                        }
                    }
                }
            }
        }
        $datosFiltrados = $this->filtrarDatos($contar_articulos, true, 10);
        $pedidosMasCuantia = $this->filtrarDatos($calculoCuantias, false, 0, 'cuantia');
        $clientesFiltrados = $this->filtrarDatos($clientesMasGasto, true, 15, 'total_gastado');

        foreach ($clientes as $cliente) {
            foreach ($pedidosPorCliente as $idCliente => $contador) {
                if($idCliente == $cliente['codigo_cliente']) {
                    if($contador >= 1){
                        $clientesProcesados['con_pedidos'][] = [
                            'codigo_cliente' => $cliente['codigo_cliente'],
                            'nombre_cliente' => $cliente['nombre_cliente']
                        ];
                    }else {
                        $clientesProcesados['sin_pedidos'][] = [
                            'codigo_cliente' => $cliente['codigo_cliente'],
                            'nombre_cliente' => $cliente['nombre_cliente']
                        ];
                    }
                }
            }
        }

        $resultados = [
            'clientes' => $clientesProcesados,
            'mas_vendidos' => $datosFiltrados,
            'cuantias' => $calculoCuantias,
            'pedidos_mas_cuantia' => $pedidosMasCuantia,
            'clientes_mas_gastos' => $clientesFiltrados
        ];

        return $resultados;
    }

    private function checkErrorsPedidosClientes(array $arrPedidos, array $arrClietes): array {
        $errors = [];

        foreach ($arrPedidos as $posicion => $pedidos){
            foreach ($pedidos as $clave => $pedido) {
                if(empty($arrClietes) || $arrClietes === []){
                    $errors[$posicion] = "";
                }
            }
        }

        foreach ($arrClietes as $posicion => $clientes){
            foreach ($clientes as $clave => $cliente){

            }
        }


        return $errors;
    }


    /**
     * @param array $array
     * @param String $columna
     * @return array
     * Funcion que recibe un array bidimensional y cuenta los valores de la columna especificada
     */
    private function contarColumnasArray(array $array, String $columna): array
    {
        return array_count_values(array_column($array, $columna));
    }

    /**
     * @param array $array
     * @param bool $limitar
     * @param Int $limitador
     * @param String|null $ordenacion
     * @return array
     * Esta funcion se encarga de filtrar los datos de un array -- $array --
     * Si se desea limitar el array se le pasa como parametro true -- $limitar --
     * Si se desea limitar el array a un numero de elementos se le pasa como parametro -- $limitador --
     * Si el array es bidimensiol se le pasa la columa por la que se quiere ordenar -- $ordenacion --
     * esta funcion debuelve el arrayordenado y si se le ha pasado un limitador saca el numero de parametros que se indican
     */
    private function filtrarDatos(array $array, bool $limitar,Int $limitador = 0, String $ordenacion = null) : array {
        $arraySimple = null;
        if (is_array(reset($array)) && $ordenacion !== null) {
            $arraySimple = $this->simplificarArray($array, $ordenacion);
            arsort($arraySimple);
        }else {
            arsort($array);
        }

        $resultados = [];

        foreach ($arraySimple ?? $array as $clave => $valor){
            if(!$limitar){
                if($arraySimple){
                    $resultados[$clave] = $array[$clave];
                }else {
                    $resultados[$clave] = $valor;
                }
            }else {
                if(count($resultados) < $limitador){
                    if($arraySimple){
                        $resultados[$clave] = $array[$clave];
                    }else {
                        $resultados[$clave] = $valor;
                    }
                }else {
                    return $resultados;
                }
            }
        }
        return $resultados;
    }

    /**
     * @param array $array
     * @param String $ordenacion
     * @return array
     * Esta funcion recibe un array bidimensional -- $array --
     * Y recibe la columna que se desea guardar -- $columna --
     * Y con esto simplifica el array guardando la clave y la columna seleccionada
     */
    private function simplificarArray(array $array, String $columna) : array{
        $arraySimple = [];
        foreach ($array as $clave => $valor) {
            if(is_array($valor)){
                $arraySimple[$clave] = $valor[$columna];
            }else {
                return $arraySimple = $array;
            }
        }
        return $arraySimple;
    }

    /**
     * @param array $array
     * @param String $precio
     * @param String $cantidad
     * @return float
     * Esta funcion se encarga de calcular la cuantia de los productos -- $array
     * Recibe tambien una columna de precio y una de cantidad -- $precio - $cantidad
     * Con todo eso calcula la cuantia total de ca pate del array
     */
    private function calcularCuantia(array $array, String $precio, String $cantidad) : float {
        $cuantias = [];
        foreach($array as $valor) {
            $precioUnidad = $valor[$precio];
            $catidadVentas = $valor[$cantidad];

            $cuantias[] = $precioUnidad * $catidadVentas;
        }
        return array_sum($cuantias);
    }


}