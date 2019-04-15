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