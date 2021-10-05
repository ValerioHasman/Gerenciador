<?php

if (isset($vazio)) {
  echo $vazio;
} else {
?>

  <table class="table">
    <thead>
      <tr>
        <th scope="row"></th>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Codigo</th>
        <th scope="col">Caixas</th>
        <th scope="col">Unidades</th>
        <th scope="col">Empresa</th>
        <th scope="col">Cidade</th>
      </tr>
    </thead>
    <tbody>
<?php

  foreach ($dadosModel as $array){
    echo '<tr><th scope="row"></th>';
    foreach ($array as $chave => $valor){
      echo "<td>" . $valor . "</td>";
    }
  echo "</tr>";
  }
echo "</tbody></table>";
}