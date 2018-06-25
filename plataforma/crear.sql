DROP DATABASE IF EXISTS BASE_TP1;
CREATE DATABASE BASE_TP1;
USE BASE_TP1;


CREATE TABLE usuarios(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	usuario VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (usuario, password)
VALUES 
	('juan', '$2y$10$kocuCHiCuwwNHltS8cK0n.8grNO/pcuuAQv/huBijaLHrmf825nPm' ),
	('esteban', '$2y$10$EjEaPtSr2Hc7NUBFjox3T.oLNdLkqC7RtKLVuECdNG2hYMgijVIr2' ),
	('pepe', '$2y$10$Pnnf3dJfOjhdKDyQoYofNeTgMf1d/vozQMOlkBLGouyYpahBdJXb2' ),
	('german', '$2y$10$4rHg8Gqq6ddBQN4frgKvpOmyH.mZPTHZqSesjRox.XwPTh5hnf8y6' ),
	('rolo', '$2y$10$otoLrq5pptaAy0cfMDqXeu0E3yIac3EvOOkk5nwCWGZrQcijwWUku' );
	
CREATE TABLE categorias(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	categoria VARCHAR(45) NOT NULL
);

INSERT INTO categorias (categoria)
VALUES  ('RPG'),
			  ('FPS'),
			 ('ACCION'),
			 ('TERROR');

CREATE TABLE comentarios(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	titulo VARCHAR(255) NOT NULL,
	comentario BLOB,
	titulo_juego VARCHAR(255) NOT NULL,
	fkusuarios INT UNSIGNED,
	FOREIGN KEY(fkusuarios) REFERENCES usuarios(id),
	fkcategorias INT UNSIGNED,
	FOREIGN KEY(FKCATEGORIAS) REFERENCES categorias(id)
);

INSERT INTO comentarios(titulo, comentario, titulo_juego, fkusuarios, fkcategorias)
VALUES 
	('Gran Call of duty!','Uhhh que bueno ojala que este copado ese FPS', 'Call of Duty MW 2','2','2'),
	('A gastar en Pkmn moon','Otra vez tengo que gastar guita en un pokemon, desde gameboy que garpo','Pokemon Moon','3','1'),
	('Final Fantasy FTW','Aguante Final fantasy!!!, espero que este no defraude porque el FFXII daba pena.','Final Fantasy XV','3','1'),
	('Uncharteeed!!','Bueno igual lo voy a comprar..jajajajaj','Uncharted 4','3','3');
