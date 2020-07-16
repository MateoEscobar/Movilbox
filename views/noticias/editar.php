<?php
//instanciamos
require_once("../../controllers/noticiascontroller.php");
// se declara la conexion
$con = new home();
$datos = $con->editar($_GET["id"]);
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="../../vendors/img/favicon.png" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Movilbox - Panel</title>

    <!-- Custom fonts for this template -->
    <link href="../../vendors/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../vendors/public/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../../vendors/public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- editor -->
    <script src="../../vendors/ckeditor/ckeditor.js"></script>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fw fa-tachometer-alt"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Panel <sup>Movilbox</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <div class="sidebar-heading">
            Panel administrativo
        </div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="../home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
            Panel de opciones
        </div>

        <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Noticias</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Acciones :</h6>
                    <a class="collapse-item active">Editar</a>
                    <a class="collapse-item " href="./nuevo">Agregar nueva noticia</a>
                    <a class="collapse-item" href="./">Listar noticias</a>
                </div>
            </div>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php print_r($datosusuario[0]["nombre"]); ?></span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Registro de actividades
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Salir
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Articulos</h1>
                <p class="mb-4">Crear nueva noticia <a href="./" style="color: white;" type="button" class="btn btn-info"><i class="fas fa-list-alt fa-fw"></i> Listar noticias</a></p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Nueva noticia</h6>
                    </div>
                    <?php if (isset($_SESSION['errornoticias']) && !empty($_SESSION['errornoticias'])){ ?>
                        <div th:if="${param.error}" class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['errornoticias']; unset( $_SESSION["errornoticias"] ); ?>
                        </div>
                    <?php } if (isset($_SESSION['successnoticias']) && !empty($_SESSION['successnoticias'])){?>
                        <div th:if="${param.error}" class="alert alert-success" role="alert">
                            <?php echo $_SESSION['successnoticias']; unset( $_SESSION["successnoticias"] );?>
                        </div>
                    <?php } if (isset($_GET["success"]) && !empty($_GET["success"])){?>
                        <div th:if="${param.error}" class="alert alert-success" role="alert">
                            <?php echo str_replace("-", " ", $_GET["success"]);?>
                        </div>
                    <?php } ?>
                    <div class="card-body">
                        <form method="post" id="formularioarticulonuevo" action="./nuevo" enctype="multipart/form-data">
                            <div hidden class="form-group">
                                <label for="inputid">ID</label>
                                <input type="text" class="form-control" id="inputid" name="inputid" aria-describedby="textHelp" value="<?php echo $id?>">
                            </div>
                            <div class="form-group">
                                <label for="inputTitulo">Titulo</label>
                                <input value="<?php print_r($datos[0]["titulo"]); ?>" required type="text" class="form-control" id="inputTitulo" name="inputTitulo" aria-describedby="textHelp" placeholder="Ingrese un titulo">
                            </div>
                            <div class="form-group">
                                <label for="editor1">Descripción</label>
                                <textarea required id="editor1" rows="10" cols="80" required class="form-control name="editor1" >
                                    <?php print_r($datos[0]["descripcion"]); ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputpalabras_clave">Palabras clave</label>
                                <div class="row">
                                    <div class="col">
                                        <input placeholder="Ej: Arte, comida" type="text" class="form-control" id="inputpalabras_clave">
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-info" onclick="agregar()"><i class="fas fa-plus fa-sm"></i> Agregar</button>
                                    </div>
                                </div>
                                <br>
                                <p id="tagsactualizar"> </p>
                                <label>Claves viejas</label>
                                <br>
                                <strong style="color: red;">Al ingresar una clave nueva las claves viejas se borran.</strong>
                                <input value="<?php print_r($datos[0]["palabras_clave"]); ?>" required disabled name="inputpalabras_claveoculto" type="text" class="form-control" id="inputpalabras_claveoculto">
                            </div>
                            <div class="form-group">
                                <label for="Fechanoticia">Fecha creación</label>
                                <input value="<?php print_r($datos[0]["Fecha_ingreso"]); ?>" required type="date" class="form-control" id="Fechanoticia" name="Fechanoticia">
                            </div>
                            <div class="form-group">
                                <label for="imagenportada">Imagen de portada:</label>
                                <input required type="file" class="form-control" id="files" name="files[]">
                                <img src="<?php if (isset($datos[0]["imagen_portada"]) && !empty($datos[0]["imagen_portada"])){ print("../../images/noticias/".$datos[0]["titulo"]."/".$datos[0]["imagen_portada"]); } ?>" id="imagenanterior" name="imagenanterior" style="width: 100px; height: 100px; margin-top: 10px;">
                            </div>
                            <a style="color: white;" class="btn btn-danger" href="../home">Volver</a>
                            <button type="button" onclick="guardar();" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <a href="https://www.facebook.com/Matheito.lds" target="_blank">Mateo Escobar</a> 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="../../db/logout.php">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>
