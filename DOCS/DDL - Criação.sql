create database projetonoticia;

use projetonoticia;

create table categoria (
    id int auto_increment not null primary key,
	tipo char(20) not null unique
);

create table noticia (
    codNoticia int auto_increment not null primary key,
	titulo varchar(30) not null,
    conteudo varchar(250) not null,
    
    constraint uqNoticia
	unique (titulo, conteudo, idCategoria),
    
    idCategoria int not null,
	constraint fkidCategoria foreign key (idCategoria) references categoria (id)
);

-- drop database projetonoticia;