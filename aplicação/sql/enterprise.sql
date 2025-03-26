CREATE DATABASE IF NOT EXISTS teste_profissional;
USE teste_profissional;

CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(50) NOT NULL,
    salario_atual DECIMAL(10, 2) NOT NULL,
    salario_anterior DECIMAL(10, 2) NOT NULL
);

INSERT INTO funcionarios (nome, cargo, salario_atual, salario_anterior) VALUES
('Maria Aparecida', 'Copeira', 1000.00, 988.00),
('Jose Benedito', 'Porteiro', 1250.00, 1117.00),
('Joao Pedro', 'Analista', 1754.00, 1500.00),
('Joaquina Maria', 'Diretor', 3400.00, 3000.00),
('Ana Rosa', 'Operador', 2100.00, 1800.00),
('Benedito Pedro', 'Auxiliar', 1000.00, 980.00);