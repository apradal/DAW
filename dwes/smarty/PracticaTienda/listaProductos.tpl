<div id="encabezado">
    <h1>Listado de productos</h1>
</div>
<article id="productos">
    {foreach from=$productos item=producto}
        <div class="producto">
            <img src="https://placeimg.com/200/200/tech/{counter}"/>
            <form id='{$producto->getCodigo()}' action='productos.php' method='post'>
                <input type='hidden' name='cod' value='{$producto->getCodigo()}'/>
                {if $producto->getFamilia() == 'ORDENA'}
                <a href="descripcion.php?producto={$producto->getCodigo()}&nombre={$producto->getNombreCorto()}&pvp={$producto->getPvp()}
            &descripcion={$producto->getDescripcion()}"><p>{$producto->getnombrecorto()}</p><p>Precio: {$producto->getPVP()} €</p></a>
                <br/><input type='submit' id="añadir" name='añadir' value='Añadir'/>
            </form>
            {else}
            <p>{$producto->getnombrecorto()}</p><p>Precio: {$producto->getPvp()} €</p>
            <br/><input type='submit' id="añadir" name='añadir' value='Añadir'/>
            </form>
            {/if}
        </div>
    {/foreach}
</article>