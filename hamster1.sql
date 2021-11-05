create database Hamsters;
use Hamsters;

CREATE TABLE usuarios (
id int(10) unsigned NOT NULL AUTO_INCREMENT,
usuario varchar(45) NOT NULL,
clave varchar(255) NOT NULL,
nombre varchar(200) NOT NULL,
apellido varchar(200) NOT NULL,
PRIMARY KEY (id),
UNIQUE KEY usuario (usuario)
) ENGINE=InnoDB;

CREATE TABLE hamster (
id_hamster int(10) unsigned NOT NULL AUTO_INCREMENT,
id_usuario int(10) unsigned NOT NULL,
nombre_hamster varchar(200) NOT NULL,
sexo_hamster tinyint(1) NOT NULL,
FechaNAc_hamster date NOT NULL,
PRIMARY KEY (id_hamster),
FOREIGN KEY(id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;
