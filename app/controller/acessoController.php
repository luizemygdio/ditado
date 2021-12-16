<?php

class controlerAcesso {
    
    // Metodos
    static function verificarAcesso(){
       
        if(isset($_SESSION['o_aluno_logado'])){
           
            $o_aluno_logado = $_SESSION['o_aluno_logado'];
            
        }else{
            
            $o_aluno_logado = (object) array(
                
                'logado' => '0',
               
            );
   
        }
        
        return $o_aluno_logado;
        
    }
    
    static function verificarAcessoProfessor(){
        
        if(isset($_SESSION['o_professor_logado'])){
           
            $o_professor_logado = $_SESSION['o_professor_logado'];
            
        }else{
            
            $o_professor_logado = (object) array(
                
                'logado' => '0',
               
            );
   
        }
        
        return $o_professor_logado;
        
    }
    
}
