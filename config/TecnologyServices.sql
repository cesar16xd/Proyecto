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