<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-cadastro - Cadastrar</title>

        <link rel="shortcut icon" href="img/lupa.png" type="image/x-icon">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/form.css">
    </head>
    <body>
         <?php require_once('layouts/header.php') ?> 
        <main>
            <article>
                <form action="" method="post">
                    <fieldset>
                        <h2>Cadastrar notícia</h2>
                        <input type="text" name="txtTitulo" id="txtTitulo" minlength="4" maxlength="30" placeholder="Titulo da notícia" required>
                        <input type="text" name="txtCategoria" id="txtCategoria" minlength="2" maxlength="20" placeholder="Categoria da notícia" required>
                        <textarea name="txtConteudo" id="txtConteudo" minlength="30" maxlength="250" placeholder="Conteúdo da notícia" cols="30" rows="10" required></textarea>
                        <?php require_once('controller/cadastrarRecebe.php') ?>
                    </fieldset>
                    <button type="submit" class="btn-padrao">Cadastrar</button>
                </form>
            </article>
        </main>
        <?php require_once('layouts/footer.php') ?>
    </body>
</html>