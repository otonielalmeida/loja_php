<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
 -->
<!-- Modal -->
<div id="myModal" class="modal fade w-100" role="dialog" action="">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Modal Header</h4>
      </div>
      <!-- <form method="post"> -->
      <!-- <form method="POST"> -->
      <p class=" m-1" style="color: rgb(4, 39, 105)">NOME DO PRODUTO</p>
      <input class="w-100 form-control m-1" id="input_nome" name="produto_nome" type="text" placeholder="Digite o nome do produto">
      <p class=" m-1" style="color: rgb(4, 39, 105)">FABRICANTE</p>
      <select id="input_fab" class=" m-1  custom-select fab_select" for="produto_fabricante" name="produto_fabricante">

        <?php
        $query = "SELECT * FROM fabricante";
        $select_all_fabricante = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_all_fabricante)) {
          $nome = $row['nome'];
          $id = $row['id'];

          echo "<option class='fab_option' value='$id'>$nome</option>";
        }
        ?>

      </select>

      <p class=" m-1" style="color: rgb(4, 39, 105)">CATEGORIA</p>
      <select id="input_cat" for="produto_categoria" class=" m-1 custom-select" name="produto_categoria">

        <option class="fab_cat_option"></option>
        <option class="fab_cat_option"></option>
        <option class="fab_cat_option"></option>

      </select>

      <p class="" style="color: rgb(4, 39, 105)">PREÇO</p>
      <input id="input_preco" class="w-100 form-control" name="produto_preco" type="text" placeholder="Digite o preço">

      <input id="prod_id" type="hidden" value="">

      <a class="modal_update_link">
        <button class="btn mt-2" id="update_btn" style="background-color: rgb(4, 39, 105); color:white" name="produto_update" type="submit">Atualizar</button>
      </a>
      <!-- </form> -->
      <!-- </form> -->
    </div>
  </div>
</div>