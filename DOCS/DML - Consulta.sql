use projetonoticia;

select * from categoria;

select * from noticia;

select count(*) from noticia;

select titulo, conteudo , idCategoria from noticia where codNoticia = 1;

SELECT noticia.titulo, noticia.conteudo, categoria.tipo FROM noticia
INNER JOIN categoria ON categoria.id = noticia.idCategoria 
WHERE tipo LIKE '%Esporte%' ORDER BY idCategoria DESC;