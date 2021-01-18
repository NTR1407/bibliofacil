<pre><?php
require_once('php/Conexion_bd.php');

//Sentencias que muestran la cantidad de libros existentes por categoria.


if($_POST)
{ 

        $actualizacion_sql = 'UPDATE prestamos
                              SET estado = 0,
                              fecha_entrega = ?
                              WHERE id_prestamos = ?';
        
        //VARIABLES QUE TOMAN LA INFORMACION RELACIONADA EN LOS CAMPOS
        
        $fecha_entrega = isset( $_POST['fecha_entrega'] ) ? $_POST['fecha_entrega']: '';
        $id_prestamos = isset( $_POST['id_prestamos'] ) ? $_POST['id_prestamos']: ''; 
    
        $declaracion_update = $pdo->prepare($actualizacion_sql);
        $declaracion_update -> execute(array($fecha_entrega,$id_prestamos ));
        /*var_dump($declaracion_update);*/   
}





$conteo_sql_ciencias = "SELECT
                            IF((SELECT SUM(num_ejemplares) as total_ciencias
                            FROM libro
                            WHERE fo_categoria = 1 AND estado = 1 
                            GROUP BY num_ejemplares) IS NULL, 0,
                            (SELECT SUM(num_ejemplares) as total_ciencias
                            FROM libro
                            WHERE fo_categoria = 1 AND estado = 1 
                            GROUP BY num_ejemplares)) as total_ciencias";

$conteo_ciencias = $pdo->prepare($conteo_sql_ciencias);
$conteo_ciencias->execute();
$resultado = $conteo_ciencias->fetchAll();
$total_ciencias = $resultado[0]['total_ciencias'];

//var_dump($resultado);
$conteo_sql_deportes =  "SELECT
                            IF((SELECT SUM(num_ejemplares) as total_deportes
                            FROM libro
                            WHERE fo_categoria = 2 AND estado = 1 
                            ) IS NULL, 0,
                            (SELECT SUM(num_ejemplares) as total_deportes
                            FROM libro
                            WHERE fo_categoria = 2 AND estado = 1 
                            )) as total_deportes";
$conteo_deportes = $pdo->prepare($conteo_sql_deportes);
$conteo_deportes->execute();
$resultado = $conteo_deportes->fetchAll();
$total_deportes = $resultado[0]['total_deportes'];

$conteo_sql_investigacion =  "SELECT
                                IF((SELECT SUM(num_ejemplares) as total_investigacion
                                FROM libro
                                WHERE fo_categoria = 3 AND estado = 1 
                                ) IS NULL, 0,
                                (SELECT SUM(num_ejemplares) as total_investigacion
                                FROM libro
                                WHERE fo_categoria = 3 AND estado = 1 
                                )) as total_investigacion";

$conteo_investigacion = $pdo->prepare($conteo_sql_investigacion);
$conteo_investigacion->execute();
$resultado = $conteo_investigacion->fetchAll();
$total_investigacion = $resultado[0]['total_investigacion'];

$conteo_sql_lenguas = "SELECT
                        IF((SELECT SUM(num_ejemplares) as total_lenguas
                        FROM libro
                        WHERE fo_categoria = 4 AND estado = 1 
                        ) IS NULL, 0,
                        (SELECT SUM(num_ejemplares) as total_lenguas
                        FROM libro
                        WHERE fo_categoria = 4 AND estado = 1 
                        )) as total_lenguas";

$conteo_lenguas = $pdo->prepare($conteo_sql_lenguas);
$conteo_lenguas->execute();
$resultado = $conteo_lenguas->fetchAll();
$total_lenguas = $resultado[0]['total_lenguas'];

$conteo_sql_literatura = "SELECT
                            IF((SELECT SUM(num_ejemplares) as total_literatura
                            FROM libro
                            WHERE fo_categoria = 8 AND estado = 1 
                            ) IS NULL, 0,
                            (SELECT SUM(num_ejemplares) as total_literatura
                            FROM libro
                            WHERE fo_categoria = 8 AND estado = 1 
                            )) as total_literatura;";

$conteo_literatura = $pdo->prepare($conteo_sql_literatura);
$conteo_literatura->execute();
$resultado = $conteo_literatura->fetchAll();
$total_literatura = $resultado[0]['total_literatura'];

