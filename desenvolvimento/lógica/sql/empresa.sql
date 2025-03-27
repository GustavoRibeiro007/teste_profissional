CREATE DATABASE empresa;

USE empresa;

CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(50) NOT NULL,
    salario_atual DECIMAL(10, 2) NOT NULL,
    salario_anterior DECIMAL(10, 2) NOT NULL
);

INSERT INTO funcionarios (nome, cargo, salario_atual, salario_anterior) VALUES
('Maria Aparecida', 'Copeira', 1000, 988),
('Jose Benedito', 'Porteiro', 1250, 1117),
('Joao Pedro', 'Analista', 1754, 1500),
('Joaquina Maria', 'Diretor', 3400, 3000),
('Ana Rosa', 'Operador', 2100, 1800),
('Benedito Pedro', 'Auxiliar', 1000, 980);