<?php
$_POST = json_decode(file_get_contents('php://input'), true);
header("'Accept': 'application/json', 'Content-Type': 'application/json' ");
include('./DBcontroller.php');


if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $id_updt = $id;
    echo $id;
}

if (isset($_POST['produto_nome'])) {
    $nome = $_POST['produto_nome'];
    $fab_id = $_POST['fab_id'];
    $fab_cat = $_POST['fab_cat'];
    $preco = $_POST['preco'];
    $id = $_POST['id'];

    $sql = ("UPDATE produto 
    SET nome = '$nome', categoria = '$fab_cat', 
    preco = '$preco', fabricante_id = '$fab_id' 
    WHERE id = '$id'");
    
    $connection = dataBase::connection();
    $statement = $connection->prepare($sql);
    $statement->execute();
}
?>

