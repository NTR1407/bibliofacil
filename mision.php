<?php
    session_start();
    //if(($_SESSION["password"]) != ''){
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>BiblioFacil | Principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/hojaEstilos_principal_02.css">
    <link rel="stylesheet" href="fonts/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Roboto&display=swap" rel="stylesheet">
    <script src="js/jquery-3.5.1.js"></script> 
</head>

<body>
    <header>
     <h1>BIBLIOFÁCIL</h1>
      <input type="checkbox" id="btn-menu">
      <label for="btn-menu" class="icon-menu"></label>
       <nav class="menu">
           <ul>
               <li ><a href="#">Usuarios </a> 
                   <ul>     
                       <li><a href="creaUsuario.php">Nuevo Usuario</a></li>
                       <li><a href="editaUsuario.php">Editar Usuario</a></li>
                  </ul>                  
               </li>
               <li ><a href="#">Prestamos </a>    
                   <ul>
                       <li><a href="disponibilidad.php">Prestamos actuales</a></li>
                       <li><a href="prestamo.php">Nuevo prestamo</a></li>
                   </ul>
               </li>
               <li ><a href="#">Libros </a> 
                   <ul>
                       <li><a href="nuevoLibro.php">Nuevo Libro</a></li>
                       <li><a href="editarLibro.php">Editar Libro</a></li>
                   </ul>
               </li>
               <li ><a href="#">Tramites </a>             
                   <ul>                      
                       <li><a href="creaMulta.php">Multa</a></li>
                       <li><a href="pazysalvo.php">Paz y Salvo</a></li>
                   </ul>
               </li>
               <li ><a href="#"> &nbsp; <span class = "icon-user"> &nbsp;</span> </a>
                   <ul>
                       <li><a href="ayuda.html">Ayuda</a></li>
                       <li><a href="php/salir.php">Salir</a></li>
                   </ul>
               </li>
             
           </ul>
       </nav>
    </header>
    
    <script src="js/principal_02.js"></script> 
       
    <div>
        <div class="tab">
            
            
            <img id="img" src="imagenes/Escudo-Colegio_1.png" alt="Escudo Colegio">
            
            <h2><span class="icon-history"></span>Nosotros</h2>
            
  
            <a href="Principal_02.php"><h4>Historía</h4></a>



            <a href="mision.php" id="actual"><h4>Misión</h4></a>
            
            <a href="vision.php"><h4>Visión</h4></a>
            
           <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis soluta dolorum aliquam perferendis placeat minima atque, quasi consequuntur aut reiciendis dicta suscipit, necessitatibus officiis aperiam in repudiandae reprehenderit alias earum. Temporibus, officia rerum! Nemo facilis commodi atque enim sequi recusandae debitis, repudiandae at quae laboriosam perferendis aut est sunt suscipit illo culpa vitae blanditiis, autem eius adipisci illum ea quam sed harum. Dolor labore, mollitia tempora beatae excepturi quo. Illo mollitia delectus, maxime, porro sed repellendus voluptatibus non praesentium recusandae quae earum nam. Earum recusandae beatae id consectetur fuga, soluta sunt exercitationem molestias. Et earum laudantium tenetur incidunt assumenda mollitia maiores excepturi sequi vitae, deleniti ut culpa corrupti consectetur ipsa non qui, expedita exercitationem quia. Dolorum sed dolorem nostrum minima voluptatum quibusdam labore. Quisquam itaque ducimus deleniti accusamus aperiam, adipisci laudantium, sapiente quos tenetur voluptas odio nam vero tempora saepe laborum velit animi ad iure distinctio ratione ipsa, ea eaque.
            </p>
        </div>
        <div class="tab">
            <h2><span class="icon-history"></span>Nuestros Valores</h2>
            
            <div class="valores">
                <h4>Compromiso</h4>
                   <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis consectetur sint beatae, maiores voluptas vitae aliquam, voluptates hic officiis a aut ad veniam neque iusto.</p>
            </div>
            
            <div class="valores">
               <h4>Responsabilidad Social</h4>
                   <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis consectetur sint beatae, maiores voluptas vitae aliquam, voluptates hic officiis a aut ad veniam neque iusto.</p>
            </div>
            <div class="valores">
                <h4>Transformación</h4>  
                     <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis consectetur sint beatae,     maiores voluptas vitae aliquam, voluptates hic officiis a aut ad veniam neque iusto.</p>
            </div>
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
