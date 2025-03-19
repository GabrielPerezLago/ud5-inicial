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
        $data['errors'] = $this->checkErrorsEjerecicio3($_POST);
        if (empty($data['errors'])) {
            $data['resultado'] = max($_POST['numeroUno'], $_POST['numeroDos'], $_POST['numeroTres']);
        }
        $this->view->showViews(array('templates/header.view.php', 'ejercicioTres.view.php', 'templates/footer.view.php'), $data);

    }

    /**
     * @return void
     *
     * @CheckErrors
     *
     * Esta funcion se encarga de validar inputs
     */
    private function checkErrorsEjerecicio3()
    {
        $errors = [];
        if(!isset($data['numeroUno']) || $data['numeroUno'] === '') {
            $errors['numeroUno'] = 'Inserte el numero porfavor';
        }elseif (filter_var($data['numeroUno'], FILTER_VALIDATE_FLOAT) === false) {
            $errors['numeroUno'] = 'El valor introducido debe de ser un numero';
        }

        if(!isset($data['numeroDos']) || $data['numeroDos'] === '') {
            $errors['numeroDos'] = 'Inserte el numero porfavor';
        }  elseif (filter_var($data['numeroDos'], FILTER_VALIDATE_FLOAT) === false) {
            $errors['numeroDos'] = 'El valor introducido debe de ser un numero';
        }

        if(!isset($data['numeroTres']) || $data['numeroTres'] === '') {
            $errors['numeroTres'] = 'Inserte el numero porfavor';
        }elseif (filter_var($data['numeroTres'], FILTER_VALIDATE_FLOAT) === false) {
            $errors['numeroTres']= 'El valor introducido debe de ser un numero';
        }

        return $errors;
    }

}