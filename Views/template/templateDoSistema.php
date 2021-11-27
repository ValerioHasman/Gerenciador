<!DOCTYPE html>
<html lang="pt-br">

<head>
    <base href="<?= $GLOBALS['base'] ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.js">
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.js">
    </script>
    <script defer src="roteiro/roteiro.js"></script>
    <link rel="stylesheet" href="formatar/estilo.css">
    <link rel="shortcut icon" href="midias/ICONE.ico" type="image/x-icon">
    <title>Gerenciador</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="sistema/index">Gerenciador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="sistema/index">Pessoas</a></li>
                    <li class="nav-item"><a class="nav-link" href="sistema/endereco">Enderecos</a></li>
                    <li class="nav-item"><a class="nav-link" href="sistema/empresa">Empresas</a></li>
                    <li class="nav-item"><a class="nav-link" href="sistema/doses">Doses</a></li>
                    <li class="nav-item"><a class="nav-link" href="sistema/imunizados">Imunizados</a></li>
                    <li class="nav-item"><a class="nav-link" href="sistema/lotes">Lotes</a></li>



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inserir
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pessoas">Pessoas</button></li>
                            <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#enderecos">Endereços</button></li>
                            <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#empresas">Empresas</button></li>
                            <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#doses">Doses</button></li>
                            <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#lotes">Lotes</button></li>
                            <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#imunizados">Imunizados</button></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="sistema/sair" class="btn btn-outline-secondary">Sair</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container my-4 bg-white p-3 bg-opacity-25 rounded-3">
    <?php

    $this->carregarViewNoTemplate($nomeView, $dadosModel);

    ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="pessoas" tabindex="-1" aria-labelledby="pessoasLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pessoasLabel">Pessoas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="sistema/index" method="POST">
                        <div class="col-md-6">
                            <label for="pessoasNome" class="form-label">Nome</label>
                            <input type="hidden" id="pessoasId" name="id">
                            <input type="text" class="form-control" name="nome" id="pessoasNome" maxlength="255" required>
                        </div>
                        <div class="col-md-6">
                            <label for="pessoasCpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="pessoasCpf" name="cpf" maxlength="11" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Executar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="enderecos" tabindex="-1" aria-labelledby="enderecosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enderecosLabel">Endereços</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="sistema/endereco" method="POST">
                        <div class="col-md-6">
                            <label for="enderecoEstado" class="form-label">Estado</label>
                            <input type="hidden" id="enderecoId" name="id">
                            <input type="text" class="form-control" id="enderecoEstado" name="estado" maxlength="255" required>
                        </div>
                        <div class="col-md-6">
                            <label for="enderecoCidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="enderecoCidade" name="cidade" maxlength="255" required>
                        </div>
                        <div class="col-md-6">
                            <label for="enderecoCep" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="enderecoCep" name="cep" maxlength="9" required>
                        </div>
                        <div class="col-md-6">
                            <label for="enderecoNumero" class="form-label">Número</label>
                            <input type="text" class="form-control" id="enderecoNumero" name="numero" maxlength="9" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Executar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="empresas" tabindex="-1" aria-labelledby="empresasLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="empresasLabel">Empresas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="sistema/empresa" method="POST">
                        <div class="col-md-6">
                            <label for="empresaNome" class="form-label">Nome</label>
                            <input type="hidden" id="empresaId" name="id">
                            <input type="text" class="form-control" id="empresaNome" name="nome" maxlength="255" required>
                        </div>
                        <div class="col-md-6">
                            <label for="empresaCnpj" class="form-label">CNPJ</label>
                            <input type="text" class="form-control" id="empresaCnpj" name="cnpj" maxlength="18" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Executar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="doses" tabindex="-1" aria-labelledby="dosesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dosesLabel">Doses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="sistema/doses" method="POST">
                        <div class="col-md-6">
                            <label for="dosesNome" class="form-label">Nome</label>
                            <input type="hidden" id="dosesId" name="id">
                            <input type="text" class="form-control" id="dosesNome" name="nome" maxlength="255" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Executar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="lotes" tabindex="-1" aria-labelledby="lotesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lotesLabel">Lotes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="sistema/lotes" method="POST">
                        <div class="col-md-6">
                            <label for="lotesNome" class="form-label">Nome Dose</label>
                            <input type="hidden" id="lotesId" name="id">
                            <input type="number" class="form-control" id="lotesNome" name="nome" maxlength="255" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lotesCodigo" class="form-label">Código</label>
                            <input type="text" class="form-control" id="lotesCodigo" name="codigo" maxlength="255" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lotesCaixa" class="form-label">Numero de caixas</label>
                            <input type="number" class="form-control" id="lotesCaixa" name="caixas" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lotesUnidade" class="form-label">Numero de unidades por caixa</label>
                            <input type="number" class="form-control" id="lotesUnidade" name="unidades" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lotesEndereco" class="form-label">Endereço</label>
                            <input type="number" class="form-control" id="lotesEndereco" name="endereco" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lotesEmpresa" class="form-label">Empresa</label>
                            <input type="number" class="form-control" id="lotesEmpresa" name="empresa" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Executar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="imunizados" tabindex="-1" aria-labelledby="imunizadosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imunizadosLabel">imunizados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="sistema/imunizados" method="POST">
                        <div class="col-md-6">
                            <label for="imunizadosPessoas" class="form-label">Nome</label>
                            <input type="number" class="form-control" id="imunizadosPessoas" name="nome" maxlength="255" required>
                        </div>
                        <div class="col-md-6">
                            <label for="imunizadosDoses" class="form-label">Imunizante</label>
                            <input type="number" class="form-control" id="imunizadosDoses" name="dose" maxlength="255" required>
                        </div>
                        <div class="col-md-6">
                            <label for="imunizadosEndereco" class="form-label">Endereços</label>
                            <input type="number" class="form-control" id="imunizadosEndereco" name="local" maxlength="255" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Executar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>