CREATE DATABASE bibliotecaUta CHARACTER SET utf8 COLLATE utf8_general_ci;
use bibliotecaUta;

CREATE TABLE tipo(
    Id_Tipo INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY (Id_Tipo)
);

CREATE TABLE usuario(
    Id_Usuario INT(11) NOT NULL AUTO_INCREMENT,
    Id_Tipo INT(11) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    pass VARCHAR(250) NOT NULL,
    PRIMARY KEY (Id_Usuario),
    KEY Id_Tipo (Id_Tipo),
    CONSTRAINT usuario_FK FOREIGN KEY (Id_Tipo) REFERENCES tipo(Id_Tipo)
    );
CREATE TABLE estadoctr(
    Id_Estadoctr INT(11) NOT NULL AUTO_INCREMENT,
    nombrectr VARCHAR(50) NOT NULL,
    PRIMARY KEY (Id_Estadoctr)
);

CREATE TABLE cambcontra(
    Id_Cambcontra INT(11) NOT NULL AUTO_INCREMENT,
    Id_Estadoctr INT(11) NOT NULL,
    Id_Usuario INT(11) NOT NULL,
    correoctr VARCHAR(100) NOT NULL,
    fecha DATETIME NOT NULL,
    token VARCHAR(100) NOT NULL,
    PRIMARY KEY (Id_Cambcontra),
    KEY Id_Usuario (Id_Usuario),
    CONSTRAINT ctruser_FK FOREIGN KEY (Id_Usuario) REFERENCES usuario(Id_Usuario),
    KEY Id_Estadoctr (Id_Estadoctr),
    CONSTRAINT crtestado_FK FOREIGN KEY (Id_Estadoctr) REFERENCES estadoctr(Id_Estadoctr)
    );

CREATE TABLE registro(
    Id_Registro INT(11) NOT NULL AUTO_INCREMENT,
    preCorreo VARCHAR(100) NOT NULL,
    preNombre VARCHAR(100) NOT NULL,
    PRIMARY KEY (Id_Registro)
);


CREATE TABLE categoria(
Id_Categoria INT(11) NOT NULL AUTO_INCREMENT,
nombre_categoria VARCHAR(50) NOT NULL,
PRIMARY KEY (Id_Categoria)
);
CREATE TABLE subcategoria(
    Id_Subcategoria INT(11) NOT NULL AUTO_INCREMENT,
    Id_Categoria INT(11) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY (Id_Subcategoria),
    CONSTRAINT subcategoria_FK FOREIGN KEY (Id_Categoria) REFERENCES categoria(Id_Categoria)
);
CREATE TABLE libro(
    Id_Libro INT(11) NOT NULL AUTO_INCREMENT,
    Id_Subcategoria INT(11) NOT NULL,
    autor VARCHAR(50) NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    editorial VARCHAR(50) NOT NULL,
    edicion VARCHAR(50) NOT NULL,
    paginas INT(11) NOT NULL,
    descripcion VARCHAR(100) NOT NULL, 
    img VARCHAR(250) NOT NULL, 
    pdf VARCHAR(250) NOT NULL, 
    PRIMARY KEY (Id_Libro),
    CONSTRAINT subcategorias_FK FOREIGN KEY (Id_Subcategoria) REFERENCES subcategoria(Id_Subcategoria)
);



