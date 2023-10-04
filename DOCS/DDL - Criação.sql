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
	unique (titulo, conteudo, tipoCategoria),
    
    tipoCategoria char(20) not null,
	constraint fktipoCategoria foreign key (tipoCategoria) references categoria (tipo)
);