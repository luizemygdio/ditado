<?php
//https://www.youtube.com/watch?v=uG64BgrlX7o

//namespace \app\Classe\Conexao; 

$filename = 'app/biblioteca/HttpStatusCodeInterface.php';

if (file_exists($filename)) {
   require_once 'app/biblioteca/HttpStatusCodeInterface.php';
} else {
    require_once '../biblioteca/HttpStatusCodeInterface.php';
}


class Database implements HttpStatusCodeInterface{
  
    const HOST = "localhost"; // host de conexao de dados
    const NAME = 'ditado'; // nome do banco de dados
    const USER = "root"; // usuario do banco de dados
    const PASS = ""; // senha do banco de dados
    
    private $table;
    private $connection;
    
    public function __construct($table = null) {
        
        $this->table = $table;
        $this->setConnection();
       
    }

    // Conexao 
    private function setConnection(){

        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            
            $mesagem_erro = $e->getMessage();
            
            return $mesagem_erro;
        }


    } 
    
    /**
     * Método responsável por executar queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params =[]){
  
        $stm = $this->connection->prepare($query);
        //$stm = $this->db_connect()->prepare($query);
        $stm->execute($params);

        return $stm;
      
    }


    /*
     * Método para fazer insert no banco de dados
     * @param array $value { field => value }
     * @return integer {retorna id inserido}
     * 
     */
    public function insert($values) {
        
        //EX: $sql = "INSERT INTO pessoa(cod_informado, nome_aluno, turma_aluno, dia, status)VALUES(:cod_informado, :nome_aluno, :turma_aluno, :dia, :status)";
        
        //Dados da query
        $fields = array_keys($values); //Campos
        $binds = array_pad([], count($fields),'?'); //Dados
        
        // MONTA QUERY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        
        // Executa o insert
        $this->execute($query, array_values($values));
        $cod = $this->connection->lastInsertId(); // retorna o ultimo id inserido
        
        if ($cod == 0 OR $cod == "" OR $cod == " ") {
            
            // Exception de erro
            throw new \Exception(
                //$e->getMessage(),
                'Erro: ' . "\n" . 'Falha no ato do cadastro do cliente.',
                self::INTERNAL_SERVER_ERROR_CODE
            );
            
        }
        
        // Retorno
        return (object) array(
                'http_status_code' => self::OK_CODE,
                'cod' => $cod
        );
     
        
    }
    
    /*
     * Método para selecionar registro do banco de dados
     * @param array $value { field => value }
     * @return PDOStatement com endereco
     * 
     */
    public function select($where = null, $order = null, $limit = null, $fields = "*") {
        
        // $query = 'SELECT * FROM tabela WHERE ... ORDER BY ... LIMIT ...';
       
        // FORMATANDO A QUERY    
        $where = strlen($where) ? ' WHERE '. $where  : ""; 
        $order = strlen($order) ? ' ORDER BY '. $order  : ""; 
        $limit = strlen($limit) ? ' LIMIT '. $limit  : ""; 
        
        $query = 'SELECT '. $fields .' FROM '. $this->table .' '. $where .' '. $order .' '. $limit;
        
        return $this->execute($query);
        
    }
    
    /*
     * Método para excluir um registro do banco de dados
     * @param array $value { field => value }
     * @return PDOStatement com endereco
     * 
     */
    public function delete($where = null, $order = null, $limit = null, $fields = "*") {
        
        // $query = 'DELETE FROM tabela WHERE cod = ?';
       
        // FORMATANDO A QUERY    
        $where = strlen($where) ? 'WHERE '. $where  : ""; 
        
        $query = 'DELETE FROM '. $this->table .' '. $where ;
        
        return $this->execute($query);
        
    }
  
}
