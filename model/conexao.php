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
            
            return $resultado[0]['id'];
        }
        
        public function insereCategoria($categoria) {
            $insereCategoria = $this -> pdo -> prepare("INSERT INTO categoria(tipo) VALUE (:tipo)");
            $insereCategoria -> bindValue(':tipo', $categoria);
            $insereCategoria -> execute();
        }
        
        public function insereNoticia ($cadCategoria, $cadTitulo, $cadConteudo) {
            $insereNoticia = $this -> pdo -> prepare("INSERT INTO noticia(titulo, conteudo, idCategoria) VALUES (:titulo, :conteudo, :idCategoria)");
            
            $consultaExiste = "SELECT noticia.titulo, noticia.conteudo, categoria.tipo FROM noticia
            INNER JOIN categoria ON noticia.idCategoria = categoria.id WHERE titulo = '$cadTitulo' AND conteudo = '$cadConteudo' AND categoria.tipo = '$cadCategoria'";
            $teste = $this -> consultaBanco($consultaExiste);
            
            if (boolval($teste) === true) {
                return false;
            } else {
                $consultaProximoAI = "SHOW TABLE STATUS LIKE 'noticia'";
                $resultado = $this -> consultaBanco($consultaProximoAI);
                
                $idCategoria = $this -> consultaCategoria($cadCategoria);

                $insereNoticia -> bindValue(':titulo', $cadTitulo);
                $insereNoticia -> bindValue(':conteudo', $cadConteudo);
                $insereNoticia -> bindValue(':idCategoria', $idCategoria);

                $insereNoticia -> execute();

                $consultaNoticia = "SELECT * FROM noticia WHERE codNoticia = ". $resultado[0]['Auto_increment'];
                $resultado = $this -> consultaBanco($consultaNoticia);
    
                return boolval($resultado);
            }
            
        }
    }
?>