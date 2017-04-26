<!DOCTYPE html>
{*Plantilla para login. Es invocada desde login.php. solo visualiza el $error del php*}
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Pagar productos</title>
    <link href="css/tienda.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    {include file="logoff.tpl"}
    {if $pagar}
    <div class="pagado">
        <h3>Gracias!</h3>
        <p>Su compra se ha realizado con éxito.</p>
    </div>
    {else}
    <h2>Resumen de su compra</h2>
</header>
<main>
    <div id="ticket">
        <table cellspacing="0" cellpadding="0">
            <thead class="titulos">
            <tr>
                <th>Unidades</th>
                <th>Producto</th>
                <th>Precio</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$cesta->getProductos() item=producto}
                <tr>
                    <td>{$cesta->getUnidades($producto->getCodigo())}</td>
                    <td>{$producto->getNombreCorto()}</td>
                    <td>{$producto->getPvp()}€</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        <div class="total">
            <p>Total sin iva: {$cesta->coste()}€</p>
            <p>Total con (21%) de iva: {$cesta->coste() + ($cesta->coste() * 0.21)}€</p>
        </div>
    </div>
    <div id="formaPago">
        <h2>Seleccione forma de pago</h2>
        <form id="pago" action="pagar.php" method="post">
            <div id="metodos">
                <input type="radio" name="forma" value="tarjeta">Tarjeta<br>
                <input type="radio" name="forma" value="transferencia">Transferencia<br>
            </div>
            <div id="tarjetaM">
                <label for="numero">Numero de tarjeta</label>
                <input type="text" id="numero" maxlength="4"/>
                <input type="text" maxlength="4"/>
                <input type="text" maxlength="4"/>
                <input type="text" maxlength="4"/><br/>
                <label for="caduca">Caduca</label>
                <input type="text" id="caduca" maxlength="2"/>
                /
                <input type="text" maxlength="2"/><br/>
                <label for="cvv">CVV</label>
                <input type="text" maxlength="3"/>
            </div>
            <div id="transferenciaM">
                <p>Debe abonar el importa indicado a la siguiente cuenta. Una vez recibido el pago se procederá a su envío</p>
                <h3>Número de cuenta</h3>
                <p>ES01 3456 3211 21 1232457889</p>
            </div>
            <input type="submit" name="comprar" value="Comprar" id="comprar"/>
        </form>
    </div>
</main>
<footer>

</footer>
{/if}
<script>
    var pago = document.getElementById('pago');
    var formas = document.getElementsByName('forma');
    var tarjetaM = document.getElementById('tarjetaM');
    var transfeM = document.getElementById('transferenciaM');
    var comprar = document.getElementById('comprar');
    comprar.style.display = 'none';
    tarjetaM.style.display = 'none';
    transfeM.style.display = 'none';
    pago.onclick = function () {
        for (var i = 0; i < formas.length; i++){
            if (formas[i].checked){
                if (formas[i].value == 'tarjeta'){
                    tarjetaM.style.display = 'block';
                    transfeM.style.display = 'none';
                }else {
                    tarjetaM.style.display = 'none';
                    transfeM.style.display = 'block';
                }
                comprar.style.display = 'block';
            }
        }
    }
</script>
</body>
</html>