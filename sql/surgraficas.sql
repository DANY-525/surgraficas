CREATE DATABASE surgraficas;
USE surgraficas;

CREATE TABLE usuario(
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nombre varchar(20) NOT NULL,
    sexo CHAR(1),
    email  VARCHAR (50),
    identificacion VARCHAR(50),
PRIMARY KEY(id_usuario)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE productos(
     idpro INT NOT NULL AUTO_INCREMENT,
     nombre VARCHAR(20) NOT NULL,
     descripcion TEXT NULL,
     tipoproductos INT NOT NULL,
     imagen VARCHAR(50),
     PRIMARY KEY(idpro)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
 
CREATE TABLE tipoproductos(
   idtipoproductos INT NOT NULL AUTO_INCREMENT,
   tipoproductos VARCHAR (50),
   PRIMARY KEY(idtipoproductos)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tipoproductos (idtipoproductos,tipoproductos) VALUES 
	(1,"sellos"),
	(2,"papeleria comercial"),
	(3,"Tarjetas Para Toda Ocacion"),
	(4,"Souvenirs");


CREATE TABLE servicios(
 idservicios INT NOT NULL AUTO_INCREMENT,
 nombre VARCHAR(20) NOT NULL,
 descripcion TEXT NULL,
 imagen VARCHAR(100) NOT NULL,
 tiposervicios INT NOT NULL,
 PRIMARY KEY(idservicios)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE tiposervicios(
idtiposervicios INT NOT NULL AUTO_INCREMENT,
tiposervicios VARCHAR (50),
PRIMARY KEY(idtiposervicios)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO tiposervicios (idtiposervicios,tiposervicios) VALUES 
	(1,"tecnologia laser"),
	(2,"Impresion digital a color"),
	(3,"Impresion digital gran formato"),
	(4,"Diseño Web"),
	(5,"Instalacion De Avisos"),
	(6,"Distribucion publicitaria para su empresa");
	