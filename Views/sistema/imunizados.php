<h3>Pessoas e suas doses</h3>

<?php

if (isset($vazio)) {
  echo $vazio;
} else {
?>

  <table class="table">
    <thead>
      <tr>
        <th scope="row"></th>
        <th scope="col">Nome</th>
        <th scope="col">Doses</th>
        <th scope="col">Cidades</th>
      </tr>
    </thead>
    <tbody>
<?php

  foreach ($dadosModel as $array){
    echo '<tr><th scope="row"></th>';
    $whatever = new Editar();
    foreach ($array as $chave => $valor){
      echo "<td>" . $valor . "</td>";
      $whatever->whatevers = 'data-bs-whatever'. $chave .'="' . $valor .'" ';
    }
    echo '<td><button type="button" class="btn btn-warning disabled" data-bs-toggle="modal" data-bs-target="#imunizados" '. $whatever->whatevers .' >Editar</button></td></tr>';
  }
echo "</tbody></table>";
}
