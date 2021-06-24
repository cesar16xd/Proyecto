-- drop database TechnologyServices;
create database TechnologyServices;
use TechnologyServices;
-- Creacion de Tablas del Paquete ACCESO
CREATE TABLE Persona(
	idPersona INT UNSIGNED NOT NULL,
    idDistrito INT UNSIGNED NOT NULL,
    numDoc VARCHAR(15) not null unique,
    tipoDoc VARCHAR(15) not null,
    nombres VARCHAR(100) NOT NULL,
    apPaterno VARCHAR(50) NOT NULL,
    apMaterno VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    celular CHAR(9) NOT NULL,
    regDate DATETIME NOT NULL DEFAULT LOCALTIME
)ENGINE = InnoDB ;

CREATE TABLE Usuario(
	idUsuario INT UNSIGNED NOT NULL,
    idPersona INT UNSIGNED NOT NULL,
    correo VARCHAR(100) NOT NULL,
    contraseña VARCHAR(100) NOT NULL,
    imgPerfil VARCHAR(200) ,
    estado BOOLEAN NOT NULL COMMENT '0 = inhabilitado , 1 = habilitado ' 
)ENGINE = InnoDB ;

CREATE TABLE Perfil(
	idPerfil INT UNSIGNED NOT NULL,
    descripcion VARCHAR(50) NOT NULL
)ENGINE = InnoDB ;

CREATE TABLE UsuarioPerfil(
	idUsuario INT UNSIGNED NOT NULL,
    idPerfil INT UNSIGNED NOT NULL,
    estado BOOLEAN NOT NULL COMMENT '0 = inhabilitado , 1 = habilitado ' ,
    descripcion VARCHAR(800) null
)ENGINE = InnoDB ;


-- Creacion de Tablas del Paquete UBIGEO
CREATE TABLE Distrito(
	idDistrito INT UNSIGNED NOT NULL,
    idProvincia INT UNSIGNED NOT NULL,
    nombre VARCHAR(50) NOT NULL
)ENGINE = InnoDB ;

CREATE TABLE Provincia(
    idProvincia INT UNSIGNED NOT NULL,
    idDepartamento INT UNSIGNED NOT NULL,
    nombre VARCHAR(50) NOT NULL
)ENGINE = InnoDB ;

CREATE TABLE Departamento(
	idDepartamento INT UNSIGNED NOT NULL,
    nombre VARCHAR(50) NOT NULL
)ENGINE = InnoDB ;

-- Creacion de Tablas del Paquete CONTRATO

CREATE TABLE Contrato(
	idContrato INT UNSIGNED NOT NULL,
    idServicio INT UNSIGNED NOT NULL,
    idTecnico INT UNSIGNED NOT NULL,
    idCliente INT UNSIGNED NOT NULL,
    descripcion VARCHAR(255) NULL,
    estado char(1) NOT NULL COMMENT '1 = creado , 2 = cancelado , 3 = en proceso , 4 = exitoso ' ,
    regDate DATETIME NOT NULL,
    updDate DATETIME NOT NULL
)ENGINE = InnoDB ;

CREATE TABLE Calificacion(
	idContrato INT UNSIGNED NOT NULL,
    puntuacion DECIMAL(2,1) NOT NULL,
    descripcion VARCHAR(255) NULL,
    regDate DATETIME NOT NULL
)ENGINE = InnoDB ;

-- Creacion de Tablas del Paquete SERVICIO

CREATE TABLE Categoria(
	idCategoria INT UNSIGNED NOT NULL,
    descripcion VARCHAR(50) NOT NULL,
    estado BOOLEAN NOT NULL COMMENT '0 = inhabilitado , 1 = habilitado  '
)ENGINE = InnoDB ;

CREATE TABLE Servicio(
	idServicio INT UNSIGNED NOT NULL,
    idCategoria INT UNSIGNED NOT NULL,
    descripcion VARCHAR(50) NOT NULL,
    estado BOOLEAN NOT NULL COMMENT '0 = inhabilitado , 1 = habilitado  '
)ENGINE = InnoDB ;




-- ALTER TABLE : PRIMARY KEY 
-- paquete Acceso
ALTER TABLE Persona ADD PRIMARY KEY (idPersona);
ALTER TABLE Usuario ADD PRIMARY KEY (idUsuario);
ALTER TABLE Perfil ADD PRIMARY KEY (idPerfil);
ALTER TABLE UsuarioPerfil ADD PRIMARY KEY (idUsuario,idPerfil);
-- paquete Ubigeo
ALTER TABLE Departamento ADD PRIMARY KEY (idDepartamento);
ALTER TABLE Provincia ADD PRIMARY KEY (idProvincia);
ALTER TABLE Distrito ADD PRIMARY KEY (idDistrito);
-- paquete Servicio
ALTER TABLE Categoria ADD PRIMARY KEY (idCategoria);
ALTER TABLE Servicio ADD PRIMARY KEY (idServicio);
-- paquete Contrato
ALTER TABLE Contrato ADD PRIMARY KEY (idContrato);
ALTER TABLE Calificacion ADD PRIMARY KEY (idContrato);

