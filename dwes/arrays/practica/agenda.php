<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body{
            padding: 0;
            margin: 0;
            background-color: #ffffff;
        }
        .error {
            color: red;
            display: block;
        }
        #display{
            max-width: 900px;
            margin: auto;
            background-color: #EBE8DE;
        }
        #display h1{
            background-color: black;
            margin: auto;
            text-align: center;
            color: #E56038;
            font-size: 2em;
        }
        .contactos{
            display: inline-block;
            margin-left: 100px;
            width: 300px;
        }
        .contactos h3{
            color: #000000;
            font-size: 1.5em;
            border-bottom: 1px solid black;
        }
        .contactos ul{
            list-style: none;
            margin-left: -40px;
        }
        #form{
            max-width: 900px;
            margin: auto;
            background-color: #EBE8DE;
        }
    </style>
</head>
<body>
<?php
/*
 * Con la tecnología conocida hasta ahora debes programar una especie de pequeña agenda según se especifica
Es una aplicación para mantener una pequeña agenda en una única página web programada en PHP.
La agenda almacenará únicamente dos datos de cada persona: su nombre y un número de teléfono.
 Además, no podrá haber nombres repetidos en la agenda.
En la parte superior de la página web se mostrará el contenido de la agenda. En la parte inferior debe figurar un sencillo formulario con dos cuadros de texto, uno para el nombre y otro para el número de teléfono.
Cada vez que se envíe el formulario:
Si el nombre está vacío, se mostrará una advertencia.
Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío,
 se añadirá a la agenda.
Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono,
 se sustituirá el número de teléfono anterior.
Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono,
 se eliminará de la agenda la entrada correspondiente a ese nombre.
*/
//Sanitizo los datos recibidos
$contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);
$contact = strtolower($contact);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
/**
 * Imprime los contactos del array
 * @param $array
 */
function printArrayContact($array){
    foreach ($array as $key => $value){
        echo '<li>'.$key.'</li><br/>';
    }
}

/**
 * Imprime los telefonos de los contactos del array
 * @param $array
 */
function printArrayPhones($array){
    foreach ($array as $key => $value){
        echo '<li>'.$value.'</li><br/>';
    }
}
function checkContacts($contacts, $contact){
    $exists = false;
    foreach ($contacts as $key) {
        if ($key == $contact) $exists = true;
    }
    return $exists;
}
?>
<section id="display">
    <h1>Agenda</h1>
    <?php
    if ($_POST['add'] && empty($contact)) {
        echo '<span class="error">Error: el contacto no puede estar vacio</span>';
        $contacts = $_POST['contacts'];
        $phones = $_POST['phones'];
        for ($i = 0; $i < count($contacts);$i++){
            $contactsMult[$contacts[$i]] = $phones[$i];
        }
    } else if ($_POST['add'] && !empty($contact)) {
        $contacts = $_POST['contacts'];
        $phones = $_POST['phones'];
        for ($i = 0; $i < count($contacts);$i++){
            $contactsMult[$contacts[$i]] = $phones[$i];
        }
        if (!checkContacts($contacts, $contact) && (!empty($phone) || $phone === '0')){
            $contactsMult[$contact] = $phone;
        } else if(checkContacts($contacts, $contact) && (!empty($phone) || $phone === '0')){
            $contactsMult[$contact] = $phone;
        } else if (checkContacts($contacts, $contact) && empty($phone)){
            unset($contactsMult[$contact]);
        }
    }
    ?>
    <article class="contactos">
        <h3>Contactos</h3>
        <ul>
            <?php
            printArrayContact($contactsMult);
            ?>
        </ul>
    </article>
    <article class="contactos">
        <h3>Teléfonos</h3>
        <ul>
            <?php
            printArrayPhones($contactsMult);
            ?>
        </ul>
    </article>
</section>
<section id="form">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <legend><b>Añadir contacto</b></legend>
            <label for="contacto">Contacto: <input type="text" name="contact" id="contact"></label>
            <label for="phone">Teléfono: <input type="number" name="phone" id="phone"></label>
            <?php
            foreach ($contactsMult as $key => $value){
                echo '<input type="hidden" value="'.$key.'" name="contacts[]"/>';
                echo '<input type="hidden" value="'.$value.'" name="phones[]"/>';
            }
            ?>
            <input type="submit" value="Añadir" name="add"/>
        </fieldset>
    </form>
</section>
</body>
</html>