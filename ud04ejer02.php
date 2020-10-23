<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="contenedor">
        <form action="" method="post">
            <div class="item">
                <div class="pregunta">
                    <label for="idusuario">ID:
                    </label>
                </div>
                <div class="respuesta">
                    <input type="text" name="libro" id="idusuario" value="<?php if(isset($_POST['libro'])) echo $_POST['libro']; ?>" placeholder="Inserta un número">
                    <?php 
                    if(isset($_POST['libro']) && empty($_POST['libro'])) {
                        echo "<p style='{color: red; background-color: gray}'>Debes introducir un ID, por ej 01.</p>";
                    } ?>
                </div>
            </div>
            <div class="item">
                <div class="pregunta">
                    <label for="idtitulo">Titulo:
                    </label>
                </div>
                <div class="respuesta">
                    <input type="text" name="titulo" id="idusuario" value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo']; ?>" placeholder="Inserta un nombre">
                    <?php 
                    if(isset($_POST['titulo']) && empty($_POST['titulo'])) {
                        echo "<p style='{color: red; background-color: gray}'>Debes introducir el titulo del libro.</p>";
                    } ?>
                </div>
            </div>
            <div class="item">
                <div class="pregunta">
                    <label for="idautor">Autor:
                    </label>
                </div>
                <div class="respuesta">
                    <input type="text" name="autor" id="idautor" value="<?php if(isset($_POST['autor'])) echo $_POST['autor']; ?>" placeholder="Inserta un nombre">
                    <?php 
                    if(isset($_POST['autor']) && empty($_POST['autor'])) {
                        echo "<p style='{color: red; background-color: gray}'>Debes introducir un autor.</p>";
                    } ?>
                </div>
            </div>
            <div class="item">
                <div class="pregunta">
                    <label for="idpregunta">Paginas:
                    </label>
                </div>
                <div class="respuesta">
                    <input type="text" name="paginas" id="idpaginas" value="<?php if(isset($_POST['paginas'])) echo $_POST['paginas'];?>" placeholder="Inserta un número">
                    <?php 
                    if(isset($_POST['paginas']) && empty($_POST['paginas'])) {
                        echo "<p style='{color: red; background-color: gray}'>Debes introducir un nº de páginas.</p>";
                    } ?>
                </div>
            </div>
            <div class="item">
                <div class="pregunta">
                    <label for="idpregunta">
                    </label>
                </div>
                <div class="respuesta">
                    <input type="submit" name="enviar" id="idañadir" value="Añadir libro">
                </div>
            </div>
        <?php
        echo muestraBD();
        $conexion = new mysqli('localhost', 'root', '', 'bdlibros');
        if ($conexion->connect_errno) {
            echo "La conexión a la base de datos no ha sido posible...";
        }
        else {
            echo "Conectado a la base de datos";
            if (!empty($_POST['libro']) && !empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['paginas'])) {
                $id = $_POST['libro'];
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $paginas = $_POST['paginas'];
                $sentencia = "INSERT INTO libros VALUES (".$id.", '".$titulo."', '".$autor."', ".$paginas.")";
                $ingresa = $conexion->query($sentencia);
                $ingresa = $conexion->query("SELECT * FROM LIBROS");
                $resultado = $ingresa->fetch_object();
                $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
            while($resultado != null) {
                $mensaje .= "<tr><td>$resultado->id</td><td>$resultado->titulo</td><td>$resultado->autor</td><td>$resultado->paginas</td></tr>";
                $resultado = $ingresa->fetch_object();
            }
            $mensaje .= "</table>";
            echo $mensaje;
            }

        }
        
        function muestraBD() {
            $conexion = new mysqli('localhost', 'root', '', 'bdlibros');
            if ($conexion->connect_errno) {
                echo "La conexión a la base de datos no ha sido posible...";
            }
            else {
                $datosBD = $conexion->query("SELECT * FROM LIBROS");
                $datos = $datosBD->fetch_object();
                $tabla ="<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
                while($datos != null) {
                    $tabla .= "<tr><td>$datos->id</td><td>$datos->titulo</td><td>$datos->autor</td><td>$datos->paginas</td></tr>";
                    $datos = $datosBD->fetch_object();
                }
                $tabla .= "</table>";
                return $tabla;
            }
        }

    ?>
        </form>
        
    </div>

    
</body>

</html>