$conteo_sql_matematicas = "SELECT
                            IF((SELECT SUM(num_ejemplares) as total_matematicas
                            FROM libro
                            WHERE fo_categoria = 5 AND estado = 1 
                            ) IS NULL, 0,
                            (SELECT SUM(num_ejemplares) as total_matematicas
                            FROM libro
                            WHERE fo_categoria = 5 AND estado = 1 
                            )) as total_matematicas";

$conteo_matematicas = $pdo->prepare($conteo_sql_matematicas);
$conteo_matematicas->execute();
$resultado = $conteo_matematicas->fetchAll();
$total_matematicas = $resultado[0]['total_matematicas'];

$conteo_sql_tecnologias = "SELECT
                            IF((SELECT SUM(num_ejemplares) as total_tecnologias
                            FROM libro
                            WHERE fo_categoria = 7 AND estado = 1 
                            ) IS NULL, 0,
                            (SELECT SUM(num_ejemplares) as total_tecnologias
                            FROM libro
                            WHERE fo_categoria = 7 AND estado = 1 
                            )) as total_tecnologias";

$conteo_tecnologias = $pdo->prepare($conteo_sql_tecnologias);
$conteo_tecnologias->execute();
$resultado = $conteo_tecnologias->fetchAll();
$total_tecnologias = $resultado[0]['total_tecnologias'];

$conteo_sql_medicina = "SELECT
                            IF((SELECT SUM(num_ejemplares) as total_medicina
                            FROM libro
                            WHERE fo_categoria = 6 AND estado = 1 
                            ) IS NULL, 0,
                            (SELECT SUM(num_ejemplares) as total_medicina
                            FROM libro
                            WHERE fo_categoria = 6 AND estado = 1 
                            )) as total_medicina";

$conteo_medicina = $pdo->prepare($conteo_sql_medicina);
$conteo_medicina->execute();
$resultado = $conteo_medicina->fetchAll();
$total_medicina = $resultado[0]['total_medicina'];


//Sentencias que muestran la cantidad de libros prestados por categoria.


$conteop_sql_ciencias = "SELECT COUNT(*) as total_p_ciencias
                            FROM prestamos as p
                            INNER JOIN libro as l
                            ON p.fo_libro = l.id_libro
                            WHERE l.fo_categoria = 1 AND l.estado = 1";

$conteo_p_ciencias = $pdo->prepare($conteop_sql_ciencias);
$conteo_p_ciencias->execute();
$resultado = $conteo_p_ciencias->fetchAll();
/*var_dump($resultado);*/
$total_p_ciencias = $resultado[0]['total_p_ciencias'];

$conteod_sql_ciencias = "SELECT (SUM(l.num_ejemplares) - (SELECT COUNT(*) FROM prestamos as p INNER JOIN libro                                 as l
                                ON p.fo_libro = l.id_libro
                                WHERE l.fo_categoria = 1 AND l.estado = 1)) as total_d_ciencias
                        FROM libro l
                        WHERE l.fo_categoria = 1 AND l.estado = 1";

$conteo_d_ciencias = $pdo->prepare($conteod_sql_ciencias);
$conteo_d_ciencias->execute();
$resultado = $conteo_d_ciencias->fetchAll();
/*var_dump($resultado);*/
$total_d_ciencias = $resultado[0]['total_d_ciencias'];


$conteop_sql_deportes = "SELECT COUNT(*) as total_p_deportes
                            FROM prestamos as p
                            INNER JOIN libro as l
                            ON p.fo_libro = l.id_libro
                            WHERE l.fo_categoria = 2 AND l.estado = 1";

$conteo_p_deportes = $pdo->prepare($conteop_sql_deportes);
$conteo_p_deportes->execute();
$resultado = $conteo_p_deportes->fetchAll();
/*var_dump($resultado);*/
$total_p_deportes = $resultado[0]['total_p_deportes'];

$conteod_sql_deportes = "SELECT (SUM(l.num_ejemplares) - (SELECT COUNT(*) FROM prestamos as p INNER JOIN libro                                 as l
                                ON p.fo_libro = l.id_libro
                                WHERE l.fo_categoria = 2 AND l.estado = 1)) as total_d_deportes
                        FROM libro l
                        WHERE l.fo_categoria = 2 AND l.estado = 1";

$conteo_d_deportes = $pdo->prepare($conteod_sql_deportes);
$conteo_d_deportes->execute();
$resultado = $conteo_d_deportes->fetchAll();
/*var_dump($resultado);*/
$total_d_deportes = $resultado[0]['total_d_deportes'];

