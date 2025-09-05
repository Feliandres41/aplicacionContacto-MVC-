<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/BaseDeDatos.php';

class ControladorUsuarios {
    private $usuario;

    public function __construct() {
        $baseDeDatos = new BaseDeDatos();
        $db = $baseDeDatos->getConexion();
        $this->usuario = new Usuario($db);
    }

    public function iniciarSesion() {
        if (isset($_SESSION['usuario_id'])) {
            header("Location: /contactos_app/contactos");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $this->usuario->email = $_POST['email_ini'];
            $this->usuario->password = $_POST['password_ini'];
            $usuario = $this->usuario->iniciarSesion();
            if ($usuario) {
                $_SESSION['usuario_id'] = $usuario['id'];
                header("Location: /contactos_app/contactos");
                exit();
            } else {
                $mensaje_error = "Credenciales incorrectas.";
                include __DIR__ . '/../views/iniciar_sesion.php';
            }
        } else {
            include __DIR__ . '/../views/iniciar_sesion.php';
        }
    }

    public function registrarUsuario() {
        $arroba = 0;
        $com = 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->nombre = $_POST['nombre'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->password = $_POST['password'];
            if (filter_var($this->usuario->email,FILTER_VALIDATE_EMAIL)){
                if ($this->usuario->existeEmail()) {
                $mensaje = "Este correo ya está registrado, ingrese otro nuevamente.";
                include __DIR__ . '/../views/registrar.php';
                } else {
                    if ($this->usuario->registrar()) {
                        $mensaje = "Nuevo registro creado exitosamente";
                        include __DIR__ . '/../views/iniciar_sesion.php';
                    } else {
                        $mensaje = "Error al crear el registro.";
                        include __DIR__ . '/../views/registrar.php';
                    }
                }
            }else{
                $mensaje = "Correo invalido, Ingrese un correo valido";
                include __DIR__ . '/../views/registrar.php';
            }
            // die(var_dump(value: $this->usuario->email));


            // if ($this->usuario->existeEmail()) {
            //     $mensaje = "Este correo ya está registrado, ingrese otro nuevamente.";
            //     include __DIR__ . '/../views/registrar.php';
            // } else {
            //     if ($this->usuario->registrar()) {
            //         $mensaje = "Nuevo registro creado exitosamente";
            //         include __DIR__ . '/../views/iniciar_sesion.php';
            //     } else {
            //         $mensaje = "Error al crear el registro.";
            //         include __DIR__ . '/../views/registrar.php';
            //     }
            // }
        } else {
            include __DIR__ . '/../views/registrar.php';
        }
    }

    public function cerrarSesion() {
        session_destroy();
        header("Location: /contactos_app/iniciar_sesion");
        exit();
    }
}
?>