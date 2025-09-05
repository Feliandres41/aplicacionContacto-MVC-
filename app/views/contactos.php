<p>Hola, <?= htmlspecialchars($nombre_usuario); ?></p>
<h2>Tus Contactos:</h2>
<form action="/crear_contacto">
    <button type="submit">Agregar Nuevo Contacto</button>
</form>
<br>
<?php if (count($contactos) > 0): ?>
    <?php foreach ($contactos as $contacto): ?>
        <div>
            <strong>Nombre:</strong> <?= htmlspecialchars($contacto["nombre"]) ?>
            - <strong>Email:</strong> <?= htmlspecialchars($contacto["email"]) ?>
            - <strong>Teléfono:</strong> <?= htmlspecialchars($contacto["telefono"]) ?>
            - <strong>Fecha de creacion:</strong> <?= htmlspecialchars($contacto["fecha_creacion"]) ?>
            <form action="/editar_contacto" method="POST" style='display:inline-block;'>
                <input type='hidden' name='contacto_id' value='<?= htmlspecialchars($contacto["id"]) ?>'>
                <button type='submit'>Editar</button>
            </form>
            <form action='/eliminar_contacto' method='POST' style='display:inline-block;' onsubmit='return confirm("¿Estás seguro de que quieres eliminar este contacto?");'>
                <input type='hidden' name='contacto_id' value='<?= htmlspecialchars($contacto["id"]) ?>'>
                <button type='submit' name='eliminar_contacto'>Eliminar</button>
            </form>
            <br><hr>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No tienes contactos aún.</p>
<?php endif; ?>
<form action="/cerrar_sesion">
    <button>Cerrar sesión</button>
</form>