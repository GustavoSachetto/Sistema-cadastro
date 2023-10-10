<?php 
    require_once('model/conexao.php');

    $config = parse_ini_file('model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $cadCategoria = addslashes($_POST['txtCategoria']);
        $cadTitulo = addslashes($_POST['txtTitulo']);
        $cadConteudo = addslashes($_POST['txtConteudo']);
        
        $resultado = $conexao -> insereNoticia($cadCategoria, $cadTitulo, $cadConteudo);
        
        if ($resultado === true) {
            echo "<p class='sucesso'>Notícia cadastrada com sucesso!</p>";
        } else {
            echo "<p class='erro'>Notícia não pode ser cadastrada!</p>";
        }
    }
?>