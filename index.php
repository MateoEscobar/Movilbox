<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>PlasticSkin Login</title>
    <link rel="icon" type="image/png" href="./vendors/img/favicon.png" />
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="./vendors/static/css/index.css" th:href="@{/css/index.css}">
    <script>
        function registrarse(nombre) {
            if (nombre == "registrarse"){
                document.getElementById('iniciarsesionformulario').style.display = 'none';
                document.getElementById('registraseformulario').style.display = 'block';
            }else{
                document.getElementById('iniciarsesionformulario').style.display = 'block';
                document.getElementById('registraseformulario').style.display = 'none';
            }
        }
    </script>
</head>
<body>
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div id="iniciarsesionformulario" name="iniciarsesionformulario" class="modal-content">
            <div class="col-12 user-img">
                <img src="./vendors/static/img/user.png" th:src="@{/img/user.png}"/>
            </div>
            <form action="database/ingresar.php" class="col-12" method="post">
                <div class="form-group" id="user-group">
                    <input required type="text" class="form-control" placeholder="Nombre de usuario" name="email"/>
                </div>
                <div class="form-group" id="contrasena-group">
                    <input required type="password" class="form-control" placeholder="Contrasena" name="password"/>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                <a style="color: white;" id="registrarse" name="registrarse" onclick="registrarse(this.name);" type="button" class="btn btn-info"><i class="fas fa-user-plus"></i>  Registrarse </a>
            </form>
            <div class="col-12 forgot">
                <a href="#">Recordar contrasena?</a>
            </div>
            <?php if (isset($_GET['error']) && !empty($_GET['error'])){ ?>
                <div th:if="${param.error}" class="alert alert-danger" role="alert">
                    <?php echo str_replace('-', ' ', $_GET['error']); ?>
                </div>
            <?php } if (isset($_GET['success']) && !empty($_GET['success'])){?>
                <div th:if="${param.logout}" class="alert alert-success" role="alert">
                    <?php echo str_replace('-', ' ', $_GET['success']); ?>
                </div>
            <?php } ?>
        </div>
        <div id="registraseformulario" name="registraseformulario" class="modal-content" style="display: none;">
            <div class="col-12 user-img">
                <img src="./vendors/static/img/user.png" th:src="@{/img/user.png}"/>
            </div>
            <form action="database/registrarse.php" class="col-12" method="post">
                <div class="form-group" id="address-card-o-group">
                    <input required type="text" class="form-control" placeholder="Nombre de usuario" name="username"/>
                </div>
                <div class="form-group" id="mail-group">
                    <input required type="email" class="form-control" placeholder="Correo" name="correo"/>
                </div>
                <div class="form-group" id="contrasena-group">
                    <input required type="password" class="form-control" placeholder="Contrasena" name="password"/>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i>  Registrarse </button>
                <a style="color: white;" id="iniciarsesion" name="iniciarsesion" onclick="registrarse(this.name);" type="button" class="btn btn-danger"><i class="fas fa-sign-in-alt"></i>  Iniciar sesión </a>
            </form>
        </div>
    </div>
</div>
<footer style="color: white; text-align: center;">&copy; Copyright 2020 <a style="color: white;" href="https://www.facebook.com/Matheito.lds" target="_blank">Mateo Escobar</a></footer>
</body>
</html>