$conteop_sql_investigacion = "SELECT COUNT(*) as total_p_investigacion
                            FROM prestamos as p
                            INNER JOIN libro as l
                            ON p.fo_libro = l.id_libro
                            WHERE l.fo_categoria = 3 AND l.estado = 1";

$conteo_p_investigacion = $pdo->prepare($conteop_sql_investigacion);
$conteo_p_investigacion->execute();
$resultado = $conteo_p_investigacion->fetchAll();
/*var_dump($resultado);*/
$total_p_investigacion = $resultado[0]['total_p_investigacion'];

$conteod_sql_investigacion = "SELECT (SUM(l.num_ejemplares) - (SELECT COUNT(*) FROM prestamos as p INNER JOIN libro                                 as l
                                ON p.fo_libro = l.id_libro
                                WHERE l.fo_categoria = 3 AND l.estado = 1)) as total_d_investigacion
                        FROM libro l
                        WHERE l.fo_categoria = 3 AND l.estado = 1";

$conteo_d_investigacion = $pdo->prepare($conteod_sql_investigacion);
$conteo_d_investigacion->execute();
$resultado = $conteo_d_investigacion->fetchAll();
/*var_dump($resultado);*/
$total_d_investigacion = $resultado[0]['total_d_investigacion'];

$conteop_sql_lenguas = "SELECT COUNT(*) as total_p_lenguas
                            FROM prestamos as p
                            INNER JOIN libro as l
                            ON p.fo_libro = l.id_libro
                            WHERE l.fo_categoria = 4 AND l.estado = 1";

$conteo_p_lenguas = $pdo->prepare($conteop_sql_lenguas);
$conteo_p_lenguas->execute();
$resultado = $conteo_p_lenguas->fetchAll();
/*var_dump($resultado);*/
$total_p_lenguas = $resultado[0]['total_p_lenguas'];

$conteod_sql_lenguas = "SELECT (SUM(l.num_ejemplares) - (SELECT COUNT(*) FROM prestamos as p INNER JOIN libro                                 as l
                                ON p.fo_libro = l.id_libro
                                WHERE l.fo_categoria = 4 AND l.estado = 1)) as total_d_lenguas
                        FROM libro l
                        WHERE l.fo_categoria = 4 AND l.estado = 1";

$conteo_d_lenguas = $pdo->prepare($conteod_sql_lenguas);
$conteo_d_lenguas->execute();
$resultado = $conteo_d_lenguas->fetchAll();
/*var_dump($resultado);*/
$total_d_lenguas = $resultado[0]['total_d_lenguas'];

$conteop_sql_literatura = "SELECT COUNT(*) as total_p_literatura
                            FROM prestamos as p
                            INNER JOIN libro as l
                            ON p.fo_libro = l.id_libro
                            WHERE l.fo_categoria = 8 AND l.estado = 1";

$conteo_p_literatura = $pdo->prepare($conteop_sql_literatura);
$conteo_p_literatura->execute();
$resultado = $conteo_p_literatura->fetchAll();
/*var_dump($resultado);*/
$total_p_literatura = $resultado[0]['total_p_literatura'];

$conteod_sql_literatura = "SELECT (SUM(l.num_ejemplares) - (SELECT COUNT(*) FROM prestamos as p INNER JOIN libro                                 as l
                                ON p.fo_libro = l.id_libro
                                WHERE l.fo_categoria = 8 AND l.estado = 1)) as total_d_literatura
                        FROM libro l
                        WHERE l.fo_categoria = 8 AND l.estado = 1";

$conteo_d_literatura = $pdo->prepare($conteod_sql_literatura);
$conteo_d_literatura->execute();
$resultado = $conteo_d_literatura->fetchAll();
/*var_dump($resultado);*/
$total_d_literatura = $resultado[0]['total_d_literatura'];

$conteop_sql_matematicas = "SELECT COUNT(*) as total_p_matematicas
                            FROM prestamos as p
                            INNER JOIN libro as l
                            ON p.fo_libro = l.id_libro
                            WHERE l.fo_categoria = 5 AND l.estado = 1";

$conteo_p_matematicas = $pdo->prepare($conteop_sql_matematicas);
$conteo_p_matematicas->execute();
$resultado = $conteo_p_matematicas->fetchAll();
/*var_dump($resultado);*/
$total_p_matematicas = $resultado[0]['total_p_matematicas'];

