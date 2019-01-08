<?php
$tokenCSRF = Utiles::obtenerTokenCSRF();
?>
<div class="row" style="margin-top: 10%;">
    <div class="col-sm-12 col-lg-4 offset-lg-4">
        <h2>Registro</h2>
        <div class="alert alert-info">
            Regístrate utilizando tu correo electrónico
        </div>
    </div>
</div>
<div class="row" id="app">
    <div class="col-sm-12 col-lg-4 offset-lg-4">
        <form ref="form" method="post" action="<?php echo BASE_URL ?>/?p=guardar_usuario">
            <input type="hidden" name="tokenCSRF" value="<?php echo $tokenCSRF ?>">
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input autofocus name="correo" autocomplete="off" required type="email" class="form-control"
                       id="correo" placeholder="tu_correo@dominio.com">
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input v-model="usuario.pass" name="pass" autocomplete="off" required type="password"
                       class="form-control"
                       id="pass" placeholder="Escribe tu contraseña">
            </div>
            <div class="form-group">
                <label for="pass2">Confirma tu contraseña</label>
                <input v-model="usuario.pass2" name="pass2" autocomplete="off" required type="password"
                       class="form-control"
                       id="pass2" placeholder="Vuelve a escribir tu contraseña">
            </div>
            <button type="button" @click="registrar" class="btn btn-primary">Registrarme</button>
            <br>
            <a href="<?php echo BASE_URL ?>?p=login">Ya tengo una cuenta</a>
        </form>
    </div>
    <div class="col-sm-12 col-lg-4 offset-lg-4" v-show="mostrarAlertaPassNoCoincide">
        <br>
        <div class="alert alert-danger">
            Las contraseñas no coinciden
        </div>
    </div>
</div>
<script>
    new Vue({
        el: "#app",
        data: () => ({
            usuario: {
                pass: "",
                pass2: "",
            },
            mostrarAlertaPassNoCoincide: false,
        }),
        methods: {
            registrar() {
                this.mostrarAlertaPassNoCoincide = false;
                if (!this.$refs.form.checkValidity()) {
                    return this.$refs.form.reportValidity();
                }
                if (this.usuario.pass && (this.usuario.pass !== this.usuario.pass2)) {
                    return this.mostrarAlertaPassNoCoincide = true;
                }
                this.$refs.form.submit();
            }
        }
    });
</script>