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
            $data['cuentaLetras'] = array_count_values($data['letras']);
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
        $data['datosRecibidos'] = $_POST['notas'];
        if (isset($data['datosRecibidos'])) {
            $data['datosJson'] = $this->validateJsonAndTransformToArray($data['datosRecibidos']);
            if ($this->checkErrorsCalculoNotas($data['datosJson'])) {
                $data['_resultados'] = $this->manejoCalculoNotas($data['datosJson']);
                $data['_datos'] = $data['datosJson'];
            } else {
                $data['error'] = 'Error: El texto introducido debe esta en formato Json, y este debe tener la nota de los tres trimestres.';
            }
        }
        $this->view->showViews(array('templates/header.view.php', 'calculoNotas.view.php', 'templates/footer.view.php'), $data);
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


    private function manejoCalculoNotas(array $data) : array {
        $medias = [];
        $aprobados  = [];
        $suspensos = [];
        $notaMax = [];
        $notaMin = [];

        $resultados = [];
        foreach ($data as $asignatura => $alumnos) {
            foreach ($alumnos as $alumno => $notas) {
                foreach ($notas as $nota) {
                    $media = $this->doMedia($notas);
                    $medias = $media;

                    $alumnosAprobados = [];
                    $alumnosSuspensos = [];
                    if ($media >= 5) {
                        $alumnosAprobados[] = $alumno;

                    }else {
                        $alumnosSuspensos[] = $alumno;
                    }

                    $aprobados = count($alumnosAprobados);
                    $suspensos = count($alumnosSuspensos);


                    $max = max($notas);
                    $min = min($notas);


                    $alumnoNotaMax = array_search($max, $notas);
                    $alumnoNotaMin = array_search($min, $notas);

                    $notaMax = [
                        'alumno' => $alumnoNotaMax,
                        'nota' => $max
                    ];

                    $notaMin = [
                        'alumno' => $alumnoNotaMin,
                        'nota' => $min
                    ];
                }
            }

            $resultados[$asignatura] = [
                'media' => $medias,
                'aprobados' => $aprobados,
                'suspensos' => $suspensos,
                'nota maxima' => $notaMax,
                'nota minima' => $notaMin
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

    //Hacer checkErrorsNotasAlumnos

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

    public function validateFloat($float) : bool
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

    private function doMedia(array $array) : float {
        $media = array_sum($array) / count($array);
        return (float) number_format($media, 2);
    }
}
