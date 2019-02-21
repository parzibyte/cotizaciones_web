<?php
$tokenCSRF = Utiles::obtenerTokenCSRF();
?>

<div class="row" style="margin-top: 10%;">
    <div class="col-sm-12 col-lg-4 offset-lg-4">
        <h2>Login</h2>
    </div>
</div>
<div class="row" id="app">
    <div class="col-sm-12 col-lg-4 offset-lg-4">
        <form ref="form" method="post" action="<?php echo BASE_URL ?>/?p=iniciar_sesion">
            <input type="hidden" name="tokenCSRF" value="<?php echo $tokenCSRF ?>">
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input autofocus name="correo" autocomplete="off" required type="email" class="form-control"
                       id="correo" placeholder="tu_correo@dominio.com">
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input name="pass" autocomplete="off" required type="password" class="form-control"
                       id="pass" placeholder="Escribe tu contraseña">
            </div>
            <?php
            if (isset($_GET["mensaje"])) {
                ?>
                <br>
                <div class="alert alert-warning">
                    <?php if ($_GET["mensaje"] == "1") { ?>
                        El usuario o la contraseña no coinciden
                    <?php } ?>
                    <?php if ($_GET["mensaje"] == "2") { ?>
                        Inicia sesión para acceder al contenido
                    <?php } ?>
                    <?php if ($_GET["mensaje"] == "3") { ?>
                        Sesión cerrada, vuelve pronto
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="alert alert-danger">
                <strong>¿Notas algo diferente?</strong>
                hemos cambiado de dominio, pero tu usuario y contraseña deberían seguir funcionando. En caso de que no,
                contacta al programador
            </div>
            <button type="submit" class="btn btn-primary">Entrar <i class="fa fa-arrow-right"></i></button>
            <br>
            <a href="<?php echo BASE_URL ?>?p=registro">Registrarme</a>
        </form>
    </div>
</div>
