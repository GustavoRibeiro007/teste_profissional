
CREATE DATABASE teste_sql;
USE teste_sql;

CREATE TABLE Func (
    Empresa INT NOT NULL,
    RE INT NOT NULL,
    Nome VARCHAR(100) NOT NULL,
    Cargo INT NOT NULL,
    Status CHAR(1) NOT NULL,
    PRIMARY KEY (RE)
);

CREATE TABLE Cargo (
    Codigo INT NOT NULL AUTO_INCREMENT,
    Descricao VARCHAR(100) NOT NULL,
    PRIMARY KEY (Codigo)
);


INSERT INTO Func (Empresa, RE, Nome, Cargo, Status) VALUES
(1, 1245, 'Maria da Silva', 6, 'A'),
(1, 584, 'Benedito Costa', 10, 'A'),
(2, 847, 'Joaquim Barbosa', 3, 'A'),
(1, 54, 'Antonio Pereira', 7, 'D'),
(1, 84, 'Joao Gomes', 9, 'A'),
(2, 658, 'Luis Montanha', 7, 'A'),
(1, 841, 'Isabel Silva', 9, 'D');


INSERT INTO Cargo (Codigo, Descricao) VALUES
(1, 'Jardineiro'),
(2, 'Operador de Produção'),
(3, 'Analista Fiscal'),
(4, 'Auxiliar de escritorio'),
(5, 'Mecanico'),
(6, 'Analista de Sistemas'),
(7, 'Gerente'),
(8, 'Diretor'),
(9, 'Porteiro'),
(10, 'Analista de RH');