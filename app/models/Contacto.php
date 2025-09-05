<?php
class Contacto {
    private $conexion;
    private $nombre_tabla = "contactos";
    public $id;
    public $usuario_id;
    public $nombre;
    public $email;
    public $telefono;
    public $fecha_creacion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function getContactos() {
        $consulta = "SELECT id, nombre, email, telefono, fecha_creacion FROM " . $this->nombre_tabla . " WHERE usuario_id = :usuario_id ORDER BY nombre ASC";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':usuario_id', $this->usuario_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactoById() {
        $consulta = "SELECT id, nombre, email, telefono FROM " . $this->nombre_tabla . " WHERE id = :id AND usuario_id = :usuario_id LIMIT 0,1";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':usuario_id', $this->usuario_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear() {
        $consulta = "INSERT INTO " . $this->nombre_tabla . "(usuario_id, nombre, telefono, email, fecha_creacion) VALUES (:usuario_id, :nombre, :telefono, :email, NOW())";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':usuario_id', $this->usuario_id);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':email', $this->email);
        return $stmt->execute();
    }
    
    public function actualizar() {
        $consulta = "UPDATE " . $this->nombre_tabla . " SET nombre = :nombre, telefono = :telefono, email = :email WHERE id = :id AND usuario_id = :usuario_id";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':usuario_id', $this->usuario_id);
        return $stmt->execute();
    }

    public function eliminar() {
        $consulta = "DELETE FROM " . $this->nombre_tabla . " WHERE id = :id AND usuario_id = :usuario_id";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':usuario_id', $this->usuario_id);
        return $stmt->execute();
    }
}
?>