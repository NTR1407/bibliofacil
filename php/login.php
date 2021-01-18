<?php

$usuario = $_POST['email'];
$contrasena = $_POST['password'];

//conexion a la base de datos

$conexion = mysqli_connect("localhost","root", "", "bibliofacil");
$consulta = "SELECT * FROM administrador WHERE email = '$usuario' AND clave = '$contrasena'";
$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_num_rows($resultado);


if($filas > 0){
    
    session_start();
    $_SESSION['usuario'] = $_POST['email'];
    echo "<script>
        alert('BIBLIOFACÍL: Bienvendio');
        window.location = '../Principal_02.php'
    </script>";
    //header("location:../Principal_02.php");

}else{

    header("location:../index.html");
    
}

mysqli_free_result($resultado);
mysqli_close($conexion);


