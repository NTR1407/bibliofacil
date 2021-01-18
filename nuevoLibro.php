<?php
require_once('php/Conexion_bd.php');

/*
Solucionar que al enviar el formulario vacio, no se inserte nada.
Mejorar la visibilidad del formulario
*/
if($_POST)
{ 
//SENTENCIA SQL DE INSERCION DE LA INFORMACION INGRESADA POR EL ADMINISTRADOR

$insercion_sql = 'INSERT INTO libro
                (nombre, fo_autor,fo_categoria, fo_editorial, 
                num_ejemplares, ubicación, observaciones,  estado, fecha_creacion)
                VALUES(?,?,?,?,?,?,?,?,?)';

//VARIABLES QUE TOMAN LA INFORMACION RELACIONADA EN LOS CAMPOS

$nombre = isset( $_POST['titulo'] ) ? $_POST['titulo']: ''; 
$autor = isset( $_POST['autor'] ) ? $_POST['autor']: ''; 
$editorial = isset( $_POST['editorial'] ) ? $_POST['editorial']: '';
$categoria = isset( $_POST['categoria'] ) ? $_POST['categoria']: '';
$num_ejemplares = isset( $_POST['n_ejemplares'] ) ? $_POST['n_ejemplares']: ''; 
$ubicacion = isset( $_POST['ubicacion'] ) ? $_POST['ubicacion']: ''; 
$observaciones = isset( $_POST['observaciones'] ) ? $_POST['observaciones']: ''; 
$estado_libro = 1;
$fecha_activacion = date('Y-m-d');


$declaracion_insert = $pdo->prepare($insercion_sql);
$declaracion_insert -> execute(array($nombre, $autor, $editorial, $categoria,  $num_ejemplares,                                                      $ubicacion,$observaciones, $estado_libro, $fecha_activacion));
/*var_dump($declaracion_insert);*/
    
}

$select_sql_autor = 'SELECT nombre, id_autor 
                     FROM autor 
                     WHERE estado = 1 
                     ORDER BY id_autor ASC';

$sentencia_select_autor = $pdo->prepare($select_sql_autor);
$sentencia_select_autor->execute();
$resultado_a = $sentencia_select_autor->fetchAll();

$select_sql_categoria = 'SELECT categoria, id_categoria 
                     FROM categoria 
                     WHERE estado = 1 
                     ORDER BY id_categoria ASC';

$sentencia_select_categoria = $pdo->prepare($select_sql_categoria);
$sentencia_select_categoria->execute();
$resultado_c = $sentencia_select_categoria->fetchAll();

$select_sql_editorial = 'SELECT nombre, id_editorial 
                     FROM editorial 
                     WHERE estado = 1 
                     ORDER BY id_editorial ASC';

$sentencia_select_editorial = $pdo->prepare($select_sql_editorial);
$sentencia_select_editorial->execute();
$resultado_e = $sentencia_select_editorial->fetchAll();

?>

<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>BiblioFacil | Nuevo Libro</title>
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="css/hojaEstilos_nuevoLibro.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <script src="js/jquery-3.5.1.js"></script> 
    </head>
    
<body>
    <header>
    <h1 class="h1">BIBLIOFÁCIL</h1>
      <input type="checkbox" id="btn-menu">
      <label for="btn-menu" class="icon-menu"></label>
       <nav class="menu">
           <ul>
                <li class = "submenu" ><a href="Principal_02.php">Principal
                   <span class="icon-home"></span></a>
                </li>
           </ul>
       </nav> 
    </header>
    <script src="js/principal_02.js"></script>    
    
    <div class="div1">
        <form method="post" class="form">    
            <p>
                <span class="icon-book">  Registro Libro </span>
            </p>
            <table class="tabla">
                <tr>
                    <td>Titulo:</td>
                    <td><label for="titulo"></label>
                    <input type="text" name="titulo" id="titulo" required="required">*</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Autor(es):</td>
                    <td>
                    <label for="autor"></label> 
                    <input type="number" name="autor" id="autor" required="required">*
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                <tr>
                <td>Editorial:</td>
                <td>
                    <label for="editorial"></label>
                    <input type="number" name="editorial" id="editorial" required="required">*
                </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>    
                </tr>
                <tr>
                <td>Categoria:</td>
                <td>
                    <label for="categoria"></label>
                    <input type="number" name="categoria" id="categoria" required="required">*
                </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>    
                </tr>    
                <tr>
                    <td>N° Ejemplares:</td>
                    <td><label for="n_ejemplares"></label>
                    <input type="number" name="n_ejemplares" id="n_ejemplares" required="required">*</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                
                <tr>
                    <td>Ubicación:</td>
                    <td><label for="ubicacion"></label>
                    <input type="text" name="ubicacion" id="ubicacion" required="required">*</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Observaciones:</td>
                    <td><label for="observaciones"></label>
                    <input type="text" name="observaciones" id="observaciones" required="required">*</td>
                </tr>
            </table>
            <input type="submit"  value="Enviar Información" name="enviar" id="enviar">
        </form>
    </div>
    <div class="div2">
        <table class="table1">
            <thead>
                <tr id = "titulo_t1">
                    <th>Autor</th><th>Id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    foreach($resultado_a as $res_a)
                    {
                ?>
                   <tr>
                    <td><?php echo $res_a['nombre'] ?></td>
                    <td><?php echo $res_a['id_autor'] ?></td>
                    
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <table class ="table1">
            <thead>
                <tr id = "titulo_t1">
                    <th>Editorial</th><th>Id</th>
                </tr>
            </thead>
                        <tbody>
                <?php
                
                    foreach($resultado_e as $res_e)
                    {
                ?>
                   <tr>
                    <td><?php echo $res_e['nombre'] ?></td>
                    <td><?php echo $res_e['id_editorial'] ?></td>
                    
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <table class = "table1">
            <thead>
                <tr id = "titulo_t1">
                    <th>Categoria</th><th>Id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    foreach($resultado_c as $res_c)
                    {
                ?>
                   <tr>
                    <td><?php echo $res_c['categoria'] ?></td>
                    <td><?php echo $res_c['id_categoria'] ?></td>
                    
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <footer class="footer">
        <p>
            Siguenos en nuestras redes sociales: 
            <a href="#" ><span class="icon-facebook2"></span></a> 
            <a href="#" ><span class="icon-twitter"></span></a> 
            <a href="#" ><span class="icon-instagram"></span></a><br>
            Todos los derechos reservados 2020
        </p>
    </footer>
</body>
</html>