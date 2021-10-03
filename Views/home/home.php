<div class="container topo">
  <div class="form-control">
    <div class="tamanhoDoIcone">
      <img src="midias/ICONE.ico" alt="ICONE">
        <h1>Gerenciador</h1>
    </div>
    <div class="row">
      <p class="col-md-6 col-12">
        A pandemia de COVID-19 decorre de uma doença respiratória causada pelo coronavírus da síndrome respiratória aguda grave. Em 20 de janeiro de 2020, a Organização Mundial da Saúde classificou o surto como Emergência de Saúde Pública de âmbito Internacional e, em 11 de março de 2020, como pandemia.
      </p>
      <p class="col-md-6 col-12">
        A fim de auxiliar na gestão da imunização do nosso país, considerando a esfera nacional, esta é uma aplicação feita para tentar solucionar este problema.
      </p>
    </div>
    <div class="d-flex justify-content-evenly row">
      <button type="button" class="btn btn-primary col-5 m-3" data-bs-toggle="modal" data-bs-target="#cadastrar">Cadastrar-se</button>
      <button type="button" class="btn btn-primary col-5 m-3" data-bs-toggle="modal" data-bs-target="#logar">Logar</button>
    </div>
  </div>
</div>
<!-- Modal login -->
<div class="modal fade" id="logar" tabindex="-1" aria-labelledby="logarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logarLabel">Logar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Home/index" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Endereco de Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail.</div>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal cadastro -->
<div class="modal fade" id="cadastrar" tabindex="-1" aria-labelledby="cadastrarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarLabel">Cadastrar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Home/index" method="POST">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Endereco de Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail.</div>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Confirmar senha</label>
            <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha">
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>