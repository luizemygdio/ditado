/*
*
* JAVASCRIPT DA PÁGINA "HOME"
*
*/

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
    
    
    /* AÇÃO AO CLICAR BUTTON {MENU SUSPENSO} */
    $("#btn-menu-suspenso").on('click', function(){
       
        // Escondo botão de menu suspenso
       $("#btn-menu-suspenso").hide();
       
       //Exibo o botão de close menu suspenso
       $("#btn-close-menu-suspenso").show();
       
       // Exibo caixa de menu suspenso
       $("#caixa-menu-suspenso").slideDown();
       
    });
    
    /* AÇÃO AO CLICAR BUTTON {CLOSE MENU SUSPENSO} */
    $("#btn-close-menu-suspenso").on('click', function(){
        
       // Escondo botão de close menu suspenso 
       $("#btn-close-menu-suspenso").hide(); 
       
       //Exibo o botão de menu suspenso
       $("#btn-menu-suspenso").show();
       
       // Escondo caixa de menu suspenso
       $("#caixa-menu-suspenso").slideUp();
       
    });
    
    /* AÇÃO AO CLICAR NO LINK {+ INFO} */
    $(".btn-mais-info").on('click', function(){
        
        $("small").removeClass("d-none d-lg-block d-xl-block");
       
    });
    
});

