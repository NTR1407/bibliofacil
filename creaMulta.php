<?php
require_once('php/Conexion_bd.php');

if(isset($_POST['id_admin'], $_POST['id_usuario'], $_POST['observa']))
{ 
//SENTENCIA SQL DE INSERCION DE LA INFORMACION INGRESADA POR EL ADMINISTRADOR

$insercion_sql = 'INSERT INTO multas
                  (fo_administrador, fo_usuario, observaciones, fecha_activacion)
                  VALUES(?,?,?,?)';

//VARIABLES QUE TOMAN LA INFORMACION RELACIONADA EN LOS CAMPOS

$id_admin = isset( $_POST['id_admin'] ) ? $_POST['id_admin']: ''; 
$id_usuario = isset( $_POST['id_usuario'] ) ? $_POST['id_usuario']: ''; 
$observa = isset( $_POST['observa'] ) ? $_POST['observa']: ''; 
$fecha_activacion = date('Y-m-d');

$declaracion_insert = $pdo->prepare($insercion_sql);
$declaracion_insert->execute(array($id_admin, $id_usuario, $observa, $fecha_activacion));

//echo var_dump($declaracion_insert);
    
}
?>

<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>BiblioFacil | Nueva Multa</title>
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="css/hojaEstilos_creaMulta.css">
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
    
    <div class="buscar">
        <form method="post" class="form">    
        <p>
            <span class="icon-accessibility">  Registro Multa </span>
        </p>
            <table>
                <tr>
                    <td>Id Administrador:</td>
                    <td><label for="admin"></label>
                    <input type="number" name="id_admin" id="id_admin" required="required">*</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Id Usuario:</td>
                    <td><label for="usuario"></label>
                    <input type="number" name="id_usuario" id="id_usuario" required="required">*</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                <tr>
                    <td>Observaciones:</td>
                <td><label for="Observaciones"></label>               
                        <textarea name="observa" id ="observa" rows="5" cols="30" required="required"></textarea> 
                </tr>
                
            </table>

                </tr>
            </table>
            <input type="submit"  value="Enviar Información" name="enviar" id="enviar">
        </form>
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