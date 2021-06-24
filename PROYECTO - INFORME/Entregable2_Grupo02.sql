CREATE TABLE usuario(
	idUsuario INTEGER NOT NULL,
    nombres VARCHAR(50) NOT NULL,
    apPaterno VARCHAR(50) NOT NULL,
    apMaterno VARCHAR(50) NOT NULL,
    celular CHAR(9) NOT NULL,
    imgPerfil mediumblob NOT NULL ,
    correo VARCHAR(100) NOT NULL,
    constraseña VARCHAR(100) NOT NULL,
    estado char(1) NOT NULL DEFAULT '1' COMMENT '0 = inhabilitado , 1 = habilitado ' ,
    regDate DATETIME NOT NULL DEFAULT LOCALTIME
);

CREATE TABLE perfil(
	idPerfil INTEGER NOT NULL,
    descripcion VARCHAR(50) NOT NULL
);

CREATE TABLE perfilUser(
	idUsuario INTEGER NOT NULL,
    idPerfil INTEGER NOT NULL,
    estado char(1) NOT NULL DEFAULT '1' COMMENT '0 = inhabilitado , 1 = habilitado  '
);

CREATE TABLE direccionUser(
	idUsuario INTEGER NOT NULL,
    idPerfil INTEGER NOT NULL,
    departamento VARCHAR(50) NOT NULL,
    provincia VARCHAR(50) NOT NULL,
    distrito VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL
);

CREATE TABLE categoria(
	idCateg INTEGER NOT NULL,
    descripcion VARCHAR(50) NOT NULL,
    estado char(1) NOT NULL DEFAULT '1' COMMENT '0 = inhabilitado , 1 = habilitado  '
); 

CREATE TABLE subCategoria(
	idSubCateg INTEGER NOT NULL,
    idCateg INTEGER NOT NULL,
    descripcion VARCHAR(50) NOT NULL,
    estado char(1) NOT NULL DEFAULT '1' COMMENT '0 = inhabilitado , 1 = habilitado  '
); 

CREATE TABLE categoriaUser(
	idUser INTEGER NOT NULL,
    idCategoria INTEGER NOT NULL
);



CREATE TABLE contrato(
	idContrato INTEGER NOT NULL,
    idUserCli INTEGER NOT NULL,
    idUserTec INTEGER NOT NULL,
    descripcion VARCHAR(255) NULL,
    regDate DATETIME NOT NULL DEFAULT LOCALTIME,
    estado char(1) NOT NULL DEFAULT '0' COMMENT '0 = creado , 1 = en proceso , 2 = terminado/culminado '
);

CREATE TABLE calificacion(
	idCalificacion INTEGER NOT NULL,
    idUserEmi INTEGER NOT NULL COMMENT 'este campo sera el usuario calificador',
    idUserRec INTEGER NOT NULL COMMENT 'este campo sera el usuario calificado',
    puntuacion DECIMAL(2,1) NOT NULL,
    descripcion VARCHAR(255) NULL
);






-- ALTER TABLE : PRIMARY KEY 
ALTER TABLE usuario ADD PRIMARY KEY (idUsuario);
ALTER TABLE perfil ADD PRIMARY KEY (idPerfil);
ALTER TABLE categoria ADD PRIMARY KEY (idCateg);
ALTER TABLE subCategoria ADD PRIMARY KEY (idSubCateg);
ALTER TABLE contrato ADD PRIMARY KEY (idContrato);
ALTER TABLE calificacion ADD PRIMARY KEY (idCalificacion);
-- COMPOSITE PRIMARY KEY
ALTER TABLE perfilUser ADD PRIMARY KEY (idUsuario,idPerfil);
ALTER TABLE direccionUser ADD PRIMARY KEY (idUsuario,idPerfil);
ALTER TABLE categoriaUser ADD PRIMARY KEY (idUsuario,idCateg);

-- ALTER TABLE : FOREIGN KEY ONE
ALTER TABLE subCategoria ADD FOREIGN KEY (idCateg) REFERENCES categoria(idCateg);
-- FOREIGN KEY TWO
ALTER TABLE perfilUser ADD FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario);
ALTER TABLE perfilUser ADD FOREIGN KEY (idPerfil) REFERENCES perfil(idPerfil);
ALTER TABLE calificacion ADD FOREIGN KEY (idUserEmi) REFERENCES usuario(idUsuario);
ALTER TABLE calificacion ADD FOREIGN KEY (idUserRec) REFERENCES usuario(idUsuario);
ALTER TABLE contrato ADD FOREIGN KEY (idUserCli) REFERENCES usuario(idUsuario);
ALTER TABLE contrato ADD FOREIGN KEY (idUserTec) REFERENCES usuario(idUsuario);
ALTER TABLE categoriaUser ADD FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario);
ALTER TABLE categoriaUser ADD FOREIGN KEY (idCateg) REFERENCES categoria(idCateg);
ALTER TABLE direccionUser ADD FOREIGN KEY (idUsuario) REFERENCES perfilUser(idUsuario);
ALTER TABLE direccionUser ADD FOREIGN KEY (idPerfil) REFERENCES perfilUser(idPerfil);









-- modificaciones que vamos haciendo xD 
-- alter table usuario ADD correo VARCHAR(100) NOT NULL;
-- alter table usuario ADD contraseña VARCHAR(100) NOT NULL;
-- alter table categoriaUser CHANGE idCategoria idCateg INTEGER NOT NULL;
-- describe calificacion;
/*
alter table calificacion engine=InnoDB;
alter table categoria engine=InnoDB;
alter table categoriaUser engine=InnoDB;
alter table contrato engine=InnoDB;
alter table direccionUser engine=InnoDB;
alter table perfil engine=InnoDB;
alter table perfilUser engine=InnoDB;
alter table subCategoria engine=InnoDB;
alter table usuario engine=InnoDB;
alter table usuario change imgPerfil imgPerfil mediumblob NULL; 
alter table usuario change correo correo VARCHAR(100) NOT NULL UNIQUE; 

ALTER TABLE usuario  change contraseña contraseña VARCHAR(100) NOT NULL;
ALTER TABLE usuario  AUTO_INCREMENT=1;

*/