<!-- editor -->
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
    //funcion
    let palabra_clave = [];
    let palabras = "";
    function agregar() {
        let palabra_ingresar = document.getElementById('inputpalabras_clave').value;
        var i=palabra_clave.length;
        var j=palabra_clave.length+1;
        var str = "";
        if (palabra_ingresar != ""){
            for (i; i < j; i++){
                palabra_clave[i] = palabra_ingresar;
                str = "<strong id='"+palabra_clave[i]+"' style='color: #000000'>"+palabra_ingresar+" <i style='color: red' class='fas fa-trash-alt fa-sm' onclick='eliminar("+palabra_ingresar+");'></i>,</strong>";
            }
            document.getElementById('inputpalabras_clave').value = "";
            document.getElementById('tagsactualizar').innerHTML += str;
            palabras += palabra_ingresar+", ";
            document.getElementById('inputpalabras_claveoculto').value = palabras;
        }
    }
    function eliminar(eliminar) {
        let padre = document.getElementById('tagsactualizar');
        let elm = document.getElementById(eliminar.id);
        padre.removeChild(elm);
        palabras = palabras.replace(eliminar.id+",", '');
        document.getElementById('inputpalabras_claveoculto').value = palabras;
    }
    var archivo = document.getElementById('files');
    var file;
    archivo.addEventListener('change',(e)=> {
        file = e.target.files[0];
        var reader = new FileReader();
        if (files) {
            reader.readAsDataURL(file);
            reader.onloadend = function () {
                document.getElementById("imagenanterior").src = reader.result;
            }
        }
    });
    function guardar() {
        var value = CKEDITOR.instances['editor1'].getData()
        var id = document.getElementById('inputid').value;
        var titulo = document.getElementById('inputTitulo').value;
        var palabras_claves = document.getElementById('inputpalabras_claveoculto').value;
        var fecha = document.getElementById('Fechanoticia').value;
        let m = document.getElementById('files').value;
        let e = "";
        //console.log(titulo,palabras_claves,fecha,archivo,value);
        if(value !=="" && titulo !=="" && palabras_claves !=="" && fecha !==""){
            if (m !== "") {
                e = file["name"];
                var formData = new FormData();
                var files = $('#files')[0].files[0];
                var ruta = "" + titulo;
                formData.append('file', files);
                formData.append('ruta', ruta);
                $.ajax({
                    url: 'opciones/upload.php',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response != 0) {
                            $(".card-img-top").attr("src", response);
                        } else {
                            alert('Formato de imagen incorrecto.');
                        }
                    }
                });
            }
            let formulario = new FormData();
            formulario.append('id',id);
            formulario.append('titulo', titulo);
            formulario.append('imagen', e);
            formulario.append('descripcion', value);
            formulario.append('palabras_clave', palabras_claves);
            formulario.append('Fecha_ingreso', fecha);
            $.ajax({
                url: './opciones/editar',
                type: 'post',
                data: formulario,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response) {
                        var parts = window.location.search.substr(1).split("&");
                        var $_GET = {};
                        for (var i = 0; i < parts.length; i++) {
                            var temp = parts[i].split("=");
                            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
                        }
                        var success = "Articulo-actualizado-correctamente.";
                        //window.location.replace("./index");
                        window.location.replace("./editar?id="+$_GET['id']+"&success="+success);
                    } else {
                        alert('Algo ha salido mal.');
                    }
                }
            });

        }else{
            alert("Ingrese todos los datos: Titulo, Descripción, Palabras claves, Fecha y una imagen.");
        }
    }
</script>
<!-- Bootstrap core JavaScript-->
<script src="../../vendors/public/vendor/jquery/jquery.min.js"></script>
<script src="../../vendors/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../vendors/public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../vendors/public/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../vendors/public/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../vendors/public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../vendors/public/js/demo/datatables-demo.js"></script>

<script>
    $('#dataTable').dataTable( {
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
        "pageLength": 5
    } );
    /*$('#dataTable').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });*/
</script>

</body>

</html>
