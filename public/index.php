<?php 

require_once __DIR__ . '/../includes/app.php';

//lamar al router y los Controladores
use MVC\Router;
use Controllers\LoginController;
use Controllers\AdminController;
$router = new Router();

//Seleccion de usuarios
$router->get('/', [LoginController::class, 'SelectUser']);

//Login de Admin
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
//Dashbord admin 
$router->get('/admin/dashbord', [AdminController::class, 'admin']);
$router->post('/admin/dashbord', [AdminController::class, 'admin']);

//logout
$router->get('/logout', [LoginController::class, 'logout']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();