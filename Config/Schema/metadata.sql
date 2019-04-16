DROP TABLE IF EXISTS `filmes`;
CREATE TABLE `filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `duracao` varchar(5) DEFAULT NULL,
  `idioma` varchar(50) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filme_genero_fk` (`genero_id`),
  CONSTRAINT `filme_genero_fk` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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

INSERT INTO criticas (nome, avaliacao, data_avaliacao, filme_id) VALUES ('Jose', '10', '2019-04-03', '1');
INSERT INTO criticas (nome, avaliacao, data_avaliacao, filme_id) VALUES ('Mario', '6', '2019-04-02', '1');
INSERT INTO criticas (nome, avaliacao, data_avaliacao, filme_id) VALUES ('Claudia', '8', '2019-03-02', '1');

INSERT INTO ators (nome, nascimento) VALUES ('Alex', '2019-03-02');
INSERT INTO ators (nome, nascimento) VALUES ('Rebeka', '2019-03-02');

INSERT INTO ators_filmes (id, filme_id, ator_id) VALUES ('1', '1', '1');
INSERT INTO ators_filmes (id, filme_id, ator_id) VALUES ('2', '2', '2');
INSERT INTO ators_filmes (id, filme_id, ator_id) VALUES ('3', '1', '2');
INSERT INTO ators_filmes (id, filme_id, ator_id) VALUES ('4', '2', '1');
