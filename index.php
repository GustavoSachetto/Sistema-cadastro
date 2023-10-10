<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-cadastro - Início</title>

        <link rel="shortcut icon" href="img/lupa.png" type="image/x-icon">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
               $("#menu").click(function() {
                    $("nav").slideToggle(100);
               });
            });
        </script>
    </head>
    <body>
        <?php 
            require_once('layouts/header.php');
            require_once('controller/noticias.php');
            require_once('layouts/footer.php');
        ?>
    </body>
</html>