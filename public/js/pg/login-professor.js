/*
*
* JAVASCRIPT DA PÁGINA "LOGIN"
*
*/

/* Funtion para verificar se campos foram preenchidos
* @ obj
* return true ou false
*/

function controleFormulario(o_formulario){

   // crio variveis
    var tem_erro = false;
    
    // limpo possiveis espaços em branco
    o_formulario.codigo = removerEspaco(o_formulario.codigo);
    o_formulario.qtd_aluno = removerEspaco(o_formulario.qtd_aluno);
    o_formulario.qtd_pergunta = removerEspaco(o_formulario.qtd_pergunta);
    o_formulario.turma = removerEspaco(o_formulario.turma);
   
    
    // Se codigo for vazio
    if(o_formulario.codigo.length == 0){
        o_formulario.codigo.length
        tem_erro = true;
        $("#codigo").css({"border":"0.1em solid red"});
        
    }else if(o_formulario.codigo.length != 4){
        tem_erro = true;
        $("#codigo").css({"border":"0.1em solid red"});
        $("#alerta_codigo").append("<br/>O de ter 4 digitos!");
        $("#alerta_codigo").show();
    }
    
    // Se qtd aluno for 0
    if(o_formulario.qtd_aluno == 0){
        em_erro = true;
        $("#qtd_aluno").css({"border":"0.1em solid red"});
        $("#alerta_qtd_aluno").append("<br/>Informe o nº de perguntas!");
        $("#alerta_qtd_aluno").show();
        
    }
    
    // Se qtd pergunta for 0
    if(o_formulario.qtd_pergunta == 0){
        em_erro = true;
        $("#qtd_pergunta").css({"border":"0.1em solid red"});
        $("#alerta_qtd_pergunta").append("<br/>Informe quantos alunos irão participar!");
        $("#alerta_qtd_pergunta").show();
        
    }
    
    // Se bairro for vazio
    if(o_formulario.turma == 0){
    
        tem_erro = true;
        $("#alerta_turma").append("<br/>Informe a turma!");
        $("#turma").css({"border":"0.1em solid red"});
    
    }
    
    
    if(tem_erro == true){
        
        return false;
        
    }else{
        
        return true;
        
    }
}

$(document).ready(function(){
    
    /*
     * 
     * Definições inicial da página
     * 
    */
   
    
    /*
     * 
     * Definições de manipulação de elementos da página
     * 
     */
  
    /* AÇÃO AO CLICAR NO LINK {+ INFO} */
    $("#btn-enviar").on('click', function(){
        
        // GARANTO QUE TODOS OS CAMPOS INICIAM SEM ALERTAS DE ERROS
        $("input").css({"border":"1px solid #c2c2c2"});
        $("select").css({"border":"1px solid #c2c2c2"});
        $(".alerta_campo").html("");
        $(".alerta_campo").hide();
        
        var o_formulario = new Object(); // Obj pessoa
        o_formulario.codigo = $("#codigo").val();
        o_formulario.qtd_aluno = $("#qtd_aluno").val(); 
        o_formulario.qtd_pergunta = $("#qtd_pergunta").val(); 
        o_formulario.turma = $("#turma").val();
        
        /*
         * 
         * FUNCTION DE CONTROLE
         * @ return true ou false
         * 
        */
        if(controleFormulario(o_formulario) == false){
        
            // Mostra mensagem de erro
            $.toast({
                heading: 'Erro',
                text: 'Verifique os campos obrigatórios!',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-center',
                hideAfter: 2000, // em milisegundos
                allowToastClose: true
                /*afterHidden: function() {
                    window.location.reload();
                }*/
            });  
            
            return false;
        
        };
        
        /*
         * 
         * INICIO DA REQUISIÇÃO AJAX
         * 
         */
        
        $.ajax({
            cache: false,
            type: "POST",
            //dataType: 'json',
            url: "app/controller/jogoController",
            data: { 
                
                'o_formulario':o_formulario,
                'acao': 'postCadastrar'

            },
            beforeSend: function() { 
                
                
            },
            success: function(response) {

                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
                
                // Checo retorno
                if (response.status == 'erro') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Erro',
                        text: 'Não foi possivel criar o cadastro, tente novamente!',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-center',
                        hideAfter: 2000, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.reload();
                        }
                    });  
                    
                } else if (response.status == 'sucesso') {
                   
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Cadastro criado com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-center',
                        hideAfter: 2000, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.replace("jogo.php");
                        }
                    });  
            
                               
                }

            },
            complete: function(response) {

            },
            error: function(response, thrownError) {

            }
        });// Fecho ajax
        
       
    });
    
});

