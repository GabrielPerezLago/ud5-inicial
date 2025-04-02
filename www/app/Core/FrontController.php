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
         * @NotasAlumnos
         *
         * Rutas del ejercicio que notasAlumnos
         *
         */

        Route::add(
            '/notasALumnos',
            function() {
                $controller = new EjerciciosController();
                $controller->notasALumnos();
            },
        'get'
        );

        Route::add(
            '/notasALumnos',
            function (){
                $controller = new EjerciciosController();
                $controller->doNotasAulumnos();
            },
            'post'
        );

        /**
         * @CalculoNotas
         *
         * Estas son las rutas del ejercicio de calculo de notas
         */

        Route::add(
            '/calculoNotas',
            function (){
                $controller = new EjerciciosController();
                $controller->calculoNotas();
            },
            'get'
        );

        Route::add(
            '/calculoNotas',
            function (){
                $controller = new EjerciciosController();
                $controller->doCalculoNotas();
            },
            'post'
        );

        /**
         * @PedidosClientes
         * Aqui se invocan las rutasa del ejercicio PedidosClientes
         *
         */
         Route::add(
             '/pedidosClientes',
             function() {
                 $controller = new EjerciciosController();
                 $controller->pedidosClientes();
             },
             'get'
         );
         Route::add(
             '/pedidosClientes',
             function() {
                 $controller = new EjerciciosController();
                 $controller->doPedidosClientes();
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
