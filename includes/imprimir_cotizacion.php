<?php
if (empty($_GET["id"])) {
    exit("No se proporcionó un ID");
}

$cotizacion = Cotizaciones::porId($_GET["id"]);
if (!$cotizacion) {
    exit("No existe la cotización");
}
$servicios = Cotizaciones::serviciosPorId($_GET["id"]);
$caracteristicas = Cotizaciones::caracteristicasPorId($_GET["id"]);
$ajustes = Ajustes::obtener();
?>
<div id="app">
    <div class="row">
        <div class="col-sm">
            <h1>Cotización para <?php echo htmlentities($cotizacion->descripcion) ?></h1>
            <h4>Cliente: <?php echo htmlentities($cotizacion->razonSocial) ?></h4>
            <span class="badge badge-pill badge-success"><?php echo htmlentities($cotizacion->fecha) ?></span>
            <?php if (!empty($ajustes->mensajePresentacion)): ?>
                <p><?php echo htmlentities($ajustes->mensajePresentacion) ?></p>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <br>
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Servicio</th>
                            <th>Costo estimado</th>
                            <th>Tiempo estimado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $costoTotal = 0;
                        $tiempoTotal = 0;
                        foreach ($servicios as $servicio) {
                            $costoTotal += $servicio->costo;
                            $tiempoTotal += $servicio->tiempoEnMinutos * $servicio->multiplicador;
                            ?>
                            <tr>
                                <td><?php echo htmlentities($servicio->servicio) ?></td>
                                <td>{{<?php echo htmlentities($servicio->costo) ?> | dinero}}</td>
                                <td>{{<?php echo htmlentities($servicio->tiempoEnMinutos * $servicio->multiplicador) ?>
                                    |
                                    minutosATiempo}}
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-nowrap"><strong>{{<?php echo $costoTotal ?> | dinero}}</strong></td>
                            <td class="text-nowrap"><strong>{{<?php echo $tiempoTotal ?> | minutosATiempo}}</strong>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <h2>Características</h2>
            <ul class="list-group">
                <?php foreach ($caracteristicas as $caracteristica) { ?>
                    <li class="list-group-item"><?php echo htmlentities($caracteristica->caracteristica) ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm">
            <?php if (!empty($ajustes->mensajeAgradecimiento)): ?>
                <p><?php echo htmlentities($ajustes->mensajeAgradecimiento) ?></p>
            <?php endif ?>

            <?php if (!empty($ajustes->remitente)): ?>
                <p>Atentamente, <strong><?php echo htmlentities($ajustes->remitente) ?></strong></p>
            <?php endif ?>

            <?php if (!empty($ajustes->mensajePie)): ?>
                <p><?php echo htmlentities($ajustes->mensajePie) ?></p>
            <?php endif ?>
        </div>
    </div>
    <div class="row d-print-block d-sm-none">
        <hr>
        <div class="col-sm">
            Cotización creada en línea. Crea tus cotizaciones y presupuestos online, totalmente gratis:
            <strong>bit.ly/cotizaciones_online</strong>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <button @click="imprimir" class="btn btn-success d-print-none">Imprimir</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <br>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Vue({
            el: "#app",
            methods: {
                imprimir() {
                    let tituloOriginal = document.title;
                    document.title = "Cotización de <?php echo htmlentities($cotizacion->descripcion) ?> para <?php echo htmlentities($cotizacion->razonSocial) ?>";
                    window.print();
                    document.title = tituloOriginal;
                }
            },
        });
    });
</script>