$conteod_sql_matematicas = "SELECT (SUM(l.num_ejemplares) - (SELECT COUNT(*) FROM prestamos as p INNER JOIN libro                                 as l
                                ON p.fo_libro = l.id_libro
                                WHERE l.fo_categoria = 5 AND l.estado = 1)) as total_d_matematicas
                        FROM libro l
                        WHERE l.fo_categoria = 5 AND l.estado = 1";

$conteo_d_matematicas = $pdo->prepare($conteod_sql_matematicas);
$conteo_d_matematicas->execute();
$resultado = $conteo_d_matematicas->fetchAll();
/*var_dump($resultado);*/
$total_d_matematicas = $resultado[0]['total_d_matematicas'];

$conteop_sql_tecnologias = "SELECT COUNT(*) as total_p_tecnologias
                            FROM prestamos as p
                            INNER JOIN libro as l
                            ON p.fo_libro = l.id_libro
                            WHERE l.fo_categoria = 7 AND l.estado = 1";

$conteo_p_tecnologias = $pdo->prepare($conteop_sql_tecnologias);
$conteo_p_tecnologias->execute();
$resultado = $conteo_p_tecnologias->fetchAll();
/*var_dump($resultado);*/
$total_p_tecnologias = $resultado[0]['total_p_tecnologias'];

$conteod_sql_tecnologias = "SELECT (SUM(l.num_ejemplares) - (SELECT COUNT(*) FROM prestamos as p INNER JOIN libro                                 as l
                                ON p.fo_libro = l.id_libro
                                WHERE l.fo_categoria = 7 AND l.estado = 1)) as total_d_tecnologias
                        FROM libro l
                        WHERE l.fo_categoria = 7 AND l.estado = 1";

$conteo_d_tecnologias = $pdo->prepare($conteod_sql_tecnologias);
$conteo_d_tecnologias->execute();
$resultado = $conteo_d_tecnologias->fetchAll();
/*var_dump($resultado);*/
$total_d_tecnologias = $resultado[0]['total_d_tecnologias'];

$conteop_sql_medicina = "SELECT COUNT(*) as total_p_medicina
                            FROM prestamos as p
                            INNER JOIN libro as l
                            ON p.fo_libro = l.id_libro
                            WHERE l.fo_categoria = 6 AND l.estado = 1";

$conteo_p_medicina = $pdo->prepare($conteop_sql_medicina);
$conteo_p_medicina->execute();
$resultado = $conteo_p_medicina->fetchAll();
/*var_dump($resultado);*/
$total_p_medicina = $resultado[0]['total_p_medicina'];

$conteod_sql_medicina = "SELECT (SUM(l.num_ejemplares) - (SELECT COUNT(*) FROM prestamos as p INNER JOIN libro                                 as l
                                ON p.fo_libro = l.id_libro
                                WHERE l.fo_categoria = 6 AND l.estado = 1)) as total_d_medicina
                        FROM libro l
                        WHERE l.fo_categoria = 6 AND l.estado = 1";

$conteo_d_medicina = $pdo->prepare($conteod_sql_medicina);
$conteo_d_medicina->execute();
$resultado = $conteo_d_medicina->fetchAll();
/*var_dump($resultado);*/
$total_d_medicina = $resultado[0]['total_d_medicina'];

$disponiblidad_libros = "SELECT l.id_libro AS id_libro , c.categoria AS categoria, l.nombre AS nombre,                                 l.num_ejemplares AS num_ejemplares
                        FROM libro l
                        INNER JOIN categoria c
                        on l.fo_categoria = c.id_categoria
                        WHERE l.estado = 1
                        ";


$libro_buscado = isset($_GET['nombre']) ?$_GET['nombre'] : '';
$libro_lista = explode(' ', $libro_buscado);

$arreglo = array();


$l = 0;

foreach($libro_lista as $libro_busca)
{
    $disponiblidad_libros .=" AND nombre LIKE :search{$l}";
    $arreglo[":search{$l}"] = '%' . $libro_busca . '%';
    $l++;
}

//CONTEO PARA LA GENERACION DE LAS PAGINAS
$sentencia_conteo = $pdo->prepare($disponiblidad_libros);
$sentencia_conteo->execute($arreglo);
$resultado_sin_paginar = COUNT($sentencia_conteo->fetchAll());

$filas_a_mostrar = 10;

$total_paginas_a_mostrar = ceil($resultado_sin_paginar/$filas_a_mostrar);

$pagina_actual = isset($_GET['page']) ? $_GET['page'] : 0; 

