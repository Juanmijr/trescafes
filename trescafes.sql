create database if not exists trescafes;

use trescafes;

drop table if exists valoracion;
drop table if exists producto;
drop table if exists usuario;

create table usuario (
	idUsuario int auto_increment, 
	email varchar(150) unique not null,
	nombreUsuario varchar(50) not null,
	contrasenia varchar(50) not null,
	nombre varchar(50) not null,
	apellido1 varchar(50) not null,
	apellido2 varchar(50) null,
	fechaNacimiento date not null,
	pais varchar(50) not null,
	codigoPostal int not null,
	telefono int not null,
	rol enum ('administrador','editor','valorador') not null,
        imagenPerfil varchar(50), 

	primary key (idUsuario)
);

create table producto (
	idProducto int auto_increment,
	tipo enum ('cafe','reposteria','otro') not null,
	nombreProducto varchar(100) unique not null,
	descripcion varchar(500) not null,
        imagenProducto varchar(50) not null,
        proteinas real not null,
        carbohidratos real not null,
        grasas real not null,

	primary key (idProducto)
);

create table valoracion (
	idValoracion int auto_increment,
	usuario int,
	producto int,
	valoracion enum ('1','2','3','4','5') not null,
	comentario varchar(180) null,
	fecha date not null,

	primary key (idValoracion),
	foreign key (usuario) references usuario (idUsuario) on delete cascade on update cascade,
	foreign key (producto) references producto (idProducto) on delete cascade on update cascade
);
