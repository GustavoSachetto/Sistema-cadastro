<?php 
    require_once('../model/conexao.php');

    $config = parse_ini_file('../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $cadCategoria = addslashes($_POST['txtCategoria']);
    $cadTitulo = addslashes($_POST['txtTitulo']);
    $cadConteudo = addslashes($_POST['txtConteudo']);

    $conexao -> insereNoticia ($cadCategoria, $cadTitulo, $cadConteudo);
?>