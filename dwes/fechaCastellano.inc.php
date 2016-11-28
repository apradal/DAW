<?php
/*Anteriormente hiciste un ejercicio que mostraba la fecha actual en castellano.
 *  Con el mismo objetivo (puedes utilizar el código ya hecho), crea una función
 *  que devuelva una cadena de texto con la fecha en castellano, e introdúcela en
 *  un fichero externo. Después crea una página en PHP que incluya ese fichero y
 *  utilice la función para mostrar en pantalla la fecha obtenida.*/
    function semana(){
        $day = date("N");
        $month = date("m");
        $year = date("Y");
        
        switch ($day){
            case 1:
                $day = "Lunes";
                break;
            case 2:
                $day = "Martes";
                break;
            case 3:
                $day = "Miercoles";
                break;
            case 4:
                $day = "Jueves";
                break;
            case 5:
                $day = "Viernes";
                break;
            case 6:
                $day = "Sabado";
                break;
            case 7:
                $day = "Domingo";
                break;
        }
        switch ($month){
            case 1:
                $month = "Enero";
                break;
            case 2:
                $month = "Febrero";
                break;
            case 3:
                $month = "Marzo";
                break;
            case 4:
                $month = "Abril";
                break;
            case 5:
                $month = "Mayo";
                break;
            case 6:
                $month = "Junio";
                break;
            case 7:
                $month = "Julio";
                break;
            case 8:
                $month = "Agosto";
                break;
            case 9:
                $month = "Septiembre";
                break;
            case 10:
                $month = "Octubre";
                break;
            case 11:
                $month = "Noviembre";
                break;
            case 12:
                $month = "Diciembre";
                break;
        }
        return "<p>".$day.", Dia ".date("d")." de ".$month." de ".$year;
    }
    
?>

