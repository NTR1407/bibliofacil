<?php
require_once('php/Conexion_bd.php');

/*
Solucionar que al enviar el formulario vacio, no se inserte nada.
Mejorar la visibilidad del formulario
*/

if($_POST)
{ 
//SENTENCIA SQL DE ACTUALIZACION DE LA INFORMACION INGRESADA POR EL ADMINISTRADOR

$actualizacion_sql = 'UPDATE libro
                      SET num_ejemplares = ?,
                          ubicación = ?, 
                          observaciones = ?, 
                          estado = ?
                      WHERE id_libro = ?';

//VARIABLES QUE TOMAN LA INFORMACION RELACIONADA EN LOS CAMPOS

$num_ejemplares = isset( $_POST['num_ejemplares'] ) ? $_POST['num_ejemplares']: '';
$ubicacion = isset( $_POST['ubicación'] ) ? $_POST['ubicación']: '';    
$observaciones = isset( $_POST['observaciones'] ) ? $_POST['observaciones']: '';
$estado_libro = isset( $_POST['estado'] ) ? $_POST['estado']: '';
$id_libro = isset( $_POST['id_libro'] ) ? $_POST['id_libro']: '';

$declaracion_update = $pdo->prepare($actualizacion_sql);
$declaracion_update -> execute(array($num_ejemplares,$ubicacion,$observaciones,$estado_libro, $id_libro));
//echo '<pre>';
//var_dump($declaracion_update);
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

<html>
   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>BiblioFacil | Editar Libro</title>
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="css/hojaEstilos_nuevoLibro.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <script src="js/jquery-3.5.1.js"></script> 
    </head>
    
<body>
    <header>
     <h1 class="h1"> BIBLIOFÁCIL </h1>
      <input type="checkbox" id="btn-menu">
      <label for="btn-menu" class="icon-menu"></label>
       <nav class="menu">
           <ul>
                <li class = "submenu" ><a href="Principal_02.php">Principal
                   <span class="icon-home"></span></a>
                </li>
                <li class = "submenu" ><a href="libros.php">Libros
                   <span class="icon-book"></span></a>
                </li>
           </ul>
       </nav> 
    </header>
    <script src="js/principal_02.js"></script>    
    
    <div class="div1">
        <form method="post" class="form">    
            <p>
                <span class="icon-book"> Editar Libro </span>
            </p>
            <table class="tabla">
            <tr>
                <td>Id Libro:</td>
                <td><label for="id_libro"></label>
                <input type="number" name="id_libro" id="id_libro" required="required">*</td>
            </tr>
                <td>&nbsp;</td>
            <tr>
                <td>Titulo:</td>
                <td><label for="nombre"></label>
                <input type="text" name="nombre" id="nombre" required="required">*</td>
            </tr>
                <td>&nbsp;</td>
            <tr>
                <td>Autor:</td>
                <td><label for="autor"></label>
                <input type="number" name="fo_autor" id="fo_autor" required="required">*</td>
            </tr>
                <td>&nbsp;</td>
            <tr>
                <td>Editorial:</td>
                <td><label for="editorial"></label>
                <input type="number" name="fo_editorial" id="fo_editorial" required="required">*</td>
            </tr>
                <td>&nbsp;</td>
            <tr>
                <td>Categoria:</td>
                <td><label for="categoria"></label>
                <input type="number" name="fo_categoria" id="fo_categoria" required="required">*</td>
            </tr>
                <td>&nbsp;</td>
            <tr>
                <td>N° Ejemplares:</td>
                <td><label for="num_ejemplares"></label>
                <input type="text" name="num_ejemplares" id="n_ejemplares" required="required">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Ubicación:</td>
                <td><label for="ubicacion"></label>
                <input type="text" name="ubicación" id="ubicacion" required="required">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Observaciones:</td>
                <td><label for="observaciones"></label>
                <input type="text" name="observaciones" id="observaciones" required="required">*</td>
            </tr> 
            <tr>
                <td>&nbsp;</td>    
            </tr> 
            <tr>
                <td>Estado:</td>
                <td><label for="estado"></label>
                <input type="text" name="estado" id="estado" required="required">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>    
            </tr> 
            </table>
            <input type="submit"  value="Enviar Información" name="enviar" id="enviar">
        </form>
    </div>

    <div class="div2">
        <table class="table1">
            <thead>
                <tr>
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
                <tr>
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
                <tr>
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