<header>
    <h1>Logo</h1>
    <nav>
        <form action="" method="get">
        <a href="cadastrarNoticias.php">Cadastrar Notícias</a>
        <a href="index.php">Exibir Notícias</a>
            <input type="text" name="txtPesquisa" id="txtPesquisa">
            <button type="submit"><img src="img/lupa.png" alt="Lupa pesquisa"></button>
        </form>
    </nav>
</header>
<?php 
    $busca = " ORDER BY codNoticia DESC";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (empty($_GET['txtPesquisa']) == false) {
            $termoBusca = addslashes($_GET['txtPesquisa']);
            $busca = " WHERE titulo LIKE '%$termoBusca%' OR tipoCategoria LIKE '%$termoBusca%'";
        }
    } 
?>