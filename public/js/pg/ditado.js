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
    
   
}

$(document).ready(function(){
    
    $("#pergunta_1").show();
    
    $(".btn_proxima_pergunta").on("click", function(){
        
       // recebo o value do botão 
       var pergunta = parseInt($(this).val()); 
       var proxima_pergunta = parseInt(pergunta + 1);
       // Escondo a pergunta atual
       $("#pergunta_"+pergunta).slideUp(1000);
       
       //Exibo ao próxima pergunta
        $("#pergunta_"+proxima_pergunta).slideDown(1000);
       
       alert(proxima_pergunta);
        
    });
    
});

