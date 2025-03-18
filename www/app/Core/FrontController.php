<?php

namespace Com\Daw2\Core;

use Com\Daw2\Controllers\EjerciciosController;
use Com\Daw2\Controllers\ErroresController;
use Com\Daw2\Controllers\InicioController;
use Steampixel\Route;

class FrontController
{
    public static function main(): void
    {

        Route::add(
            '/ejercicioUno',
            function () {
                $controller = new EjerciciosController();
                $controller->ejercicioUno();
            },
            'get'
        );

        Route::add(
          '/ejercicioUno',
          function () {
              $controller = new EjerciciosController();
              $controller->ejercicioUno();
          } ,
            'post'
        );



        Route::add(
            '/',
            function () {
                $controlador = new InicioController();
                $controlador->index();
            },
            'get'
        );

        Route::add(
            '/demo-proveedores',
            function () {
                $controlador = new InicioController();
                $controlador->demo();
            },
            'get'
        );

        Route::pathNotFound(
            function () {
                $controller = new ErroresController();
                $controller->error404();
            }
        );

        Route::methodNotAllowed(
            function () {
                $controller = new ErroresController();
                $controller->error405();
            }
        );
        Route::run($_ENV['host.folder']);
    }
}
