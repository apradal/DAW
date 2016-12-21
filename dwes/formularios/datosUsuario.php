<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .error {color: red};
    </style>
</head>
<body>
<?php
//definicion variables de error
$nameErr = $lastErr = $addErr = $birthErr = $ageErr = $langErr = $genErr = $emailErr = "";
//definicion variables de formulario
$name = $lastname = $address = $birthday = $age = $language = $gender = $email = "";
if ($_POST){
    if (empty($_POST['name'])){
        $nameErr = ' * Error el nombre es obligatio';
    }else{
        $name = $_POST['name'];
    }
    if (empty($_POST['lastname'])){
        $lastErr = ' * Error los apellidos son obligatios';
    }else{
        $lastname = $_POST['lastname'];
    }
    if (empty($_POST['address'])){
        $addErr= ' * Error la direccion es obligatia';
    }else{
        $address = $_POST['address'];
    }
    if (empty($_POST['birthday'])){
        $birthErr = ' * Error la fecha de nacimiento es obligatia';
    }else{
        $birthday = $_POST['birthday'];
    }
    if (empty($_POST['age'])){
        $ageErr = ' * Error la edad es obligatia';
    }else{
        $age = $_POST['age'];
    }
    if (empty($_POST['language'])){
        $langErr = ' * Error seleccione un lenguaje';
    }else{
        $language = $_POST['language'];
    }
    if (empty($_POST['gender'])){
        $genErr = ' * Error el sexo es obligatorio';
    }else{
        $gender = $_POST['gender'];
    }
    if (empty($_POST['email'])){
        $emailErr = ' * Error el correo es obligatorio';
    }else{
        $email = $_POST['email'];
    }
}
?>
<h2>Datos de usuario</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Nombre: <input type="text" name="name" value="<?php echo $name ?>"><span class="error"><?php echo $nameErr ?></span><br>
    Apellidos: <input type="text" name="lastname" value="<?php echo $lastname ?>"><span class="error"><?php echo $lastErr ?></span><br>
    Dirección: <input type="text" name="address" value="<?php echo $address ?>"><span class="error"><?php echo $addErr ?></span><br>
    Fecha nacimiento: <input type="date" name="birthday" value="<?php echo $birthday ?>"><span class="error"><?php echo $birthErr ?></span><br>
    Edad: <input type="number" name="age" value="<?php echo $age ?>"><span class="error"><?php echo $ageErr ?></span><br>
    Idiomas: <span class="error"><?php echo $langErr ?></span><br>
    <input type="checkbox" value="es" name="language" <?php if (isset($language) && $language == 'es') echo 'checked'?>> Español<br>
    <input type="checkbox" value="en" name="language" <?php if (isset($language) && $language == 'en') echo 'checked'?>> Inglés<br>
    <input type="checkbox" value="fr" name="language" <?php if (isset($language) && $language == 'fr') echo 'checked'?>> Francés<br>
    <input type="checkbox" value="br" name="language" <?php if (isset($language) && $language == 'br') echo 'checked'?>> Brasileño<br>
    Sexo: <span class="error"><?php echo $genErr ?></span><br>
    <input type="radio" value="man" name="gender" <?php if (isset($gender) && $gender == 'man') echo 'checked'?>> Hombre<br>
    <input type="radio" value="woman" name="gender" <?php if (isset($gender) && $gender == 'woman') echo 'checked'?>> Mujer<br>
    <input type="radio" value="other" name="gender" <?php if (isset($gender) && $gender == 'other') echo 'checked'?>> Otro<br>
    Email: <input type="email" name="email" value="<?php echo $email ?>"><span class="error"><?php echo $emailErr ?></span><br>
    Estudios: <select name="estudies">
        <option value="eso">Eso</option><br>
        <option value="bach">Bachiller</option><br>
        <option value="ciclo">Ciclo formativo</option><br>
        <option value="grado">Grado universitario</option><br>
    </select><br>
    <input type="submit" value="Enviar" name="send">
</form>
<?php
echo '<h2>Datos de usuario</h2><br>';
echo 'su nombre es: ' . $name . '<br>';
echo $lastname . '<br>';
echo $address . '<br>';
echo $birthday . '<br>';
echo $age . '<br>';
echo $language . '<br>';
echo $gender . '<br>';
echo $email . '<br>';
?>
</body>
</html>