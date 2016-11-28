<?php
header( "refresh:2;url=index.html" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
define("EDAD", 30);
echo 'tengo ' . EDAD . ' años<br>';
echo 'me quedan ' . (100 - EDAD) . ' para tener 100 años';
?>
</body>
</html>
