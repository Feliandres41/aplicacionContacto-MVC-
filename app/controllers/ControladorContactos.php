<?php
require_once __DIR__ . '/../models/Contacto.php';
require_once __DIR__ . '/../config/BaseDeDatos.php';
require_once __DIR__ . '/../models/Usuario.php';

class ControladorContactos {
    private $contacto;
    private $usuario;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: /iniciar_sesion");
            exit();
        }
        $baseDeDatos = new BaseDeDatos();
        $db = $baseDeDatos->getConexion();
        $this->contacto = new Contacto($db);
        $this->contacto->usuario_id = $_SESSION['usuario_id'];
        $this->usuario = new Usuario($db);
    }

    public function listarContactos() {
        $contactos = $this->contacto->getContactos();
        $this->usuario->id = $_SESSION['usuario_id'];
        $nombre_usuario = $this->usuario->getNombre();
        include __DIR__ . '/../views/contactos.php';
    }

    public function crearContacto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear_contacto'])) {
            $this->contacto->nombre = $_POST['nombre_contacto'];
            $this->contacto->telefono = $_POST['telefono_contacto'];
            $this->contacto->email = $_POST['email_contacto'];
            if (filter_var(($this->contacto->email), FILTER_VALIDATE_EMAIL)){
                if ($this->contacto->crear()) {
                    header("Location: /contactos");
                    exit();
                }else{
                    $mensaje = "Error al agregar el contacto";
                    include __DIR__ . '/../views/crear_contacto.php';
                }
            }else{
                $mensaje = "Correo ingresado invalido, ingrese un correo valido";
                include __DIR__ . '/../views/crear_contacto.php';
            }


        } else {
            include __DIR__ . '/../views/crear_contacto.php';
        }
    }
    
    public function editarContacto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar_contacto'])) {
            $this->contacto->id = $_POST['contacto_id'];
            $this->contacto->nombre = $_POST['nombre'];
            $this->contacto->telefono = $_POST['telefono'];
            $this->contacto->email = $_POST['email'];
            if ($this->contacto->actualizar()) {
                header("Location: /contactos");
                exit();
            } else {
                $error = "Error al actualizar el contacto.";
                $contacto_a_editar = $this->contacto->getContactoById();
                include __DIR__ . '/contactos';
            }
        } else {
            $this->contacto->id = $_POST['contacto_id'];
            $contacto_a_editar = $this->contacto->getContactoById();
            include __DIR__ . '/../views/editar_contacto.php';
        }
    }

    public function eliminarContacto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_contacto'])) {
            $this->contacto->id = $_POST['contacto_id'];
            if ($this->contacto->eliminar()) {
                header("Location: /contactos");
                exit();
            } else {
                $error = "Error al eliminar el contacto.";
                header("Location: /contactos");
                exit();
            }
        }
    }
}
?>