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
        /**
         * @EjercicioUno
         *
         * Estas son las rutas del ejercicio 1
         *
         *  */
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

        /**
         * @EjercicioDos
         *
         * Estas son las rutas del ejercicio 2
         *
         */

        Route::add(
            '/ejercicioDos',
            function () {
                $controller = new EjerciciosController();
                $controller->ejercicioDos();
            },
            'get'
        );

        Route::add(
            '/ejercicioDos',
            function (){
                $controller = new EjerciciosController();
                $controller->ejercicioDos();
            },
            'post'
        );

        /**
         * @EjercicioTres
         *
         * Estas son las rutas del ejercicio 3
         *
         */

        Route::add(
            '/ejercicioTres',
            function (){
                $controller = new EjerciciosController();
                $controller->ejercicioTres();
            },
            'get'
        );

        Route::add(
            '/ejercicioTres',
            function (){
                $controller = new EjerciciosController();
                $controller->ejercicioTres();
            },
            'post'
        );

        /**
         * @EjercicioCuatro
         *
         * Estas son las rutas del ejerecicio 4
         *
         */

        Route::add(
            '/ejercicioCuatro',
            function (){
                $controller = new EjerciciosController();
                $controller->ejercicioCuatro();
            },
            'get'
        );

        Route::add(
            '/ejercicioCuatro',
            function (){
                $controller = new EjerciciosController();
                $controller->doEjerecicioCuatro();
            },
            'post'
        );




        /**
         * @ControladoresDefault
         */

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
