


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

   















    <div class="form_edita">
        <form method="post" id="formulario" class="form">
            <table>

                <tr>
                    <td><b>Id Usuario:</b></td>
                    <td><label for="id_usuario"></label>
                        <input type="number" name="id_usuario" value="<?php echo $id_usuario ?>" id="id_usuario">
                    </td>

                    <td><b>Nombres:</b></td>
                    <td><label for="nombre"></label>
                        <input type="text" name="nombres" id="nombre">
                    </td>

                    <td><b>Apellidos:</b></td>
                    <td><label for="apellidos"></label>
                        <input type="text" name="apellidos" id="apellidos">
                    </td>
                    <td><b>Tipo Id:</b></td>
                    <td>
                        <label for="Tipo_Id"></label>
                        <select name="tipo_id">
                            <option></option>
                            <option>Tarjeta de identidad</option>
                            <option>Cedula de ciudadania</option>
                            <option>Cedula de extranjeria</option>
                        </select>
                    </td>
                    <td><b>Número Id:</b></td>
                    <td><label for="identificación"></label>
                        <input type="text" name="identificación" id="identificacion">
                    </td>
                    <td><b>T.Usuario:</b></td>
                    <td>
                        <label for="tipo_usuario"></label>
                        <select name="tipo_usuario">
                            <option></option>
                            <option>Estudiante </option>
                            <option>Docente</option>
                            <option>Administrador </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><b>Genero:</b></td>
                    <td><label for="genero"></label>
                        <input type="text" name="genero" id="genero">
                    </td>

                    <td><b>Edad:</b></td>
                    <td><label for="edad"></label>
                        <input type="text" name="edad" id="edad">
                    </td>

                    <td><b>Télefono:</b></td>
                    <td><label for="telefono"></label>
                        <input type="text" name="telefono" id="telefono">
                    </td>

                    <td><b>Correo:</b></td>
                    <td><label for="email"></label>
                        <input type="text" name="email" id="email">
                    </td>

                    <td><b>Dirección:</b></td>
                    <td><label for="direccion"></label>
                        <input type="text" name="dirección" id="direccion">
                    </td>

                    <td><b>Estado:</b></td>
                    <td><label for="estado_usuario"></label>
                        <input type="number" name="estado_usuario" id="estado_usuario">
                    </td>
                </tr>
            </table>
            <input type="submit" id="actualizar" value="Actualizar">
            <script src="js/editaUsuario.js"></script>
        </form>
        <button id="muestra" onclick="muestraFormulario()">Editar</button>
    </div>

</body>

</html>