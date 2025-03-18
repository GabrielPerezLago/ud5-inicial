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

    }

}