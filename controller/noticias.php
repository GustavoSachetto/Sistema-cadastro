<?php 
    require('model/conexao.php');

    $config = parse_ini_file('model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    const NOTICIA = "SELECT noticia.titulo, noticia.conteudo, categoria.tipo FROM noticia
    INNER JOIN categoria ON categoria.id = noticia.idCategoria";

    const VERIFICA = "SELECT count(*) FROM noticia";

    $verifica = $conexao -> consultaBanco(VERIFICA);

    echo "<main><article>";

    if (boolval($verifica) === true) {

        $noticias = $conexao -> consultaBanco(NOTICIA . $busca . " ORDER BY codNoticia DESC");
        
        if (empty($noticias) == true) {
            echo "<h2>Não foi possivel localizar nenhuma notícia que contenha: <a href='cadastrarNoticias.php'>$termoBusca</a></h2>";
        } else {         

            foreach ($noticias as $noticia) {
                $titulo = $noticia['titulo'];
                $conteudo = $noticia['conteudo'];
                $tipo = $noticia['tipo'];
    
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