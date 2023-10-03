<?php 
    require('model/conexao.php');

    $config = parse_ini_file('model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    const CATEGORIA = "SELECT * FROM categoria ORDER BY id ASC";
    const NOTICIA = "SELECT * FROM noticia ORDER BY codNoticia ASC";

    $categorias = $conexao -> consultaBanco(CATEGORIA);

    if (boolval($categorias) === true) {

        $noticias = $conexao -> consultaBanco(NOTICIA);
        
        function verificaTipo($categorias, $idCategoria) {
            foreach ($categorias as $categoria) {
                if ($idCategoria === $categoria['id']) {
                    return $categoria['tipo'];
                }
            }
        }

        foreach ($noticias as $noticia) {
            $titulo = $noticia['titulo'];
            $conteudo = $noticia['conteudo'];
            $tipo = verificaTipo($categorias, $noticia['idCategoria']);

            echo "
                <section>
                    <div>
                        <h2>$titulo</h2>
                        <h3>$tipo</h3>
                        <p>$conteudo</p>
                    </div>
                    <a href='' class='btn-padrao'>Acessar</a>
                </section>
            ";
        }
    } else {
        echo "<h2>Não há notícias cadastradas! <a href='cadastrarNoticias.php'>Cadastrar Notícias.</a></h2>";
    }

?>