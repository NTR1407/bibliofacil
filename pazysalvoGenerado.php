<?php
require_once('php/Conexion_bd.php');

$id = isset($_GET['id']) ? $_GET['id']: 0;

$consulta = "SELECT id_usuario, nombres, apellidos, identificación, tipo_usuario, email 
            FROM usuario 
            WHERE paz_y_salvo = 'S' and id_usuario = ? ";

$statement = $pdo->prepare($consulta);
$statement->execute(array($id));
$results = $statement->fetchAll();


?>


<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="utf-8" />
        <title>BiblioFacil | Certificado</title>
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="css/hojaEstilos_pazysalvoGenerado.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link href = "https://fonts.googleapis.com/css2? family = Comic + Neue & family = Roboto + Slab: wght @ 300 & display = swap" rel = "stylesheet">
    </head>
      
    <!--
        familia de fuentes: 'Comic Neue', cursiva;
        familia de fuentes: 'Roboto Slab', serif;
    -->

    <body>
        
     
        <div id="registro">
          
            <div id="titulo">
                <img src="imagenes/Escudo-Colegio_1.png" class= "tamano_img" >
                <h2> Paz y Salvo</h2> 
            </div>
            
            &nbsp;
            &nbsp;
            &nbsp;
            <p id="p"> 
                Mediante el presente documento se da constancia de que el usuario no tiene multas pendientes en la biblioteca
                de la institución en cuanto a lo que se refiere a prestamos y alquiler de los materiales dispuestos
                para el aprendizaje academico.
            </p>
            <br>
            <br>
            <table id="table">
                <thead>
                    <th>Id Usuaurio</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>      
                    <th>Identificación</th>
                    <th>Tipo Usuario</th>
                    <th>Email</th>
                </thead>

                <tbody>
                    <?php
                        foreach($results as $rs){    
                    ?>
                    <th><?php echo $rs['id_usuario']; ?></th>
                    <th><?php echo $rs['nombres']; ?></th>
                    <th><?php echo $rs['apellidos']; ?></th>
                    <th><?php echo $rs['identificación']; ?></th>
                    <th><?php echo $rs['tipo_usuario']; ?></th>
                    <th><?php echo $rs['email']; ?></th>

                    <?php
                        }
                    ?>
                </tbody>

            </table>
            <br>
            
            <p id="p">
                Certificado generado en la fecha: <?php echo(date('d-m-Y')); ?> con vigencia de 8 dias   
            </p>
            <br>
            
            <img src="imagenes/firma2.jpg" id="firma">
            
  
        </div>
        &nbsp;
            &nbsp;
    
    </body>
</html>

