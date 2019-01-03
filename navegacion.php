<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo BASE_URL ?>">Cotizaciones</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item <?php echo $_GET["p"] === "clientes" ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo BASE_URL ?>/?p=clientes">Clientes</a>
            </li>
            <li class="nav-item <?php echo $_GET["p"] === "cotizaciones" ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo BASE_URL ?>/?p=cotizaciones">Cotizaciones</a>
            </li>
            <li class="nav-item <?php echo $_GET["p"] === "editar_ajustes" ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo BASE_URL ?>/?p=editar_ajustes">Ajustes</a>
            </li>
            <li class="nav-item <?php echo $_GET["p"] === "creditos" ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo BASE_URL ?>/?p=creditos">Acerca de</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
