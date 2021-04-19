CREATE DATABASE bdcomentarios;

USE bdcomentarios;

CREATE TABLE usuarios
	(id INT PRIMARY KEY AUTO_INCREMENT,
	 email VARCHAR(30) NOT NULL,
     usuario VARCHAR(30) NOT NULL,
	 senha VARCHAR(90) NOT NULL,
	 imagem VARCHAR(90) NOT NULL);

CREATE TABLE comentarios 
	( id INT PRIMARY KEY AUTO_INCREMENT,
	  usuario VARCHAR( 30 ) NOT NULL,
	  email VARCHAR( 30 ) NOT NULL,
      data_criacao VARCHAR( 15 ) NOT NULL,
	  data_edicao VARCHAR( 15 ),
	  comentario VARCHAR( 255 ) NOT NULL);