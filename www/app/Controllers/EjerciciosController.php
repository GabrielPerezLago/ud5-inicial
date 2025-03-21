<?php
declare(strict_types=1);
namespace Com\Daw2\Controllers;

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

    public function ejercicioUno() {
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
        }else {
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
        if(empty($data['errors'])) {
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
    private function checkErrorsEjerecicioTres(array $data) : array
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
    public function ejercicioCuatro(){
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
     *  Contar la cantidad de veces que aparece cada letra en la cadena.
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
        if($data['errors'] === []){
//            $data['resultado'] = str_replace(' ', '' , $_POST['texto']);
//            $data['letras'] = str_split($data['resultado']);

            $data['resultados'] = str_split(str_replace(' ', '', $_POST['texto']));
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

    private function checkErrorsEjercicioCuatro(array $data) : array
    {
        $errors = [];

        if(!preg_match('/^[\p{L} ]+$/u', $data['texto'])) {
            $errors['texto'] = 'El texto no puede contener numeros ni caracteres especiales, inserte solo textos porfavor.';
        }

        return $errors;
    }


}