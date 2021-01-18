<?php
require_once('php/Conexion_bd.php');

//if($_POST)
    
if(isset( $_POST['nombre'], $_POST['apellido'], $_POST['tipo_id'], $_POST['identificacion'], $_POST['tipo_usuario'],
         $_POST['genero'], $_POST['edad'], $_POST['telefono'], $_POST['email'], $_POST['direccion']) 
        &&
        $_POST['nombre'] != "" && $_POST['apellido'] != "" && $_POST['tipo_id'] != "" && $_POST['identificacion'] != "" && $_POST['tipo_usuario'] != "" && $_POST['genero'] != "" && $_POST['edad'] != "" && $_POST['telefono'] != "" 
        && $_POST['email'] != "" && $_POST['direccion'] != "")       
{ 

//SENTENCIA SQL DE INSERCION DE LA INFORMACION INGRESADA POR EL ADMINISTRADOR

$insercion_sql = 'INSERT INTO usuario
                  (nombres, apellidos, tipo_Id, identificación, tipo_usuario, genero,
                  edad, telefono,email,dirección, fecha_activacion, estado_usuario)
                  VALUES(?,?,?,?,?,?,?,?,?,?,?,?)';

//VARIABLES QUE TOMAN LA INFORMACION RELACIONADA EN LOS CAMPOS

$nombres = isset( $_POST['nombre'] ) ? $_POST['nombre']: ''; 
$apellidos = isset( $_POST['apellido'] ) ? $_POST['apellido']: ''; 
$tipo_id = isset( $_POST['tipo_id'] ) ? $_POST['tipo_id']: ''; 
$identificacion = isset( $_POST['identificacion'] ) ? $_POST['identificacion']: ''; 
$tipo_usuario = isset( $_POST['tipo_usuario'] ) ? $_POST['tipo_usuario']: ''; 
$genero = isset( $_POST['genero'] ) ? $_POST['genero']: ''; 
$edad = isset( $_POST['edad'] ) ? $_POST['edad']: ''; 
$telefono = isset( $_POST['telefono'] ) ? $_POST['telefono']: ''; 
$email = isset( $_POST['email'] ) ? $_POST['email']: ''; 
$direccion = isset( $_POST['direccion'] ) ? $_POST['direccion']: ''; 
$fecha_activacion = date('Y-m-d');
$estado_usuario = 1;


$declaracion_insert = $pdo->prepare($insercion_sql);
$declaracion_insert -> execute(array($nombres, $apellidos, $tipo_id, $identificacion, $tipo_usuario, $genero,
                                     $edad, $telefono, $email, $direccion, $fecha_activacion, $estado_usuario));
//var_dump($declaracion_insert);

}

?>
<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>BiblioFacil | Nuevo Usuario</title>
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="css/hojaEstilos_creaUsuario.css">
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
    
    <form method="post" class="form">    
    <p>
        <span class="icon-accessibility">  Registro Usuario </span>
    </p>
        <table>
            <tr>
                <td>Nombres:</td>
                <td><label for="nombre"></label>
                <input type="text" name="nombre" id="nombre">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Apellidos:</td>
                <td><label for="apellidos"></label>
                <input type="text" name="apellido" id="apellido">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
            <td>Tipo Id:</td>
            <td>
                <label for="Tipo_Id"></label>
                <select name="tipo_id" >
                    <option></option>
                    <option>Tarjeta de identidad</option>
                    <option>Cedula de ciudadania</option>
                    <option>Cedula de extranjeria</option>
                </select>
            </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
             <tr>
                <td>Número Id:</td>
                <td><label for="identificacion"></label>
                <input type="text" name="identificacion" id="identificacion">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
               <td>T. Usuario:</td>
               <td>
                   <label for="tipo_usuario"></label>
                   <select name="tipo_usuario" >
                       <option></option>
                       <option>Estudiante    </option>
                       <option>Docente</option>
                       <option>Administrador         </option>
                   </select>
               </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Genero:</td>
                <td><label for="genero"></label>
                <input type="text" name="genero" id="genero">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Edad:</td>
                <td><label for="edad"></label>
                <input type="text" name="edad" id="edad">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Télefono:</td>
                <td><label for="telefono"></label>
                <input type="text" name="telefono" id="telefono">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Correo:</td>
                <td><label for="email"></label>
                <input type="text" name="email" id="email">*</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td><label for="direccion"></label>
                <input type="text" name="direccion" id="direccion">*</td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>                    
            </tr>
        </table>
        <input type="submit"  value="Enviar Información" name="enviar" id="enviar">
    </form>
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