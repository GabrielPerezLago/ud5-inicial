<?php
declare(strict_types=1);
namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class EjerciciosController extends BaseController
{
    public function ejercicioUno() {
        $data = array(
            'titulo' => 'Ejercicio 1',
            'breadcrumb' => ['Inicio', 'Ejercicio 1']

        );
        $this->view->showViews(array('templates/header.view.php', 'ejercicioUno.view.php', 'templates/footer.view.php'), $data);
    }

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

}