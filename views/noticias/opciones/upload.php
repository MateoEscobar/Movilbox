<?php
if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif")) {
    $directorio = "../../../images/noticias/".$_POST['ruta'];
    if (!file_exists($directorio)) { mkdir("$directorio", 0700); }
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $directorio."/".$_FILES['file']['name'])) {
        //more code here...
        echo "$directorio/".$_FILES['file']['name'];
    } else {
        echo 0;
    }
} else {
    echo 0;
}

?>