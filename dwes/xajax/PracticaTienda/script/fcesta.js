/**
 * Created by antonio on 26/04/17.
 */
function vaciarCesta() {

    xajax_vaciar();

    return false;

}

function addCesta(codigo) {

    xajax_add(codigo);

    return false;

}

function eliminarProducto(codigo) {

    xajax_eliminar(codigo);

    return false;

}

function impAlRefrescar() {

    xajax_inicial();

    return false;

}