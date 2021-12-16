<?php 

class Pergunta {
    
    private $cod_pergunta;
    public $cod_jogo;
    public $numero_pergunta;
    
    /*
      * METODO PARA CADASTRAR UM NOVO PARTICIPANTE
      * @return bololean {true ou false}
    */
    function postCadastrar(){
        
        $pdo = new Database('pergunta'); // tabela pergunta
        $resul = $pdo->insert([

                                'cod_jogo' => $this->cod_jogo,
                                'numero_pergunta_ditado' => $this->numero_pergunta

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