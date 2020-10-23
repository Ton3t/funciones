<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'funciones.php';
        $m = array(array(1,3,0,8), array(13,5,2), array(18,4,1,9,87), array(6,9));
        $resul = recorrerMatriz($m);
        echo "El array mayor tiene " . $resul;
    ?>
    
</body>
</html>