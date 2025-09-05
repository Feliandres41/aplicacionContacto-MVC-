<h1>Agregar Nuevo Contacto</h1>
<form action="/crear_contacto" method="POST">
    <label for="nombre_contacto"><strong>Nombre:</strong></label><br>
    <input type="text" id="nombre_contacto" name="nombre_contacto" required><br><br>
    <label for="telefono_contacto"><strong>Teléfono:</strong></label><br>
    <input type="tel" id="telefono_contacto" name="telefono_contacto"><br><br>
    <label for="email_contacto"><strong>Correo electrónico:</strong></label><br>
    <input type="email" id="email_contacto" name="email_contacto"><br><br>
    <button type="submit" name="crear_contacto">Guardar Contacto</button>
</form>
<br>
<a href="/contactos">Volver a la lista de contactos</a>

<?php
 if (isset($mensaje)){
    echo "<br><br>" . htmlspecialchars($mensaje);
}
?>