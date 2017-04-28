/**
 * Created by antonio on 26/04/17.
 */
//indico que cojo los datos del formulario con id formulario y se los enviar a la funcion php maxTres.
function comprobarForm() {

    xajax_maxTres(xajax.getFormValues("formulario"));

    return false;

}
