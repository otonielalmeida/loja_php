<?php
include "includes/db.php";
include "includes/header.php";
?>


<!-- FABRICANTE -->
<?php
if (isset($_POST['fabricante_add'])) {
    $fabricante_nome = $_POST['fabricante_nome'];
    $fabricante_cat_1 = $_POST['cat_1'];
    $fabricante_cat_2 = $_POST['cat_2'];
    $fabricante_cat_3 = $_POST['cat_3'];

    $query = "INSERT INTO fabricante(nome, categoria_1, categoria_2, categoria_3) ";
    $query .= "VALUES('$fabricante_nome', '$fabricante_cat_1', '$fabricante_cat_2', '$fabricante_cat_3')";
    $create_fabricante_query = mysqli_query($connection, $query);
    if (!$create_fabricante_query) {
        die("query failed" . mysqli_error($connection));
    }
}
?>

<div class="container  d-flex justify-content-between">
    <div class="bg-white w-50 m-3">
        <h3 class=" mt-2" style="color: rgb(4, 39, 105)">FABRICANTE E CATEGORIA</h3>

        <form method="post">
            <p class="mt-2  m-1" style="color: rgb(4, 39, 105)">FABRICANTE</p>
            <input class="w-100 form-control" name="fabricante_nome" type="text"
                placeholder="Digite o nome do fabricante">
            <p class=" m-1" style="color: rgb(4, 39, 105)">CATEGORIA</p>
            <input class="w-100 m-1 form-control" name="cat_1" type="text" placeholder="Digite o nome da categoria 1">
            <input class="w-100 m-1 form-control" name="cat_2" type="text" placeholder="Digite o nome da categoria 2">
            <input class="w-100 m-1 form-control" name="cat_3" type="text" placeholder="Digite o nome da categoria 3">
            <button class="btn mt-2" style="background-color: rgb(4, 39, 105); color:white" name="fabricante_add"
                type="submit">Adicionar</button>
        </form>

    </div>

    <!-- PRODUTO -->
    <?php
if (isset($_POST['produto_add'])) {
    $produto_nome = $_POST['produto_nome'];
    $produto_fabricante = $_POST['produto_fabricante'];
    $produto_categoria = $_POST['produto_categoria'];
    $produto_preco = $_POST['produto_preco'];
    $query = "INSERT INTO produto (nome, categoria, preco, fabricante_id) ";
    $query .= "VALUES('$produto_nome', '$produto_categoria', '$produto_preco', '$produto_fabricante');";
    $create_produto_query = mysqli_query($connection, $query);
    if (!$create_produto_query) {
        die("query failed" . mysqli_error($connection));
    }
}
?>
    <div class=" w-50 m-3">
        <h3 class=" mt-2" style="color: rgb(4, 39, 105)">PRODUTOS</h3>
        <form method="post">
            <p class=" m-1" style="color: rgb(4, 39, 105)">NOME DO PRODUTO</p>
            <input class="w-100 form-control m-1" name="produto_nome" type="text"
                placeholder="Digite o nome do produto">
            <p class=" m-1" style="color: rgb(4, 39, 105)">FABRICANTE</p>
            <select class=" m-1  custom-select" for="produto_fabricante" name="produto_fabricante">

                <?php
$query = "SELECT * FROM fabricante";
$select_all_fabricante = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_fabricante)) {
    $nome = $row['nome'];
    $id = $row['id'];


    echo "<option value='$id'>$nome</option>";
}
?>
                </option>
            </select>

            <p class=" m-1" style="color: rgb(4, 39, 105)">CATEGORIA</p>
            <select for="produto_categoria" class=" m-1 custom-select" name="produto_categoria">
                <?php

$query = "SELECT * FROM fabricante";
$select_all_categorias = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_categorias)) {
    $cat_1 = $row['categoria_1'];
    $cat_2 = $row['categoria_2'];
    $cat_3 = $row['categoria_3'];
    $nome = $row['nome'];

?>


                <option value="<?php echo $cat_1; ?>">

                    <?php echo "{$nome}: $cat_1"; ?>
                </option>
                <option value="<?php echo $cat_2; ?>">
                    <?php echo "{$nome}: $cat_2"; ?>
                </option>
                <option value="<?php echo $cat_3; ?>">
                    <?php echo "{$nome}: $cat_3"; ?>
                </option>
                <?php
}?>
                ?>

            </select>
            <p class="" style="color: rgb(4, 39, 105)">PREÇO</p>
            <input class="w-100 form-control" name="produto_preco" type="text" placeholder="Digite o preço">
            <button class="btn mt-2" style="background-color: rgb(4, 39, 105); color:white" name="produto_add"
                type="submit">Adicionar</button>
        </form>

    </div>

</div>
<div class='container'>
    <table id="content_Table" class="table table-striped table-hover table-sm" style="width:100%">
        <thead>
            <tr style="color: rgb(4, 39, 105)">
                <td>ID</td>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Categoria</th>
                <th>Preco</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
$query = "SELECT * FROM produto";
$select_all_produto_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_produto_query)) {
    $nome = $row['nome'];
    $id = $row['id'];
    $categoria = $row['categoria'];
    $preco = $row['preco'];
    $id = $row['id'];
    $fabricante_id = $row['fabricante_id'];

    $query = "SELECT nome FROM fabricante WHERE id = $fabricante_id";
    $query_fabricante = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_fabricante)) {
        $nome_fabricante = $row['nome'];
    }
?>


            <tr>
                <td style="color: rgb(4, 39, 105)">
                    <?php echo $id; ?>
                </td>
                <td>
                    <?php echo $nome; ?>

                </td>
                <td>
                    <?php echo $nome_fabricante; ?>
                </td>
                <td>
                    <?php echo $categoria; ?>
                </td>

                <td>
                    <?php echo $preco; ?>
                </td>
                <td>
                    <button class="btn" style="background-color: rgb(4, 39, 105); color:white">Editar Equipes</button>

                </td>
                <td>
                    <a href="index.php?delete=<?php echo $id; ?> ">
                        <button class="btn" style="background-color: rgb(4, 39, 105); color:white">delete

                        </button>
                    </a>
                </td>

            </tr>
            <?php
}?>
        </tbody>

    </table>
</div>

<?php
if (isset($_GET['delete'])) {
    $produto_id = $_GET['delete'];
    $query = "DELETE FROM produto WHERE id = {$produto_id}";
    $delete_query = mysqli_query($connection, $query);
    if (!$delete_query) {
        die("query failed" . mysqli_error($connection));
    }


}
?>


<script src="./DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>


<script>
    setInterval($(document).ready(function () {
        $('#content_Table').DataTable(
            { "width": "100%" }
        );
    }), 10000);


</script>
<?php include "includes/footer.php"; ?>