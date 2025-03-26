<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste_profissional";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT * FROM funcionarios");
    $funcionarios = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($funcionarios);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $salario_atual = $_POST['salario_atual'];
    $salario_anterior = $_POST['salario_anterior'];

    $stmt = $conn->prepare("INSERT INTO funcionarios (nome, cargo, salario_atual, salario_anterior) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $nome, $cargo, $salario_atual, $salario_anterior);
    $stmt->execute();
    echo "Funcionário cadastrado com sucesso!";
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $percentual = $_PUT['percentual'];
    $bonus = $_PUT['bonus'];

    $conn->query("UPDATE funcionarios SET salario_anterior = salario_atual, salario_atual = salario_atual * (1 + $percentual / 100) + $bonus WHERE salario_atual < 1500");
    $conn->query("UPDATE funcionarios SET salario_anterior = salario_atual, salario_atual = salario_atual * (1 + $percentual / 100) WHERE salario_atual >= 1500");
    echo "Correção aplicada com sucesso!";
}

$conn->close();
?>