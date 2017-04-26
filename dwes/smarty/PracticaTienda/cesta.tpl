<div id="cesta">

    <h3><img src="img/glyphicons-203-shopping-cart.png"/>Cesta</h3>
        {if $cesta->getProductos()|@count == 0}
        <p>Productos: 0</p>
        {else}
        <ul>
        {foreach from=$cesta->getProductos() item=producto}
            <form action="productos.php" method="post">
                    <li>{$cesta->getUnidades($producto->getCodigo())}</li>
                    <li>{$producto->getCodigo()}</li>
                    <li>{$producto->getPvp()}</li>
                    <input type="hidden" name="codigo" value="{$producto->getCodigo()}"/>
                    <li><input type="image" src="img/glyphicons-208-remove.png" border="0" alt="Submit" name="eliminar"/></li>
            </form>
        {/foreach}
        </ul>
            <p>Total: {$cesta->coste()}</p>
        <form action="productos.php" id="pagar" method="post">
            <input type="submit" name="pagar" value="Pagar"/>
            <input type="submit" name="vaciar" value="Vaciar"/>
        </form>
        {/if}
</div>