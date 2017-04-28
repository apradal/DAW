<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Listado de Productos con Plantillas</title>
    <link href="css/tienda.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
    {include file="logoff.tpl"}
    <h2>{$nombre}</h2>
</header>
<main>
    <div class="main">
        <h3>Características</h3>

        <p>Procesador: {$ordenador->getProcesador()}</p>
        <p>Ram: {$ordenador->getRam()}</p>
        <p>Tarjeta Gráfica: {$ordenador->getGrafica()}</p>
        <p>Unidad Óptica: {$ordenador->getOptica()}</p>
        <p>Sistema Operativo: {$ordenador->getSo()}</p>
        {if $ordenador->getOtros() != null}
            <p>Otros: {$ordenador->getOtros()}</p>
        {/if}
        <p>Pvp: {$pvp}</p>

        <h3>Descripción</h3>
        <p>{$descripcion}</p>
    </div>
</main>
<footer>
</footer>
</body>
</html>