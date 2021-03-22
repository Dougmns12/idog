CREATE TABLE Usuario (
  idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  senha VARCHAR(45) NOT NULL
  );

CREATE TABLE Categoria (
  idCategoria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(45) NOT NULL
);

CREATE TABLE Produto(
    idProduto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    imagem VARCHAR(500) NOT NULL,
    preco DECIMAL(45) NOT NULL,
    descricao VARCHAR(1000) NOT NULL,
    idCategoria INT NOT NULL,
    FOREIGN KEY(idCategoria) REFERENCES Categoria(idCategoria)
); 
INSERT INTO Usuario(nome, senha) VALUES('gerente', '1234');