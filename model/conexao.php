<?php 
    class conexao {
        private $pdo;

        public function __construct($dbname, $host, $user, $password) {
            try {
                $this -> pdo = new PDO ("mysql:dbname=" . $dbname . "; host=" . $host, $user, $password);
                echo "";
            } catch (PDOException $erro) {
                echo "Erro de conexão no PDO: " . $erro -> getMessage();
                exit();
            } catch (Exception $erro) {
                echo "Erro não passou da conexão: " . $erro -> getMessage();
                exit();
            }
        }
        
        public function consultaBanco($consulta) {
            $consultaBanco = $this -> pdo -> query($consulta);
            $consultaBanco -> execute();

            while ($resultado = $consultaBanco -> fetchAll(PDO::FETCH_ASSOC)) {
                return $resultado;
            }
        }

        public function consultaCategoria($categoria) {
            $consulta = "SELECT * FROM categoria WHERE tipo = '$categoria'";
            $resultado = $this -> consultaBanco($consulta);
            
            if (boolval($resultado) === false) {
                $this -> insereCategoria($categoria);
                $resultado = $this -> consultaBanco($consulta);
            } 
            
            return $resultado[0]['tipo'];
        }
        
        public function insereCategoria($categoria) {
            $insereCategoria = $this -> pdo -> prepare("insert into categoria(tipo) value (:tipo)");
            $insereCategoria -> bindValue(':tipo', $categoria);
            $insereCategoria -> execute();
        }
        
        public function insereNoticia ($cadCategoria, $cadTitulo, $cadConteudo) {
            $insereNoticia = $this -> pdo -> prepare("insert into noticia(titulo, conteudo, tipoCategoria) values (:titulo, :conteudo, :tipoCategoria)");

            $tipoCategoria = $this -> consultaCategoria($cadCategoria);
            
            $insereNoticia -> bindValue(':titulo', $cadTitulo);
            $insereNoticia -> bindValue(':conteudo', $cadConteudo);
            $insereNoticia -> bindValue(':tipoCategoria', $tipoCategoria);
            $insereNoticia -> execute();
        }
    }
?>