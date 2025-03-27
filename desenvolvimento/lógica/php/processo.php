<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'corrigir') {
        $porcentagem = floatval($_POST['porcentagem']);
        $bonus = floatval($_POST['bonus']);

        $result = $conn->query("SELECT * FROM funcionarios");
        while ($row = $result->fetch_assoc()) {
            $salario_atual = $row['salario_atual'];
            $novo_salario = $salario_atual + ($salario_atual * ($porcentagem / 100));

            if ($salario_atual < 1500) {
                $novo_salario += $bonus;
            }

            $stmt = $conn->prepare("UPDATE funcionarios SET salario_anterior = salario_atual, salario_atual = ? WHERE id = ?");
            $stmt->bind_param("di", $novo_salario, $row['id']);
            $stmt->execute();
        }

        echo "Correção aplicada com sucesso!";
        exit;
    }

    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $salario_atual = $_POST['salario_atual'];
    $salario_anterior = $_POST['salario_anterior'];

    $stmt = $conn->prepare("INSERT INTO funcionarios (nome, cargo, salario_atual, salario_anterior) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $nome, $cargo, $salario_atual, $salario_anterior);

    if ($stmt->execute()) {
        echo "Funcionário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar funcionário: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'listar') {
    $result = $conn->query("SELECT * FROM funcionarios");
    $output = '';
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>
                        <td>{$row['nome']}</td>
                        <td>{$row['cargo']}</td>
                        <td>{$row['salario_atual']}</td>
                        <td>{$row['salario_anterior']}</td>
                    </tr>";
    }
    echo $output;
    exit;
}
?>