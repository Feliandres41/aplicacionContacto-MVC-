<h1>Editar Contacto</h1>
<form action="/contactos_app/editar_contacto" method="POST">
    <input type="hidden" name="contacto_id" value="<?= htmlspecialchars($contacto_a_editar['id']); ?>" required>
    
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($contacto_a_editar['nombre']); ?>" required><br><br>
    
    <label for="telefono">Teléfono:</label><br>
    <input type="tel" id="telefono" name="telefono" value="<?= htmlspecialchars($contacto_a_editar['telefono']); ?>" required><br><br>
    
    <label for="email">Correo electrónico:</label><br>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($contacto_a_editar['email']); ?>" required><br><br>
    
    <button type="submit" name="actualizar_contacto">Actualizar Contacto</button>
</form>
<br>
<a href="/contactos_app/contactos">Volver a la lista de contactos</a>
<?php
 if (isset($mensaje)){
    echo "<br><br>" . htmlspecialchars($mensaje);
}
?>