const fab_cat_option = document.querySelectorAll(".fab_cat_option");
const fab_option = document.querySelectorAll(".fab_option");
const fab_select = document.querySelector(".fab_select");
const fab_select_1 = document.querySelector(".fab_select1");
const update_btn = document.querySelector("#update_btn");

const input_nome = document.querySelector("#input_nome");
const input_fab = document.querySelector("#input_fab");
const input_cat = document.querySelector("#input_cat");
const input_preco = document.querySelector("#input_preco");
const input_id = document.querySelector("#prod_id");

fab_select.addEventListener("click", function (e) {
  fetch(
    `http://localhost/proj_loja/controller/getProd_cat.php?id=${fab_select.value}`,
    {
      method: "GET",
    }
  )
    .then((response) => response.json())
    .then((data) => loadOptions(data));
});

window.onload = function () {
  fetch(
    `http://localhost/proj_loja/controller/getProd_cat.php?id=${fab_select.value}`,
    {
      method: "GET",
    }
  )
    .then((response) => response.json())
    .then((data) => loadOptions(data));
};

fab_select_1.addEventListener("click", function (e) {
  fetch(
    `http://localhost/proj_loja/controller/getProd_cat.php?id=${fab_select_1.value}`,
    {
      method: "GET",
    }
  )
    .then((response) => response.json())
    .then((data) => loadOptions(data));
});

update_btn.addEventListener("click", function (e) {
  fetch(`http://localhost/proj_loja/controller/updateProd.php`, {
    method: "POST",
    dataType: "json",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      id: input_id.value,
      produto_nome: input_nome.value,
      fab_id: input_fab.value,
      fab_cat: input_cat.value,
      preco: input_preco.value,
    }),
  });
});

function loadOptions(data) {
  /*   for (var i = 0; i < fab_cat_option.length; i++) { */
  fab_cat_option[0].innerHTML = data[0].categoria_1;
  fab_cat_option[1].innerHTML = data[0].categoria_2;
  fab_cat_option[2].innerHTML = data[0].categoria_3;
  fab_cat_option[3].innerHTML = data[0].categoria_1;
  fab_cat_option[4].innerHTML = data[0].categoria_2;
  fab_cat_option[5].innerHTML = data[0].categoria_3;
  /*   } */
}
