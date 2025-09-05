<?php
session_start();

require_once '../app/controllers/ControladorUsuarios.php';
require_once '../app/controllers/ControladorContactos.php';

$request_uri = $_SERVER['REQUEST_URI'];
$base_uri = '/contactos_app'; 

$request = str_replace($base_uri, '', $request_uri);
$request = strtok($request, '?');
$request = trim($request, '/');

switch ($request) {
    case '':
    case 'iniciar_sesion':
        $controladorUsuarios = new ControladorUsuarios();
        $controladorUsuarios->iniciarSesion();
        break;
    case 'registrar':
        $controladorUsuarios = new ControladorUsuarios();
        $controladorUsuarios->registrarUsuario();
        break;
    case 'cerrar_sesion':
        $controladorUsuarios = new ControladorUsuarios();
        $controladorUsuarios->cerrarSesion();
        break;
    case 'contactos':
        $controladorContactos = new ControladorContactos();
        $controladorContactos->listarContactos();
        break;
    case 'crear_contacto':
        $controladorContactos = new ControladorContactos();
        $controladorContactos->crearContacto();
        break;
    case 'editar_contacto':
        $controladorContactos = new ControladorContactos();
        $controladorContactos->editarContacto();
        break;
    case 'eliminar_contacto':
        $controladorContactos = new ControladorContactos();
        $controladorContactos->eliminarContacto();
        break;
}
?>