<?php 
    require('model/conexao.php');

    $config = parse_ini_file('model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    const CATEGORIA = "SELECT * FROM categoria ORDER BY id ASC";
    const NOTICIA = "SELECT * FROM noticia";

    $categorias = $conexao -> consultaBanco(CATEGORIA);

    if (boolval($categorias) === true) {

        $noticias = $conexao -> consultaBanco(NOTICIA . $busca);
        
        echo "<main><article>";
        
        if (empty($noticias) == true) {
            echo "<h2>Não foi possivel localizar nenhuma notícia que contenha: <a href='cadastrarNoticias.php'>$termoBusca</a></h2>";
        } else {
            function verificaTipo($categorias, $tipoCategoria) {
                foreach ($categorias as $categoria) {
                    if ($tipoCategoria === $categoria['tipo']) {
                        return $categoria['tipo'];
                    }
                }
            }            

            foreach ($noticias as $noticia) {
                $titulo = $noticia['titulo'];
                $conteudo = $noticia['conteudo'];
                $tipo = verificaTipo($categorias, $noticia['tipoCategoria']);
    
                echo "
                    <section>
                        <div>
                            <h2>" . stripslashes($titulo) . "</h2>
                            <h3>" . stripslashes($tipo) . "</h3>
                            <p>" . stripslashes($conteudo) . "</p>
                        </div>
                        <a href='' class='btn-padrao'>Acessar</a>
                    </section>
                ";
            }
            
        }

    } else {
        echo "<h2>Não há notícias cadastradas! <a href='cadastrarNoticias.php'>Cadastrar Notícias.</a></h2>";
    }

    echo "</article></main>";

?>