$parametro_pagina_sql = $pagina_actual * $filas_a_mostrar;
$disponiblidad_libros .= " LIMIT {$parametro_pagina_sql},{$filas_a_mostrar}";
$disponibilidad=$pdo->prepare($disponiblidad_libros);
$disponibilidad->execute($arreglo);
$resultado = $disponibilidad->fetchAll();



$prestamos = 'SELECT P.id_prestamos AS Id_prestamo, U.id_usuario AS Id_usuario ,L.nombre AS Nombre_Libro,
                P.fecha_pres AS Fecha_Prestamo, P.fecha_venc AS Fecha_Vencimiento 
                FROM prestamos AS P
                INNER JOIN usuario AS U
                ON P.fo_usuario = U.id_usuario
                INNER JOIN libro AS L
                ON P.fo_libro = L.id_libro
                WHERE P.estado = 1';


$libro_p_buscado = isset($_GET['Nombre_Libro']) ?$_GET['Nombre_Libro'] : '';
$libro_p_lista = explode(' ', $libro_p_buscado);

$arreglo_1 = array();


$l = 0;

foreach($libro_p_lista as $libro_p_busca)
{
    $prestamos .=" AND L.nombre LIKE :search{$l}";
    $arreglo_1[":search{$l}"] = '%' . $libro_p_busca . '%';
    $l++;
}

//CONTEO PARA LA GENERACION DE LAS PAGINAS
$sentencia_conteo = $pdo->prepare($prestamos);
$sentencia_conteo->execute($arreglo_1);
$resultado_sin_paginar = COUNT($sentencia_conteo->fetchAll());

$filas_a_mostrar = 10;

$total_paginas_a_mostrar = ceil($resultado_sin_paginar/$filas_a_mostrar);

$pagina_actual = isset($_GET['page']) ? $_GET['page'] : 0; 

$parametro_pagina_sql = $pagina_actual * $filas_a_mostrar;
$prestamos .= " LIMIT {$parametro_pagina_sql},{$filas_a_mostrar}";
$prestamos_actuales=$pdo->prepare($prestamos);
$prestamos_actuales->execute($arreglo_1);
$resultado_p = $prestamos_actuales->fetchAll();


$fecha = date('Y-m-d');
$dia_ant = strtotime($fecha."- 1 days");

