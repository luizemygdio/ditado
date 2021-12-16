<?php

$filename = '../../app/classe/Jogo.php';

if (file_exists($filename)) {
    require_once '../../app/classe/Jogo.php';
    require_once '../../app/classe/Pergunta.php';
    require_once '../../app/classe/Aluno.php';
    require_once '../../app/biblioteca/biblioteca.php';
} else {
    require_once 'app/classe/Jogo.php';
    require_once 'app/classe/Pergunta.php';
    require_once 'app/classe/Aluno.php';
    require_once 'app/biblioteca/biblioteca.php';
}



/**
 * 
 * SE FOR REQUISIÇÃO VIA POST
 * 
*/

if(isset($_POST['acao'])){
    
    $acao = $_POST['acao'];
        
    switch($acao):
        
        case 'postCadastrar':
            
           
            // Inicio as variaveis auxiliares
            $erro = false;
            
            // Recebo dados via post
            $o_formulario = $_POST["o_formulario"];
         
            // Instacio a class
            $o_jogo = new Jogo();
            $o_jogo->chave_acesso = $o_formulario['codigo'];
            $o_jogo->qtd_aluno = $o_formulario['qtd_aluno'];
            $o_jogo->qtd_pergunta = $o_formulario['qtd_pergunta'];
            $o_jogo->turma = $o_formulario['turma'];
            
            // Function para gerar a sequencia de perguntas
            $sequencia_ditado = Biblioteca::gerarSequenciaDitado($o_jogo->qtd_pergunta);
           
            // Function para cadastrar novo jogo
            $result = $o_jogo->postCadastrar();
            
            if($result->http_status_code == 200 OR $result->http_status_code == 201){
                
                // Rodo vetor com a quantidados de perguntas
                for($i = 0; $i < $o_jogo->qtd_pergunta; $i++){
                    
                    // Function para cadastrar perguntas
                    $o_pergunta = new Pergunta();
                    $o_pergunta->cod_jogo = $result->cod;
                    $o_pergunta->numero_pergunta = $sequencia_ditado[$i];
                    
                    // Function para Cadastrar pergunta
                    $result_pergunta = $o_pergunta->postCadastrar();
                    
                    
                    // Se de erro
                    if($result_pergunta->http_status_code != 200 && $result_pergunta->http_status_code != 201){
                        
                        //Excluo as perguntas
                        Pergunta::excluir($result->cod);
                        
                        // Excluo o jogo
                        Jogo::excluir($result->cod);
                        
                        //$erro = true;
                        
                        break;
                        
                    }
                }
                
                if($erro == true){ // ERRO
                    
                    // Mensagem de erro
                    $status = $status = 'erro';
                    $msg = Biblioteca::mensagensAcoes($result_pergunta->http_status_code);
                    
                }else{ // SUCESSO
                    
                    // Jogo Criado com sucesso
                    $o_jogo = (object) array(
                        'criado' => '1',
                        'cod_jogo' => $result->cod,
                        'chave_acesso' => $o_jogo->chave_acesso,
                        'qtd_aluno' => $o_jogo->qtd_aluno,
                        'qtd_pergunta' => $o_jogo->qtd_pergunta,
                        'turma' => $o_jogo->turma,
                        'data' => date('Y-m-d')
                    );

                    session_start();
                    $_SESSION['jogo'] = $o_jogo; 

                    // Jogo Criado com sucesso
                    $status = 'sucesso';
                    $msg = Biblioteca::mensagensAcoes($result->http_status_code);
                    
                }
              
            }else{
                
                // Erro ao cadastrar endereco
                $status = $status = 'erro';
                $msg = Biblioteca::mensagensAcoes($result->http_status_code);
                
                // Retorno
                echo json_encode(array(

                    'status' => 'erro',
                    'msg' => 'Erro ao criar o jogo, tente novamente!'

                ));
                
            }
            
            
            
            
        break;
        
        case 'postLogarAluno':
            
            // Inicio as variaveis auxiliares
            $erro = false;
            
            // Recebo dados via post
            $o_formulario = $_POST["o_formulario"];
            
            $nome = $o_formulario['nome'];
            $chave_acesso = $o_formulario['chave_acesso'].'.'.date("Y-m-d");
            
            // Function para recuperar cod do jogo e obj com dados do jogo
            $obj_jogo = Jogo::buscarJogoChaveAcesso($chave_acesso);
           
            // Se cod do jogo for falso
            if($obj_jogo->cod_jogo == false){
                
                // Mensagem de erro
                $status = 'erro';
                $msg = 'Jogo não encontrado';
                
            }else{ // Se tiver cod do jogo
               
                // Function para retorna quantidade de alunos logado
                $total_logado = Jogo::quantosLogados($obj_jogo->cod_jogo);
                
                //echo '<pre>'; print_r($obj_jogo->jogo[0]->qtd_aluno); echo "</pre>";
                if($total_logado > $obj_jogo->jogo[0]->qtd_aluno ){
                    
                    // Mensagem de erro
                    $status = 'erro';
                    $msg = 'Jogo já está cheio';
                    
                }else{
                    
                    $o_aluno = new Aluno();
                    $o_aluno->nome_aluno;
                    $o_aluno->cod_jogo;
                    
                    // Function para Registra o aluno em perguntas
                    $resp_aluno= $o_aluno->postCadastrar();
                    
                    echo "<pre>"; print_r($resp_aluno); echo"</pre>";
                    exit;
                    // Mensagem de erro
                    $status = 'sucesso';
                    $msg = 'Vamos começar!';
                }
                
            }
            
           
            
        break;    

        default:
            
        break;    
        
    endswitch;
    
    
    // Retorno
    echo json_encode(array(

        'status' => $status,
        'msg' => $msg

    ));
                
   
}
   
function  buscarPerguntaPorCodjogo($cod_jogo){

    // Monto a condição where;
    $where = " cod_jogo = ". $cod_jogo;

    return Jogo::buscarPerguntaPorCodjogo($where);

}


/*
* Function verifica se exite um jogo criado
* return true ou false
*/
function acessoJogo(){

   if(isset($_SESSION["jogo"])){
       return true;
   }else{
       return false;
   }

}
   

 






