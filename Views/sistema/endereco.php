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
        <th scope="col">Estado</th>
        <th scope="col">Cidade</th>
        <th scope="col">CEP</th>
        <th scope="col">Numero</th>
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