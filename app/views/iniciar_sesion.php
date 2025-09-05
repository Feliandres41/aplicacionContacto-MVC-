<h1>Iniciar sesión</h1>
<form action="/iniciar_sesion" method="POST">
    <label for="email_ini">Correo electrónico:</label>
    <input type="email" id="email_ini" name="email_ini" required><br><br>
    <label for="password_ini">Contraseña:</label>
    <input type="password" id="password_ini" name="password_ini" required><br><br>
    <button type="submit" name="login">Ingresar</button>
</form>
 <form action="/registrar">
    <a>¿No tienes una cuenta? </a><button>Registrate</button>
 </form>
<?php
 if (isset($mensaje)){
    echo htmlspecialchars($mensaje);
}
?>