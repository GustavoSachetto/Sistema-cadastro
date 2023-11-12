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
            
            $consultaExiste = "SELECT * FROM noticia WHERE titulo = '$cadTitulo' AND conteudo = '$cadConteudo' AND tipoCategoria = '$cadCategoria'";
            $teste = $this -> consultaBanco($consultaExiste);
            
            if (boolval($teste) === true) {
                return false;
            } else {
                $consultaProximoAI = "SHOW TABLE STATUS LIKE 'noticia'";
                $resultado = $this -> consultaBanco($consultaProximoAI);
                
                $tipoCategoria = $this -> consultaCategoria($cadCategoria);

                $insereNoticia -> bindValue(':titulo', $cadTitulo);
                $insereNoticia -> bindValue(':conteudo', $cadConteudo);
                $insereNoticia -> bindValue(':tipoCategoria', $tipoCategoria);

                $insereNoticia -> execute();

                $consultaNoticia = "SELECT * FROM noticia WHERE codNoticia = ". $resultado[0]['Auto_increment'];
                $resultado = $this -> consultaBanco($consultaNoticia);
    
                return boolval($resultado);
            }
            
        }
    }
?>