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
        echo "\n<form action='sistema/imunizados' method='POST'><tr><th scope='row'></th>";
        foreach ($array as $chave => $valor){
            if (substr($chave, -2) == 'id'){
                echo "\n<input type='number' hidden name='$chave' value='$valor'>";
            } else {
                echo "<td>$valor</td>";
            }
        }
        echo "<td><button type='submit' class='btn btn-danger'>Apagar</button></td></tr></form>";
    }
echo "</tbody></table>";
}
