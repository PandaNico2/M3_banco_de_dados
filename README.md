# M3 banco de dados

Projeto CRUD para uma biblioteca particular

## Descrição

Este é um projeto de sistema CRUD (Create, Read, Update, Delete) para uma biblioteca. O sistema permite a gestão de livros, autores, usuários e empréstimos. Ele é desenvolvido em php e MySql.

## Funcionalidades

- Adicionar, visualizar, atualizar e excluir livros.
- Gerenciar autores, incluindo adição, visualização, atualização e exclusão.
- Registrar e acompanhar empréstimos de livros.
- Manter um catálogo atualizado.

## Requisitos
Para executar este projeto, você precisará instalar o seguinte software:

- [XAMPP](https://www.apachefriends.org/pt_br/index.html): Um pacote contendo Apache, MySQL, PHP e Perl.
- [MySQL Workbench](https://www.mysql.com/products/workbench/): Uma ferramenta gráfica para modelagem, desenvolvimento e administração de banco de dados MySQL.


## Instalação

1. Clone o repositório: `git clone https://github.com/PandaNico2/m3_banco_de_dados.git`
3. Acesse o diretório do projeto: `m3_banco_de_dados`
2. Inicie o Apache e o MySQL no xampp
4. Crie o banco de dados no MySQL Workbench (codigos diponiveis abaixo)

## Banco de dados
CREATE SCHEMA `biblioteca` ;

-- CRIAR TABELAS
--  AUTORES 
CREATE TABLE `autores` (
  `id_autores` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `nacionalidade` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`id_autores`)
);

--  CLASSIFICACAO 
CREATE TABLE `classificacao` (
  `id_classificacao` int NOT NULL AUTO_INCREMENT,
  `num_estrelas` int NOT NULL,
  PRIMARY KEY (`id_classificacao`)
); 

--  EDITORA 
CREATE TABLE `editora` (
  `id_editora` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `localizacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_editora`)
);

--  GENERO 
CREATE TABLE `genero` (
  `id_genero` int NOT NULL AUTO_INCREMENT,
  `genero` varchar(100) NOT NULL,
  PRIMARY KEY (`id_genero`)
); 

--  IDIOMA 
CREATE TABLE `idioma` (
  `id_idioma` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_idioma`)
); 

--  LEITOR 
CREATE TABLE `leitor` (
  `id_leitor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(150) NOT NULL,
  PRIMARY KEY (`id_leitor`)
); 

--  PALAVRA_CHAVE 
CREATE TABLE `palavra_chave` (
  `id_palavra_chave` int NOT NULL AUTO_INCREMENT,
  `palavra` varchar(100) NOT NULL,
  PRIMARY KEY (`id_palavra_chave`)
);


--  STATUS 
CREATE TABLE `status` (
  `id_status` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status`)
); 

--  LIVRO 
CREATE TABLE `livro` (
  `id_livro` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `ano_publicacao` int NOT NULL,
  `isbn` int NOT NULL,
  `numero_paginas` int NOT NULL,
  `sinopse` varchar(500) NOT NULL,
  `livro_id_genero` int NOT NULL,
  `livro_id_editora` int NOT NULL,
  `livro_id_idioma` int NOT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `livro_id_genero_idx` (`livro_id_genero`),
  KEY `livro_id_idioma_idx` (`livro_id_idioma`),
  KEY `livro_id_editora_idx` (`livro_id_editora`)
);

--  LIVRO_PALAVRACHAVE 
CREATE TABLE `livro_palavrachave` (
  `id_livro_palavraChave` int NOT NULL,
  `id_palavraChave_livro` int NOT NULL,
  KEY `id_livro_idx` (`id_livro_palavraChave`),
  KEY `id_palavraChave_idx` (`id_palavraChave_livro`)
);
--  EMPRESTIMO 
CREATE TABLE `emprestimo` (
  `id_emprestimo` int NOT NULL AUTO_INCREMENT,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date DEFAULT NULL,
  `emprestimo_id_livro` int NOT NULL,
  `emprestimo_id_leitor` int NOT NULL,
  `emprestimo_id_status` int NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `emprestimo_id_livro_idx` (`emprestimo_id_livro`),
  KEY `emprestimo_id_leitor_idx` (`emprestimo_id_leitor`),
  KEY `emprestimo_id_status_idx` (`emprestimo_id_status`)
);
--  AUTOR_LIVRO 
CREATE TABLE `autor_livro` (
  `id_autor_livro` int NOT NULL,
  `id_livro_autor` int NOT NULL,
  KEY `id_autor_idx` (`id_autor_livro`),
  KEY `id_livro_idx` (`id_livro_autor`)
);
--  AVALIACAO 
CREATE TABLE `avaliacao` (
  `id_avaliacao` int NOT NULL AUTO_INCREMENT,
  `comentario` varchar(200) NOT NULL,
  `data_comentario` date NOT NULL,
  `avaliacao_id_livro` int NOT NULL,
  `avaliacao_id_leitor` int NOT NULL,
  `avaliacao_id_classificacao` int DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`),
  KEY `avaliacao_id_livro_idx` (`avaliacao_id_livro`),
  KEY `avaliacao_id_leitor_idx` (`avaliacao_id_leitor`),
  KEY `avaliacao_id_classificacao_idx` (`avaliacao_id_classificacao`)
);


