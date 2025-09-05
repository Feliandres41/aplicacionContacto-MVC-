<h1>Crear cuenta</h1>
<form action="/registrar" method="POST">
    <label for="nombre"><strong>Nombre:</strong></label>
    <input type="text" id="nombre" name="nombre" required><br><br>
    <label for="email"><strong>Correo electrónico:</strong></label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password"><strong>Contraseña:</strong></label>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Registrarse</button>
</form>
<form action="/iniciar_sesion">
    <a>¿Ya tienes una cuenta? </a><button>Inicia sesion</button>
</form>
<?php
if (isset($mensaje)){
    echo htmlspecialchars($mensaje);
}
?>