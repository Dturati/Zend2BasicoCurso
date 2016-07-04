use livraria;

Select * from categorias;

CREATE TABLE categorias(
	id 		INTEGER AUTO_INCREMENT,
    nome	VARCHAR(200),
    PRIMARY KEY(id)
);

CREATE TABLE livros(
	id 				INTEGER UNIQUE AUTO_INCREMENT,
    categoria 		INTEGER,
    nome 			VARCHAR(200),
    autor 			VARCHAR(200),
    isbn 			VARCHAR(200),
	valor 			FLOAT
	#FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);
insert into livros(id,categoria,nome,autor,isbn,valor) values(3,8,"pedro","joao","advfc",50);
drop table livros;
select * from livros;

CREATE TABLE users(
	id 		INTEGER UNIQUE AUTO_INCREMENT,
    nome 	VARCHAR(255),
    email	VARCHAR(255),
    password VARCHAR(255),
    salt	VARCHAR(255)
);
select *from users;		
drop table users;
