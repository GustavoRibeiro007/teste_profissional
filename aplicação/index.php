<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gerenciamento de Funcionários</h1>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Salário Atual</th>
                    <th>Salário Anterior</th>
                </tr>
            </thead>
            <tbody id="funcionarios-table">
                <!-- Dados serão carregados via Ajax -->
            </tbody>
        </table>

        <h2 class="mt-5">Cadastrar Funcionário</h2>
        <form id="cadastro-form">
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

        <h2 class="mt-5">Aplicar Correção Salarial</h2>
        <form id="correcao-form">
            <div class="mb-3">
                <label for="percentual" class="form-label">Percentual de Correção (%)</label>
                <input type="number" step="0.01" class="form-control" id="percentual" name="percentual" required>
            </div>
            <div class="mb-3">
                <label for="bonus" class="form-label">Bônus (R$)</label>
                <input type="number" step="0.01" class="form-control" id="bonus" name="bonus" required>
            </div>
            <button type="submit" class="btn btn-success">Aplicar Correção</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>