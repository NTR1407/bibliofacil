<?php
require_once('php/Conexion_bd.php');

if($_POST)
{ 

        $actualizacion_sql = 'UPDATE usuario
                              SET nombres = ?
                                  , apellidos = ?
                                  , tipo_usuario = ?
                                  , genero = ?
                                  , edad = ?
                                  , telefono = ?
                                  , email = ?
                                  , dirección = ?
                                  , tipo_id = ?
                                  , identificación = ?
                                  , estado_usuario = ?
                              WHERE id_usuario = ?';
        
        //VARIABLES QUE TOMAN LA INFORMACION RELACIONADA EN LOS CAMPOS
        
        $nombres = isset( $_POST['nombres'] ) ? $_POST['nombres']: ''; 
        $apellidos = isset( $_POST['apellidos'] ) ? $_POST['apellidos']: ''; 
        $tipo_usuario = isset( $_POST['tipo_usuario'] ) ? $_POST['tipo_usuario']: '';        
        $genero = isset( $_POST['genero'] ) ? $_POST['genero']: ''; 
        $edad = isset( $_POST['edad'] ) ? $_POST['edad']: ''; 
        $telefono = isset( $_POST['telefono'] ) ? $_POST['telefono']: ''; 
        $email = isset( $_POST['email'] ) ? $_POST['email']: ''; 
        $direccion = isset( $_POST['dirección'] ) ? $_POST['dirección']: ''; 
        $tipo_Id = isset( $_POST['tipo_id'] ) ? $_POST['tipo_id']: ''; 
        $identificacion = isset( $_POST['identificación'] ) ? $_POST['identificación']: ''; 
        $estado_usuario = isset( $_POST['estado_usuario'] ) ? $_POST['estado_usuario']: '';     
        $id_usuario = isset( $_POST['id_usuario'] ) ? $_POST['id_usuario']: ''; 
    
        $declaracion_update = $pdo->prepare($actualizacion_sql);
        $declaracion_update -> execute(array($nombres, $apellidos, $tipo_usuario, $genero, $edad, $telefono, $email, $direccion, $tipo_Id,                                          $identificacion, $estado_usuario, $id_usuario ));
        /*var_dump($declaracion_update);*/
    
}


$usuarios_activos = "SELECT id_usuario, nombres, apellidos, tipo_id, identificación, tipo_usuario, 
	                 genero, edad, telefono, email, dirección, estado_usuario
                     FROM usuario";


$usuario_buscado = isset($_GET['id']) ?$_GET['id'] : '';
$usuario_lista = explode(' ', $usuario_buscado);

$arreglo = array();


$l = 0;

foreach($usuario_lista as $usuario_busca)
{
    $usuarios_activos .=" WHERE id_usuario LIKE :search{$l}";
    $arreglo[":search{$l}"] = '%' . $usuario_busca . '%';
    $l++;
}

//CONTEO PARA LA GENERACION DE LAS PAGINAS
$sentencia_conteo = $pdo->prepare($usuarios_activos);
$sentencia_conteo->execute($arreglo);
$resultado_sin_paginar = COUNT($sentencia_conteo->fetchAll());

$filas_a_mostrar = 10;

$total_paginas_a_mostrar = ceil($resultado_sin_paginar/$filas_a_mostrar);

$pagina_actual = isset($_GET['page']) ? $_GET['page'] : 0; 

$parametro_pagina_sql = $pagina_actual * $filas_a_mostrar;
$usuarios_activos .= " LIMIT {$parametro_pagina_sql},{$filas_a_mostrar}";
$usuarios=$pdo->prepare($usuarios_activos);
$usuarios->execute($arreglo);
$resultado = $usuarios->fetchAll();

