CREATE DATABASE registro_eventos CHARACTER SET utf8 COLLATE utf8_general_ci;
USE registro_eventos;

CREATE TABLE usuario(
IdUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
Nombre VARCHAR(35) NOT NULL,
Correo VARCHAR(60) NOT NULL UNIQUE, 
Contraseña VARCHAR (100) NOT NULL
);

CREATE TABLE tipo_de_eventos(
IdTipo_eventos INT NOT NULL AUTO_INCREMENT,
Nombre_Eventos VARCHAR(45) NOT NULL,
PRIMARY KEY (IdTipo_eventos)
);

CREATE TABLE eventos(
Id_Eventos INT NOT NULL AUTO_INCREMENT,
Nombre_Libro VARCHAR (60) NOT NULL,
Fecha_y_Hora DATETIME NOT NULL,
NombreUsuario VARCHAR(45) NOT NULL,
Correo VARCHAR(55) NOT NULL,
IdTipo_eventos INT,
PRIMARY KEY(Id_Eventos),
CONSTRAINT fk_eventos_tipo_de_eventos
FOREIGN KEY (IdTipo_eventos) 
REFERENCES tipo_de_eventos (IdTipo_eventos)
);







