<?php
require_once("controllers/frontcontroller.php");
$home = new front();
$res = $home->listar();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Movilbox noticias</title>

    <!-- Bootstrap core CSS -->
    <link href="vendors/noticias/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="vendors/noticias/css/small-business.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Movilbox</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home
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

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h1 class="display-3">Bienvenidos Movilbox</h1>
        <p class="lead">Lista de noticias</p>
    </header>
    <?php if (isset($_SESSION['errornoticias']) && !empty($_SESSION['errornoticias'])){ ?>
        <div th:if="${param.error}" class="alert alert-danger" role="alert">
            <?php echo $_SESSION['errornoticias']; unset( $_SESSION["errornoticias"] ); ?>
        </div>
    <?php } ?>
    <!-- Content Row -->
    <div class="row">
        <?php if (isset($res) && !empty($res)) { foreach ($res as $detalles) {?>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div style="text-align: center;" class="card-title"><h2 class="card-title"><?php echo $detalles["titulo"] ?></h2></div>
                    <div class="card-body">
                        <img style="width: 90%" src="images/noticias/<?php echo $detalles["titulo"] ?>/<?php echo $detalles["imagen_portada"] ?>">
                        <p class="card-text"><?php echo $detalles["descripcion"] ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="./ver?id=<?php echo $detalles["id"] ?>" class="btn btn-primary btn-sm">Leer más</a>
                    </div>
                </div>
            </div>
        <?php } } ?>

        <!-- /.col-md-4 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
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
