<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*****************VISTAS*******************/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/validar', function () {
    return view('/');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/paquetes', function () {
    return view('paquetes');
});

Route::get('/ver-paquete/{idPaquete}', function ($idPaquete) {
	$paquete = array( "idPaquete" => $idPaquete);
    return view('verPaquete',$paquete);
});

Route::get('/galeria', function () {
    return view('galeria');
});

Route::get('/suscripcion', function () {
    return view('suscripcion');
});


Route::get('/proponerpaquete/{idPaquete}', function ($idPaquete) {
    $paquete = array( "idPaquete" => $idPaquete);
    return view('proponerpaquete',$paquete);
});



Route::get('/administrarPaquetes', function () {
    return view('administrarPaquetes');
});

Route::get('/administrarEventos', function () {
    return view('administrarEventos');
});

Route::get('/editar-paquete/{idPaquete}', function ($idPaquete) {
	$paquete = array( "idPaquete" => $idPaquete);
    return view('editarPaquete',$paquete);
});

Route::get('/agregar-paquete', function () {
    return view('agregarPaquete');
});

Route::get('/editarPaquete', function () {
    return view('paquetes');
});

Route::get('/guardarPaquete', function () {
    return view('paquetes');
});

Route::get('/misEventos/{idUsuario}', function ($idUsuario) {
    $usuario = array( "idUsuario" => $idUsuario);
    return view('misEventos', $usuario);
});

Route::get('/guardarEvento', function () {
    return view('paquetes');
});

/*****************************************/

/**************CONTROLADORES**************/

Route::post('/validar', 'UsuariosController@datosUsuario');

Route::get('/logout', 'UsuariosController@logout');

Route::post('/editarPaquete', 'PaquetesController@editarPaquete');

Route::post('/guardarPaquete', 'PaquetesController@guardarPaquete');

Route::post('/guardarEvento', 'EventosController@guardarEvento');

Route::get('/modificar-evento/{idEvento}/{estado}', 'EventosController@modificar');

/*****************************************/
