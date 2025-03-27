<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Cadastro de Funcionários</h1>
    <div class="row">
        <div class="col-md-6">
            <form id="formFuncionario" action="./php/processo.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo" required>
                </div>
                <div class="mb-3">
                    <label for="salario_atual" class="form-label">Salário Atual</label>
                    <input type="number" step="0.01" class="form-control" id="salario_atual" name="salario_atual" required>
                </div>
                <div class="mb-3">
                    <label for="salario_anterior" class="form-label">Salário Anterior</label>
                    <input type="number" step="0.01" class="form-control" id="salario_anterior" name="salario_anterior" required>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Funcionários</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Salário Atual</th>
                        <th>Salário Anterior</th>
                    </tr>
                </thead>
                <tbody id="tabelaFuncionarios">
                </tbody>
            </table>
            <div class="mt-3">
        <button id="btnAplicarCorrecao" class="btn btn-success">Aplicar Correção</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    function carregarFuncionarios() {
        $.ajax({
            url: './php/processo.php',
            method: 'GET',
            data: { action: 'listar' },
            success: function(response) {
                $('#tabelaFuncionarios').html(response); // Atualiza a tabela com os dados retornados
            },
            error: function() {
                alert('Erro ao carregar os funcionários.');
            }
        });
    }

    $('#formFuncionario').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: './php/processo.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#formFuncionario')[0].reset(); // Limpa o formulário
                carregarFuncionarios(); // Atualiza a tabela
                alert(response); // Exibe a mensagem de sucesso ou erro
            },
            error: function() {
                alert('Erro ao cadastrar o funcionário.');
            }
        });
    });

    $('#btnAplicarCorrecao').on('click', function() {
        const porcentagem = prompt('Informe a porcentagem de correção (em %):');
        const bonus = prompt('Informe o valor do bônus (em R$):');

        if (porcentagem && bonus) {
            $.ajax({
                url: './php/processo.php',
                method: 'POST',
                data: {
                    action: 'corrigir',
                    porcentagem: porcentagem,
                    bonus: bonus
                },
                success: function(response) {
                    carregarFuncionarios(); // Atualiza a tabela
                    alert(response); // Exibe a mensagem de sucesso ou erro
                },
                error: function() {
                    alert('Erro ao aplicar a correção.');
                }
            });
        } else {
            alert('Porcentagem e bônus são obrigatórios.');
        }
    });

    carregarFuncionarios(); // Carrega os funcionários ao carregar a página
});
</script>
</body>
</html>