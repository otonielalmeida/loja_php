<?php
/* header("Access-Control-Allow-Origin: *"); header("Access-Control-Allow-Headers: *"); */
include "./DBcontroller.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = database::execSQL("SELECT * FROM fabricante WHERE id = $id");
    /* $result = json_encode($result); */

    return $result;
}




?>