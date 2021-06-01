CREATE DATABASE dbKudilongaApi;

USE dbKudilongaApi;

CREATE TABLE IF NOT EXISTS PalavrasAndSignificados (
  id INT NOT NULL AUTO_INCREMENT,
  palavra VARCHAR(150) NOT NULL,
  lingua VARCHAR(50) NOT NULL,
  significado VARCHAR(250) NOT NULL,
  PRIMARY KEY (id));


CREATE TABLE IF NOT EXISTS Exemplos (
  id INT NOT NULL AUTO_INCREMENT,
  idPalavra INT NOT NULL,
  exemplos VARCHAR(150) NULL,
  PRIMARY KEY (id),
  INDEX fk_Exemplos_PalavrasAndSignificados_idx (idPalavra ASC),
  CONSTRAINT fk_Exemplos_PalavrasAndSignificados
    FOREIGN KEY (idPalavra)
    REFERENCES PalavrasAndSignificados (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);