?>
</pre>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BiblioFacil | Disponibilidad</title>
        <link rel="stylesheet" href="fonts/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/hojaEstilos_disponibilidad.css">
        <script src="js/jquery-3.5.1.js"></script> 
    </head>
    
    <body>
  
        <header>
            <h1>BIBLIOFÁCIL</h1>
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
         
        <section>
            <div class="div1">
                <table class="table1">
                   <thead>
                    <tr id="titulo_t1">
                        <th>Categoría</th><th>Prestados</th><th>Disponibles</th><th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Ciencias</td>
                        <td><?php echo $total_p_ciencias ?></td>
                        <td><?php echo $total_d_ciencias ?></td>
                        <td><?php echo $total_ciencias ?></td>
                    </tr>
                    <tr >
                        <td>Deportes</td>
                        <td><?php echo $total_p_deportes ?></td>
                        <td><?php echo $total_d_deportes ?></td>
                        <td><?php echo $total_deportes ?></td>
                    </tr>
                    <tr>
                        <td>Investigación</td>
                        <td><?php echo $total_p_investigacion ?></td>
                        <td><?php echo $total_d_investigacion ?></td>
                        <td><?php echo $total_investigacion ?></td>
                    </tr>
                    <tr>
                        <td>Lenguas</td>
                        <td><?php echo $total_p_lenguas ?></td>
                        <td><?php echo $total_d_lenguas ?></td>
                        <td><?php echo $total_lenguas ?></td>
                    </tr>
                    <tr>
                        <td>Literatura</td>
                        <td><?php echo $total_p_literatura ?></td>
                        <td><?php echo $total_d_literatura ?></td>
                        <td><?php echo $total_literatura ?></td>
                    </tr>
                    <tr>
                        <td>Matemáticas</td>
                        <td><?php echo $total_p_matematicas ?></td>
                        <td><?php echo $total_d_matematicas ?></td>
                        <td><?php echo $total_matematicas ?></td>
                    </tr>
                    <tr>
                        <td>Tecnología</td>
                        <td><?php echo $total_p_tecnologias ?></td>
                        <td><?php echo $total_d_tecnologias ?></td>
                        <td><?php echo $total_tecnologias ?></td>
                    </tr>
                    <tr>
                        <td>Médicina</td>
                        <td><?php echo $total_p_medicina ?></td>
                        <td><?php echo $total_d_medicina ?></td>
                        <td><?php echo $total_medicina ?></td>
                    </tr>
                    
                    </tbody>
                </table>
                
                <div class="buscar" >
                    <!--<h3>Libros</h3>-->
                    <form id="buscar_form" method="get">
                        <label for="">
                        <input id="buscar_caja" type="text" name = "nombre" placeholder = "Ej: Matématicas" value = "<?php echo $libro_busca; ?>">
                        <input id="buscar_envio" type="submit" name:= "buscar"  value="Buscar">
                        </label>
                    </form>
                    <table class="table2">
                        <thead>
                           <tr id="titulo_t2">
                                <th>Id</th><th>Categoria</th><th>Nombre</th><th>Disponibles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($resultado as $rs)
                                {  
                            ?>
                                    <tr>
                                        <td><?php echo $rs['id_libro']; ?></td>
                                        <td><?php echo $rs['categoria']; ?></td>
                                        <td><?php echo $rs['nombre']; ?></td>
                                        <td><?php echo $rs['num_ejemplares']; ?></td>
                                    </tr>

                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <div id="boton_paginado_1">
                        <?php
                            for($i = 1; $i <= $total_paginas_a_mostrar; $i++ )
                                { 
                        ?>
                            <li id="li" >
                                <a id="paginado_1"  href="disponibilidad.php?page=<?php echo $i-1;?>" aria-label="page <?php echo $i;?>"> 
                                    <?php echo $i;?> 
                                </a>
                            </li>
                        <?php
                                }

                        ?>
                    </div>
                </div> 
                <div class="buscar" >
                    <!--<h3>Libros</h3>-->
                    <form id="buscar_form_1" method="get">
                        <label for="">
                        <input id="buscar_caja_1" type="text" name = "Nombre_Libro" placeholder = "Ej: Quimica" value = "<?php echo $libro_p_busca; ?>">
                        <input id="buscar_envio_1" type="submit" name:= "buscar"  value="Buscar">
                        </label>
                    </form>
                    <table class="table2">
                        <thead>
                           <tr id="titulo_t2">
                                <th>Id Prestamo</th><th>Id Usuario</th><th>Nombre Libro</th>
                                <th>Fecha Prestamo</th><th>Fecha Vencimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($resultado_p as $rs_p)
                                {  
                            ?>
                                    <tr>
                                        <td><?php echo $rs_p['Id_prestamo']; ?></td>
                                        <td><?php echo $rs_p['Id_usuario']; ?></td>
                                        <td><?php echo $rs_p['Nombre_Libro']; ?></td>
                                        <td><?php echo $rs_p['Fecha_Prestamo']; ?></td>
                                        <td><?php echo $rs_p['Fecha_Vencimiento']; ?></td>
                                    </tr>

                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <div id="boton_paginado">
                        <?php
                            for($i = 1; $i <= $total_paginas_a_mostrar; $i++ )
                                { 
                        ?>
                            <li id="li_1" >
                                <a id="paginado"  href="disponibilidad.php?page=<?php echo $i-1;?>" aria-label="page <?php echo $i;?>"> 
                                    <?php echo $i;?> 
                                </a>
                            </li>
                        <?php
                                }

                        ?>
                    </div>
                    <div class="form_edita">
                    <form method="post"  id="formulario" class="form">    
                    <table>

                        <tr>
                            <td><b>Id Prestamo:</b></td>
                            <td><label for="id_usuario"></label>
                            <input type="number" name="id_prestamos" value = "<?php echo $row['id_usuario']; ?>" id="id_prestamos"></td>
                        </tr>   
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>Fecha Inicio:</b></td>
                            <td><label for="fecha_entrega"></label>
                            <input type="date" name="fecha_entrega" step="1" min="<?php echo $dia_ant;?>" max="<?php echo $fecha;?>" value ="Fecha Entrega" id="fecha_entrega" required>*</td>


                        </tr>
                    </table>
                    <input type="submit" id="actualizar" value="Entregar">
                    <script src="js/EntregaLibro.js"></script>  
                    </form> 
                    <button id="muestra" onclick="muestraFormulario()">Entregar</button>
                </div>
                </div>   
            </div> 
        </section>  
                
        <footer class="footer" >
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