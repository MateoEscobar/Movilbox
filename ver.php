<?php
if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("controllers/frontcontroller.php");
    $home = new front();
    $res = $home->buscar($_GET["id"]);
    session_start();
    if ($res){
        $datos = $res;
    }else{
        $_SESSION['errornoticias'] = "No se encuentra esta noticia o fue eliminada";
        header("location: ./index");
    }
}else{

    $_SESSION['errornoticias'] = "¡¡Falta el parametro id o esta vacio!!";
    header("location: ./index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Noticia </title>

    <!-- Bootstrap core CSS -->
    <link href="vendors/noticias/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="vendors/noticias/css/shop-item.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Movilbox noticias</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/login/index">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Palabras clave: </h1>
            <div class="list-group">
                <a href="#" class="list-group-item active"><?php print $datos[0]["palabras_clave"]; ?></a>
                <br>
                <a href="./" class="list-group-item active btn-danger">Volver</a>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">
                <img style="width: 100%; height: 300px;" class="card-img-top img-fluid" src="images/noticias/<?php echo $datos[0]["titulo"] ?>/<?php echo $datos[0]["imagen_portada"] ?>" alt="">
                <div class="card-body">
                    <h3 class="card-title"><?php print $datos[0]["titulo"]; ?></h3>
                    <h4><?php print $datos[0]["Fecha_ingreso"]; ?></h4>
                    <p class="card-text"><?php print $datos[0]["descripcion"]; ?></p>
                    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
                    5.0 Estrellas
                </div>
            </div>
            <!-- /.card -->

            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<footer style="margin-top: 15px;" class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Mateo Escobar &copy; 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendors/noticias/vendor/jquery/jquery.min.js"></script>
<script src="vendors/noticias/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
