<?php
$_POST = json_decode(file_get_contents('php://input'), true);
header("'Accept': 'application/json', 'Content-Type': 'application/json' ");
include('./DBcontroller.php');


if (isset($_GET['update'])) {
    $id = $_GET['update'];
    echo $id;
}
if (isset($_POST['produto_nome'])) {
    $nome = $_POST['produto_nome'];
    echo $nome;
    $sql = ("INSERT INTO produto (nome, categoria, preco, fabricante_id)
    VALUES ('$nome', 'achocolatado', '10', '5'");
    $connection = dataBase::connection();
    $statement = $connection->prepare($sql);
    $statement->execute();
}
?>

<!-- and (isset($_POST['produto_preco'])) and (isset($_POST['produto_fabricante'])) and
(isset($_POST['produto_categoria']))) -->