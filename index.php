<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-cadastro - Início</title>

        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php 
            require_once('layouts/header.php');

            echo "<main><article>";

            require_once('controller/noticias.php');

            echo "</article></main>";

            require_once('layouts/footer.php');
        ?>
    </body>
</html>