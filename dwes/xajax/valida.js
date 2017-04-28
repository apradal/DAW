/**
 * Created by antonio on 26/04/17.
 */
function calcularCuadrado() {
    // Se cambia el botón de Enviar y se deshabilita
    //  hasta que llegue la respuesta
    // xajax.$('enviar').disabled = true;
    // xajax.$('enviar').value = "Procesando.....";

    // Aquí se hace la llamada a la función registrada de PHP
    xajax_calcularC(xajax.getFormValues("datosC"));

    return false;
}

function calcularRaiz() {
    // Se cambia el botón de Enviar y se deshabilita
    //  hasta que llegue la respuesta
    // xajax.$('enviar').disabled = true;
    // xajax.$('enviar').value = "Procesando.....";

    // Aquí se hace la llamada a la función registrada de PHP
    xajax_calcularR(xajax.getFormValues("datosR"));

    return false;
}