<?php
include('conexao.php');

$queryFuncionarios = 'SELECT f.Empresa, f.RE, f.Nome, f.Cargo, f.Status 
                      FROM Func f';

// Prepara e executa a consulta de funcionários
$stmtFuncionarios = $conn->prepare($queryFuncionarios);
$stmtFuncionarios->execute();

$queryCargos = 'SELECT Codigo, Descricao FROM Cargo';
$stmtCargos = $conn->prepare($queryCargos);
$stmtCargos->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários e Cargos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Funcionários e Cargos</h1>

    <h2>Funcionários</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>RE (Registro de Empregado)</th>
                <th>Nome</th>
                <th>Cargo (Código)</th> <!-- Exibe o código do cargo -->
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verifica se a consulta de funcionários retornou dados
            if ($stmtFuncionarios->rowCount() > 0) {
                // Exibe os dados de cada funcionário
                while ($row = $stmtFuncionarios->fetch(PDO::FETCH_ASSOC)) {
                    // Exibe as informações do funcionário e o código do cargo
                    echo "<tr>
                            <td>{$row['Empresa']}</td>
                            <td>{$row['RE']}</td>
                            <td>{$row['Nome']}</td>
                            <td>{$row['Cargo']}</td> <!-- Exibe o código do cargo -->
                            <td>{$row['Status']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Nenhum funcionário encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Cargos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verifica se a consulta de cargos retornou dados
            if ($stmtCargos->rowCount() > 0) {
                // Exibe os dados de cada cargo
                while ($row = $stmtCargos->fetch(PDO::FETCH_ASSOC)) {
                    // Exibe o código e a descrição do cargo
                    echo "<tr>
                            <td>{$row['Codigo']}</td>
                            <td>{$row['Descricao']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='2' class='text-center'>Nenhum cargo encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
