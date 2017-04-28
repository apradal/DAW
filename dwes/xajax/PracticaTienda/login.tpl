<!DOCTYPE html>
{*Plantilla para login. Es invocada desde login.php. solo visualiza el $error del php*}
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Login Tienda Web con Plantillas</title>
    <link href="css/tienda.css" rel="stylesheet" type="text/css">
</head>
<body>
<main>
    <div id='login'>
        <h3>Inicie sesión para poder ver los productos de la tienda</h3>
        <form action='login.php' method='post'>
            <fieldset>
                <legend><h3>Login</h3></legend>
                {*si la variable error tiene algún valor se visualiza*}
                <div><span class='error'>{$error}</span></div>
                <div class='campo'>
                    <label for='usuario' >Usuario:</label><br/>
                    <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
                </div>
                <div class='campo'>
                    <label for='password' >Contraseña:</label><br/>
                    <input type='password' name='password' id='password' maxlength="50" /><br/>
                </div>

                <div class='campo'>
                    <br/><input type='submit' name='enviar' value='Enviar' />
                </div>
            </fieldset>
        </form>
    </div>
</main>
<footer></footer>
</body>
</html>