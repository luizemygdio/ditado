<?php 

class Aluno {
    
    private $cod_aluno;
    public $cod_jogo;
    public $nome_aluno;
    
    /*
      * METODO PARA CADASTRAR UM NOVO PARTICIPANTE
      * @return bololean {true ou false}
    */
    function postCadastrar(){
        
        $pdo = new Database('aluno'); // tabela pergunta
        $resul = $pdo->insert([

                                'cod_jogo' => $this->cod_jogo,
                                'nome_aluno' => $this->nome_aluno

                            ]);

        return $resul;
      
    }
    
    /*
     * METODO PARA EXCLUIR UMA PERGUNTA
     * @return bololean {true ou false}
     */
     static function excluir($cod){
        
        // Monto where 
        $where = "cod_jogo = ".$cod;
         
        return (new Database('pergunta'))->delete($where); // tabela jogo

    }
    
    
}