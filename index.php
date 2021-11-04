<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Bienvenido al sistema</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body class="container">
      <div class="jumbotron text-center">
      <h1>Criadero de Hamster</h1>
      </div>    


 <div class="text-center">
     <div class="fuente1">
        <h2 class="h21">Los Hamsters</h2>
          Los cricetinos (Cricetinae) son una subfamilia de roedores, conocidos comúnmente como hámsteres (un germanismo).<br>
          Se han identificado diecinueve especies actuales, agrupadas en siete géneros. La mayoría son originarias de Oriente Medio y del sureste de los Estados Unidos. Todas las especies se caracterizan por las bolsas expansibles, llamadas abazones, ubicadas en el interior de la boca y que van desde las mejillas hasta los hombros. <br>
          Al ser muy fáciles de criar en cautividad, son ampliamente usados como animales de laboratorio y como mascotas.<br>
        <h2 class="h21">El Sitio Web</h2>
          En este Web-Site usted como Cuidador, podra tener un registro detallado de cada Hamster que tiene a su cargo.<br>
          Sera capaz de registrar su Nombre, Sexo, y fecha de nacimiento. Si algun Hamster es adoptado, se podra modificar su nombre!<br>
          Por ùltimo, podra generar un informe con informacion general sobre su listado de Hamsters.<br><br>
  </div>
</div>

      <div class="text-center">
        <h3 class="h31">Login de Usuario</h3><br><br>
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

        <form action="login.php" method="post">
            <input name="usuario" class="form-control form-control-lg" placeholder="Usuario"><br>
            <input name="clave" type="text" class="form-control form-control-lg" placeholder="Contraseña"><br>
            <input type="submit" value="Ingresar" class="btn btn-primary">
        </form><br>
        <p><button type="button" class="btn btn-light"><a href="create.php">Crear Nuevo Usuario</a></button></p>
      </div> 
    </body>
</html>
