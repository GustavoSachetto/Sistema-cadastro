<main>
    <article>
        <form action="" method="post">
            <fieldset>
                <h2>Cadastrar notícia</h2>
                <input type="text" name="txtTitulo" id="txtTitulo" minlength="4" maxlength="30" placeholder="Titulo da notícia" required>
                <input type="text" name="txtCategoria" id="txtCategoria" minlength="2" maxlength="20" placeholder="Categoria da notícia" required>
                <textarea name="txtConteudo" id="txtConteudo" minlength="30" maxlength="250" placeholder="Conteúdo da notícia" cols="30" rows="10" required></textarea>
            </fieldset>
            <button type="submit" class="btn-padrao">Cadastrar</button>
        </form>
    </article>
</main>
<?php 
    require_once('model/conexao.php');

    $config = parse_ini_file('model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $cadCategoria = addslashes($_POST['txtCategoria']);
        $cadTitulo = addslashes($_POST['txtTitulo']);
        $cadConteudo = addslashes($_POST['txtConteudo']);

        $conexao -> insereNoticia($cadCategoria, $cadTitulo, $cadConteudo);
    }
?>