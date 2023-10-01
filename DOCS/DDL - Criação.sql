create database projetonoticia;

use projetonoticia;

create table categoria (
	tipo char(20) not null unique,
    id int auto_increment not null primary key
);

create table noticia (
	titulo varchar(30) not null,
    conteudo varchar(250) not null,
    codNoticia int auto_increment not null primary key,
    
    idCategoria int not null,
	constraint fkidCategoria foreign key (idCategoria) references categoria (id)
);