?>
<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>BiblioFacil | Editar Usuario</title>
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="css/hojaEstilos_editaUsario.css">
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
    <div class="buscar" >
        <form id="buscar_form" method="get">
            <label for="">
            <input id="buscar_caja" type="text" name = "id" placeholder = "Ingrese el ID del usuario" value = "<?php echo $usuario_busca; ?>">
            <input id="buscar_envio" type="submit" name:= "buscar"  value="Buscar" >
            </label>
        </form>   
        
    <div class="div_formulario">
    <table class="table1">
        <thead>
         <tr id="titulo_t1">
              <th>Id</th><th>Nombres</th><th>Apellidos</th><th>Tipo Id</th><th>Identificación</th>
              <th>Tipo Usuario</th><th>Genero</th><th>Edad</th><th>Telefono</th>
              <th>E-mail</th><th>Dirección</th><th>Estado</th>
         </tr>
        </thead>
        <tbody>
         
        <?php
        
            foreach($resultado as $rs)
            {        
        ?>
         
         
          <tr>
              <td><?php echo  $rs['id_usuario']; ?></td>
              <td><?php echo  $rs['nombres']; ?></td>
              <td><?php echo  $rs['apellidos']; ?></td>
              <td><?php echo  $rs['tipo_id']; ?></td>
              <td><?php echo  $rs['identificación']; ?></td>
              <td><?php echo  $rs['tipo_usuario']; ?></td>
              <td><?php echo  $rs['genero']; ?></td>
              <td><?php echo  $rs['edad']; ?></td>
              <td><?php echo  $rs['telefono']; ?></td>
              <td><?php echo  $rs['email']; ?></td>
              <td><?php echo  $rs['dirección']; ?></td>
              
              <td id="estado" ><?php if($rs['estado_usuario'] == 1)
                        {
                            echo('Activo');
                        }
                        else
                        {
                            echo('Inactivo');
                        }
                   ?>
                </td>
              </td>
          </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <div id='boton_paginado'>
        <?php
            for($i = 1; $i <= $total_paginas_a_mostrar; $i++ )
                { 
        ?>
            <li id="li" >
                <a id="paginado"  href="editaUsuario.php?page=<?php echo $i-1;?>" aria-label="page <?php echo $i;?>"> 
                    <?php echo $i;?> 
                </a>
            </li>
        <?php
                }

        ?>
    </div> 
    </div>
        <div class="form_edita">
            <form method="post"  id="formulario" class="form">    
            <table>

                <tr>
                    <td><b>Id Usuario:</b></td>
                    <td><label for="id_usuario"></label>
                    <input type="number" name="id_usuario" value = "<?php echo $row['id_usuario']; ?>" id="id_usuario"></td>
                   
                    <td><b>Nombres:</b></td>
                    <td><label for="nombre"></label>
                    <input type="text" name="nombres" id="nombre"></td>
                    
                    <td><b>Apellidos:</b></td>
                    <td><label for="apellidos"></label>
                    <input type="text" name="apellidos" id="apellidos"></td>
                <td><b>Tipo Id:</b></td>
                <td>
                    <label for="Tipo_Id"></label>
                    <select name="tipo_id" >
                        <option></option>
                        <option>Tarjeta de identidad</option>
                        <option>Cedula de ciudadania</option>
                        <option>Cedula de extranjeria</option>
                    </select>
                </td>
                    <td><b>Número Id:</b></td>
                    <td><label for="identificación"></label>
                    <input type="text" name="identificación" id="identificacion"></td>
                 <td><b>T.Usuario:</b></td>
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
                    <td><b>Genero:</b></td>
                    <td><label for="genero"></label>
                    <input type="text" name="genero" id="genero"></td>
                
                    <td><b>Edad:</b></td>
                    <td><label for="edad"></label>
                    <input type="text" name="edad" id="edad"></td>
                
                    <td><b>Télefono:</b></td>
                    <td><label for="telefono"></label>
                    <input type="text" name="telefono" id="telefono"></td>
                
                    <td><b>Correo:</b></td>
                    <td><label for="email"></label>
                    <input type="text" name="email" id="email"></td>
                
                    <td><b>Dirección:</b></td>
                    <td><label for="direccion"></label>
                    <input type="text" name="dirección" id="direccion"></td>
                    
                    <td><b>Estado:</b></td>
                    <td><label for="estado_usuario"></label>
                    <input type="number" name="estado_usuario" id="estado_usuario"></td>
                </tr>
            </table>
            <input type="submit" id="actualizar" value="Actualizar">
            <script src="js/editaUsuario.js"></script>  
            </form> 
            <button id="muestra" onclick="muestraFormulario()">Editar</button>
        </div>  
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