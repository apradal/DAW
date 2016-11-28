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
    for ($a = 0; $a <= 100; $a += 2) : echo $a . '<br>'; endfor;
?>
</body>
</html>
