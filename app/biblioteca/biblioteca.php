<?php

class Biblioteca {
    /**
     * Function para remover mascara de telefone
     * @ string
     * return $string
     */
    public static function removerMascaraTelefone($string){

       $string;

       $string = preg_replace('/[\@\.\;\" "()-]+/', '', $string);
       return $string;

    }

    /*
     * Mensagens de ações
     * @ int
     * return string 
     */
    public static function mensagensAcoes($cod){

        switch($cod):

            case 200 : // 200 = OK
                return 'Cadastro realizado com sucesso!';
            break;  

            case 201 : // 201 = Created  (para quando o registro for criado com sucesso)
                return 'registro criado com sucesso';
            break;

            case 204 : // 204 = No content  (para quando a requisição foi um sucesso, mas nenhum registro foi encontrado)
                return 'Nenhum registro foi encontrado!';
            break;

            case 400 : // 400 = Bad request
                return 'Requisição é inválida. Tente novamente!';
            break;

            case 401 : // 401 = Authentication failed
                return 'Usuário não tem autorização!';
            break;

            case 404 : // 404 = Not found
                return 'A URL não foi localizada!';
            break;

            case 422 : // 422 = Data validation failed
                return 'Erro ao processa a informação. Tente novamente!';
            break;

            case 424 : // 424 = Failed dependency
                return 'Erro de dependência!';
            break;

            case 500 : // 500 = Internal server error  (para erros gerais do script)
                return 'Não foi possível executar a solicitação!';
            break;

        endswitch;

    }
    
    /*
     * Gera a sequencia do ditado
     * @ int 
     * return array 
     */
    public static function gerarSequenciaDitado($tamanho_array){
    
        $pergunta = array(); 
        
        for($i = 0; $i < $tamanho_array; $i++){
            
            $int = random_int(1, $tamanho_array);
            
            $pergunta[$i] =  $int;
            
            if(in_array($int, $pergunta)){
            
                $pergunta[$i] =  $int;
                
            }
           
        }
        
        return $pergunta;
        
    }
    
}    