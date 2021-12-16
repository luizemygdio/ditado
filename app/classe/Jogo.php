<?php



$filename = '../classe/Conexao.php';

if (file_exists($filename)) {
    require_once '../classe/Conexao.php';
} else {
    require_once 'app/classe/Conexao.php';
}


class Jogo {
    
    private $cod_jogo;
    public $chave_acesso;
    public $qtd_aluno;
    public $sequencia_pergunta;
    public $turma;
    public $data;
    public $status;
    
    
    /*
      * METODO PARA CADASTRAR UM NOVO PARTICIPANTE
      * @return bololean {true ou false}
    */
    function postCadastrar(){

        $pdo = new Database('jogo'); // tabela jogo
        $resul = $pdo->insert([ 

                                'chave_acesso' => $this->chave_acesso.".".date("Y-m-d"),
                                'qtd_aluno' => $this->qtd_aluno,
                                'turma' => $this->turma,
                                'data' => date("Y-m-d"),
                                'status' => 1

                            ]);

        return $resul;
      
    }
    
    /**
     * METODO BUSCO O JOGO PELO COD DE ACESSO
     * @ recebo: string
     * @return: obj or false
     */
    static function buscarJogoChaveAcesso($string = null, $order = null, $limit = null){
        
        // Monto where 
        $where = "chave_acesso = '".$string."'";
        
        $result = (new Database('jogo'))->select($where, $order, $limit) // tabela jogo
                                       ->fetchAll(PDO::FETCH_CLASS, self::class);
        
        if(count($result) == 0){
            
            return false;
            
        }else{
            
            return (object)[
              
                'cod_jogo' => $result[0]->cod_jogo,
                'jogo' => $result
                
            ];
                
         
        }
        
    }
    
    /**
     * METODO PARA VERIFICAR QUANTOS ALUNOS ESTÃO LOGADO NO JOGO
     * @ recebo: chave_acesso
     * @return: obj
     */
    static function quantosLogados($string = null, $order = null, $limit = null){
        
        // Monto where 
        $where = "cod_jogo = ".$string;
        
        $resut = (new Database('pergunta'))->select($where, $order, $limit) // tabela jogo
                                       ->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return count($resut);
        
    }


    /*
     * METODO PARA BUSCAR SEQUENCIA DE DITADO DO JOGO
     * @ $cod
     * return string com sequencia 
     */
    static function buscarPerguntaPorCodjogo($where = null, $order = null, $limit = null){
        
        return (new Database('pergunta'))->select($where, $order, $limit) // tabela bairro
                                       ->fetchAll(PDO::FETCH_CLASS, self::class);
 
        
    }
    
    /*
     * METODO PARA EXCLUIR UMA JOGO
     * @return bololean {true ou false}
     */
    static function excluir($cod){
        
        // Monto where 
        $where = "cod_jogo = ".$cod;
         
        return (new Database('jogo'))->delete($where); // tabela jogo

    }
}
