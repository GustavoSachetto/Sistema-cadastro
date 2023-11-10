<header>
    <h1>Logo</h1>
    <button id="menu" class="menu"><img src="img/menu.svg" alt="Menu"></button>
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
    $busca = "";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (empty($_GET['txtPesquisa']) == false) {
            $termoBusca = addslashes($_GET['txtPesquisa']);
            $busca = " WHERE titulo LIKE '%$termoBusca%' OR tipo LIKE '%$termoBusca%'";
        }
    } 
?>