-- ALTERAR TABELAS
--  LIVRO 
ALTER TABLE `livro`
ADD CONSTRAINT `livro_id_editora` FOREIGN KEY (`livro_id_editora`) REFERENCES `editora` (`id_editora`),
ADD CONSTRAINT `livro_id_genero` FOREIGN KEY (`livro_id_genero`) REFERENCES `genero` (`id_genero`),
ADD CONSTRAINT `livro_id_idioma` FOREIGN KEY (`livro_id_idioma`) REFERENCES `idioma` (`id_idioma`);

-- LIVRO_PALAVRACHAVE
ALTER TABLE `livro_palavrachave`
  ADD CONSTRAINT `fk_livro_palavrachave_livro`
  FOREIGN KEY (`id_livro_palavraChave`)
  REFERENCES `livro` (`id_livro`);

ALTER TABLE `livro_palavrachave`
  ADD CONSTRAINT `fk_livro_palavrachave_palavra_chave`
  FOREIGN KEY (`id_palavraChave_livro`)
  REFERENCES `palavra_chave` (`id_palavra_chave`);

-- EMPRESTIMO
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_emprestimo_id_leitor`
  FOREIGN KEY (`emprestimo_id_leitor`) REFERENCES `leitor` (`id_leitor`);

ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_emprestimo_id_livro`
  FOREIGN KEY (`emprestimo_id_livro`) REFERENCES `livro` (`id_livro`);

ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_emprestimo_id_status`
  FOREIGN KEY (`emprestimo_id_status`) REFERENCES `status` (`id_status`);
-- AUTOR_LIVRO
ALTER TABLE `autor_livro`
ADD CONSTRAINT `fk_id_autor_livro`
FOREIGN KEY (`id_autor_livro`)
REFERENCES `autores` (`id_autores`);

ALTER TABLE `autor_livro`
ADD CONSTRAINT `fk_id_livro_autor`
FOREIGN KEY (`id_livro_autor`)
REFERENCES `livro` (`id_livro`)
ON DELETE RESTRICT
ON UPDATE RESTRICT;

-- AVALIACAO
-- Add foreign key to 'classificacao' table
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_id_classificacao` FOREIGN KEY (`avaliacao_id_classificacao`) REFERENCES `classificacao` (`id_classificacao`);

-- Add foreign key to 'leitor' table
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_id_leitor` FOREIGN KEY (`avaliacao_id_leitor`) REFERENCES `leitor` (`id_leitor`);

-- Add foreign key to 'livro' table
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_id_livro` FOREIGN KEY (`avaliacao_id_livro`) REFERENCES `livro` (`id_livro`);


## Configuração

1. Abra o MySQL Workbench:
- Certifique-se de que o servidor MySQL esteja em execução.

2. Conecte-se ao Servidor MySQL:
- Na tela inicial, clique em "Local Instance MySQL" para se conectar ao servidor local. Você pode precisar inserir a senha do usuário root.

3. Verifique as Configurações do Servidor MySQL:
- No MySQL Workbench, vá para a aba "Home".
- Verifique as informações do servidor, como endereço IP, porta, usuário (geralmente "root") e senha.

4. Atualize o Código PHP:
- Abra o arquivo PHP onde está o código de conexão ao banco de dados.
- Verifique se as informações de conexão no código PHP (como $servername, $username, $password e $database) correspondem às informações do seu servidor MySQL.
