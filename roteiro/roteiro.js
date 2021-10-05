var pessoas = document.getElementById('pessoas')
pessoas.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var pessoasId = button.getAttribute('data-bs-whatever_id')
    var pessoasNome = button.getAttribute('data-bs-whatever_nome')
    var pessoasCpf = button.getAttribute('data-bs-whatever_cpf')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = pessoas.querySelector('.modal-title')
    var pessoasIdInput = pessoas.querySelector('.modal-body #pessoasId')
    var pessoasNomeInput = pessoas.querySelector('.modal-body #pessoasNome')
    var pessoasCpfInput = pessoas.querySelector('.modal-body #pessoasCpf')

    modalTitle.textContent = 'Pessoas'
    pessoasIdInput.value = pessoasId
    pessoasNomeInput.value = pessoasNome
    pessoasCpfInput.value = pessoasCpf
})
var enderecos = document.getElementById('enderecos')
enderecos.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var enderecoId = button.getAttribute('data-bs-whatever_id')
    var enderecoEstado = button.getAttribute('data-bs-whatever_estado')
    var enderecoCidade = button.getAttribute('data-bs-whatever_cidade')
    var enderecoCep = button.getAttribute('data-bs-whatever_cep')
    var enderecoNumero = button.getAttribute('data-bs-whatever_numero')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = enderecos.querySelector('.modal-title')
    var enderecoIdInput = enderecos.querySelector('.modal-body #enderecoId')
    var enderecoEstadoInput = enderecos.querySelector('.modal-body #enderecoEstado')
    var enderecoCidadeInput = enderecos.querySelector('.modal-body #enderecoCidade')
    var enderecoCepInput = enderecos.querySelector('.modal-body #enderecoCep')
    var enderecoNumeroInput = enderecos.querySelector('.modal-body #enderecoNumero')

    modalTitle.textContent = 'Endereços'
    enderecoIdInput.value = enderecoId
    enderecoEstadoInput.value = enderecoEstado
    enderecoCidadeInput.value = enderecoCidade
    enderecoCepInput.value = enderecoCep
    enderecoNumeroInput.value = enderecoNumero
})
var empresas = document.getElementById('empresas')
empresas.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var empresaId = button.getAttribute('data-bs-whatever_id')
    var empresaNome = button.getAttribute('data-bs-whatever_nome')
    var empresaCnpj = button.getAttribute('data-bs-whatever_cnpj')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = empresas.querySelector('.modal-title')
    var empresaIdInput = empresas.querySelector('.modal-body #empresaId')
    var empresaNomeInput = empresas.querySelector('.modal-body #empresaNome')
    var empresaCnpjInput = empresas.querySelector('.modal-body #empresaCnpj')

    modalTitle.textContent = 'Empresas'
    empresaIdInput.value = empresaId
    empresaNomeInput.value = empresaNome
    empresaCnpjInput.value = empresaCnpj
})
var doses = document.getElementById('doses')
doses.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var dosesId = button.getAttribute('data-bs-whatever_id')
    var dosesNome = button.getAttribute('data-bs-whatever_nome')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = doses.querySelector('.modal-title')
    var dosesIdInput = doses.querySelector('.modal-body #dosesId')
    var dosesNomeInput = doses.querySelector('.modal-body #dosesNome')

    modalTitle.textContent = 'Doses'
    dosesIdInput.value = dosesId
    dosesNomeInput.value = dosesNome
})
var lotes = document.getElementById('lotes')
lotes.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var lotesId = button.getAttribute('data-bs-whatever_id')
    var lotesNome = button.getAttribute('data-bs-whatever_nome')
    var lotesCodigo = button.getAttribute('data-bs-whatever_codigo')
    var lotesCaixa = button.getAttribute('data-bs-whatever_numeros_de_caixas')
    var lotesUnidade = button.getAttribute('data-bs-whatever_numeros_de_unidades_por_caixa')
    var lotesEndereco = button.getAttribute('data-bs-whatever_cidade')
    var lotesEmpresa = button.getAttribute('data-bs-whatever_empresa')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = lotes.querySelector('.modal-title')
    var lotesIdInput = lotes.querySelector('.modal-body #lotesId')
    var lotesNomeInput = lotes.querySelector('.modal-body #lotesNome')
    var lotesCodigoInput = lotes.querySelector('.modal-body #lotesCodigo')
    var lotesCaixaInput = lotes.querySelector('.modal-body #lotesCaixa')
    var lotesUnidadeInput = lotes.querySelector('.modal-body #lotesUnidade')
    var lotesEnderecoInput = lotes.querySelector('.modal-body #lotesEndereco')
    var lotesEmpresaInput = lotes.querySelector('.modal-body #lotesEmpresa')

    modalTitle.textContent = 'New message to ' + lotes
    lotesIdInput.value = lotesId
    lotesNomeInput.value = lotesNome
    lotesCodigoInput.value = lotesCodigo
    lotesCaixaInput.value = lotesCaixa
    lotesUnidadeInput.value = lotesUnidade
    lotesEnderecoInput.value = lotesEndereco
    lotesEmpresaInput.value = lotesEmpresa
})
