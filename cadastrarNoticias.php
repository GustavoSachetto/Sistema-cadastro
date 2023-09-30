<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-cadastro - Cadastrar</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/form.css">
    </head>
    <body>

        <?php require_once('layouts/header.php') ?>

        <main>
            <article>
                <form action="" method="post">
                    <fieldset>
                        <h2>Cadastro notícia</h2>
                        <input type="text" name="txtTitulo" id="txtTitulo" placeholder="Titulo da notícia">
                        <input type="text" name="txtCategoria" id="txtCategoria" placeholder="Categoria da notícia">
                        <textarea name="txtConteudo" id="txtConteudo" placeholder="Conteúdo da notícia" cols="30" rows="10"></textarea>
                    </fieldset>
                    <button type="submit">Cadastrar</button>
                </form>
            </article>
        </main>

        <?php require_once('layouts/footer.php') ?>
    </body>
</html>