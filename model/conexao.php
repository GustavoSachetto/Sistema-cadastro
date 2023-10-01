<?php 
    class conexao {
        private $pdo;
        public function __construct($dbname, $host, $user, $password) {
            try {
                $this -> pdo = new PDO ("mysql:dbname=" . $dbname . "; host=" . $host, $user, $password);
                echo "Conexão do PDO";
            } catch (PDOException $erro) {
                echo "Erro de conexão no PDO: " . $erro -> getMessage();
                exit();
            } catch (Exception $erro) {
                echo "Erro não passou da conexão: " . $erro -> getMessage();
                exit();
            }
        }

        public function insereNoticia ($cadCategoria, $cadTitulo, $cadConteudo) {
            $insereNoticia = $this -> pdo -> prepare("insert into categoria(tipo) value (:categoria); insert into noticia(titulo, conteudo) values (:titulo, :conteudo)");

            $insereNoticia -> bindValue(':categoria', $cadCategoria);
            $insereNoticia -> bindValue(':titulo', $cadTitulo);
            $insereNoticia -> bindValue(':conteudo', $cadConteudo);
            $insereNoticia -> execute();
        }
    }
?>