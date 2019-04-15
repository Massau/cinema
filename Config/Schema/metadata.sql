CREATE TABLE filmes (
    'id' int(11) NOT NULL AUTO_INCREMENT,
    'nome' varchar(100) DEFAULT NULL,
    'ano' int(11) DEFAULT NULL,
    'duracao' varchar(5) DEFAULT NULL,
    'idioma' varchar(50) DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO filmes (id, nome, ano, duracao, idioma) VALUES ('1', 'Avengers', '2010', '5:00', 'Inglês');
INSERT INTO filmes (id, nome, ano, duracao, idioma) VALUES ('2', 'Rocky', '1980', '2:00', 'Inglês');
INSERT INTO filmes (id, nome, ano, duracao, idioma) VALUES ('3', 'De Volta para o Futuro', '1986', '3:00', 'Inglês');
INSERT INTO filmes (id, nome, ano, duracao, idioma) VALUES ('4', 'Esqueceram de Mim', '1994', '3:00', 'Inglês');
INSERT INTO filmes (id, nome, ano, duracao, idioma) VALUES ('5', 'Star Wars', '1977', '2:00', 'Inglês');

CREATE TABLE `generos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO generos (id, nome) VALUES ('1', 'Aventura');
INSERT INTO generos (id, nome) VALUES ('2', 'Ação');
INSERT INTO generos (id, nome) VALUES ('3', 'Suspense');
INSERT INTO generos (id, nome) VALUES ('4', 'Terror');
INSERT INTO generos (id, nome) VALUES ('5', 'Ficção');
INSERT INTO generos (id, nome) VALUES ('6', 'Comédia');
INSERT INTO generos (id, nome) VALUES ('7', 'Drama');

ALTER TABLE filmes ADD CONSTRAINT filme_genero_fk int(11) FOREIGN KEY(genero_id) REFERENCES genero_id(id);