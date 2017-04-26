<!DOCTYPE html>

<html>
<head>
    <title>página de smarty</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
{*Usando motor de plantillas smarty*}

{if empty($usuario)}
    <form action="index.php" method="POST">
        Usuario
        <input type="text" name ="usuario"/>
        <input type =submit value="acceder">
    </form>
{else}
    <h1>Bienvenido al sitio web {$usuario}</h1>
{/if}

</body>
</html>