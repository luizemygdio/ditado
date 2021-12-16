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
    o_formulario.nome = removerEspaco(o_formulario.nome);
    o_formulario.chave_acesso = removerEspaco(o_formulario.chave_acesso);
   
    // Se nome for vazio
    if(o_formulario.nome.length == 0){
        
        tem_erro = true;
        $("#nome").css({"border":"0.1em solid red"});
        
    }else if(o_formulario.nome.length < 3){
        tem_erro = true;
        $("#nome").css({"border":"0.1em solid red"});
        $("#alerta_nome").append("<br/><small>O nome deve ter no mínimo 3 letras!</small>");
        $("#alerta_nome").show();
    }
    
    // Se codigo for vazio
    if(o_formulario.chave_acesso.length == 0){
        o_formulario.chave_acesso.length
        tem_erro = true;
        $("#chave_acesso").css({"border":"0.1em solid red"});
        
    }else if(o_formulario.chave_acesso.length != 4){
        tem_erro = true;
        $("#chave_acesso").css({"border":"0.1em solid red"});
        $("#alerta_chave_acesso").append("<br/>A chave de acesso deve ter 4 digitos!");
        $("#alerta_chave_acesso").show();
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
        o_formulario.nome = $("#nome").val();
        o_formulario.chave_acesso = $("#chave_acesso").val(); 
        
        
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
                'acao': 'postLogarAluno'

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
                        text: response.msg,
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
                        text: response.msg,
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-center',
                        hideAfter: 2000, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.replace("./jogo-aluno");
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