-- ALTER TABLE : AUTO_INCREMENT
-- paquete Acceso
ALTER TABLE Persona CHANGE idPersona idPersona INT UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Usuario CHANGE idUsuario idUsuario INT UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Perfil CHANGE idPerfil idPerfil INT UNSIGNED NOT NULL AUTO_INCREMENT;
-- paquete Ubigeo
ALTER TABLE Departamento CHANGE idDepartamento idDepartamento INT UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Provincia CHANGE idProvincia idProvincia INT UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Distrito CHANGE idDistrito idDistrito INT UNSIGNED NOT NULL AUTO_INCREMENT;
-- paquete Servicio
ALTER TABLE Categoria CHANGE idCategoria idCategoria INT UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE Servicio CHANGE idServicio idServicio INT UNSIGNED NOT NULL AUTO_INCREMENT;
-- paquete Contrato
ALTER TABLE Contrato CHANGE idContrato idContrato INT UNSIGNED NOT NULL AUTO_INCREMENT;

-- ALTER TABLE : FOREIGN KEY 
-- paquete Acceso
ALTER TABLE Persona ADD FOREIGN KEY (idDistrito) REFERENCES Distrito(idDistrito);
ALTER TABLE Usuario ADD FOREIGN KEY (idPersona) REFERENCES Persona(idPersona);
ALTER TABLE UsuarioPerfil ADD FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario);
ALTER TABLE UsuarioPerfil ADD FOREIGN KEY (idPerfil) REFERENCES Perfil(idPerfil);
-- paquete Ubigeo
ALTER TABLE Distrito ADD FOREIGN KEY (idProvincia) REFERENCES Provincia(idProvincia);
ALTER TABLE Provincia ADD FOREIGN KEY (idDepartamento) REFERENCES Departamento(idDepartamento);
-- paquete Contrato
ALTER TABLE Contrato ADD FOREIGN KEY (idServicio) REFERENCES Servicio(idServicio);
ALTER TABLE Contrato ADD FOREIGN KEY (idTecnico) REFERENCES UsuarioPerfil(idUsuario);
ALTER TABLE Contrato ADD FOREIGN KEY (idCliente) REFERENCES UsuarioPerfil(idUsuario);
ALTER TABLE Calificacion ADD FOREIGN KEY (idContrato) REFERENCES Contrato(idContrato);
-- paquete Servicio
ALTER TABLE Servicio ADD FOREIGN KEY (idCategoria) REFERENCES Categoria(idCategoria);

-- INSERT DATOS POR DEFECTO TABLA PERFIL
insert into perfil values (100,'cliente');
insert into perfil values (200,'tecnico');
insert into perfil values (300,'colaborador');


-- INSERT DATOS PRUEBAS TABLA PERSONA
insert into persona values(null,1282,'Alexander Jeferson','Taco','Vasquez','AV.Canto Grande 974','928197072', NOW());
-- INSERT DATOS PRUEBAS TABLA USUARIO
insert into usuario values(null,1,'alexander@gmail.com','1234','asdasd',1);
-- INSERT DATOS PRUEBAS TABLA USUARIOPERFIL
insert into usuarioperfil values(1,300,1);

-- SELECCIONAR UNA TABLA
select * from persona ;
select * from usuario ;
select * from usuarioperfil;
select * from perfil;
commit;
-- borrar en casacada 
SET SQL_SAFE_UPDATES = 0;
delete from usuarioperfil;
delete from usuario;
delete from persona;
SET SQL_SAFE_UPDATES = 1;
select * from perfil p inner join usuarioperfil up on up.idperfil = p.idperfil ;

-- RESETEAR EL AUTO INCREMENTABLE DE UNA TABLA
alter table persona AUTO_INCREMENT=1;
alter table usuario AUTO_INCREMENT=1;

select * from distrito;
-- seleccionar los usuarios con sus datos y su perfil
SELECT * FROM usuario U 
	INNER JOIN persona P 
		ON P.idPersona = U.idPersona
	INNER JOIN usuarioperfil UP 
		ON U.idUsuario=UP.idUsuario;


-- BUSQUEDA PERSONALIZADA -- PERSONA CON SU USUARIO HABILITADO CON UN PERFIL 
select 
	concat_ws(' ',Pe.nombres, Pe.apPaterno, Pe.apMaterno) as persona, -- concatenar columnas en una sola
	U.correo ,
    U.contraseña ,
    Pf.descripcion as perfil ,
	case UP.estado when 1 then 'habilitado' when 2 then 'deshabilitado' end as estado -- switch case dentro de un select
    from usuario U
	inner join usuarioperfil UP on UP.idUsuario = U.idUsuario
	inner join persona Pe on Pe.idPersona = U.idPersona
	inner join perfil Pf on Pf.idPerfil = UP.idPerfil
	where U.correo='alexander@gmail.com' and U.contraseña='1234' and UP.idPerfil=300;


SELECT U.idUsuario,U.idPersona,U.correo,U.imgPerfil,U.contraseña,
case U.estado when 1 then 'habilitado' when 2 then 'deshabilitado' end as estadoUsuario,
P.nombres,P.apPaterno,P.apMaterno,P.direccion,P.celular,P.regDate,P.tipoDoc,P.numDoc,
case UP.estado when 1 then 'habilitado' when 2 then 'deshabilitado' end as estadoPerfil ,
UP.descripcion as descripPerfil , Pf.descripcion as perfil
FROM usuario U 
INNER JOIN persona P 
ON P.idPersona = U.idPersona
INNER JOIN usuarioperfil UP 
ON U.idUsuario=UP.idUsuario
INNER JOIN perfil Pf
ON Pf.idPerfil = UP.idPerfil;
ALTER TABLE usuarioperfil ADD descripcion VARCHAR(800) null;
ALTER TABLE persona ADD tipoDoc VARCHAR(15) not null;
ALTER TABLE persona ADD numDoc VARCHAR(15) not null unique;
ALTER TABLE usuario ADD imgPerfil  VARCHAR(200) ;
ALTER TABLE persona DROP COLUMN numDocument;
select version();
