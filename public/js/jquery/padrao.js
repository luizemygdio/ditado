$(document).ready(function(){
    
    $("#btn-menu-suspenso").on('click', function(){
        
        $("#btn-menu-suspenso").hide();
        $("#btn-close-menu-suspenso").show();
        $("#sessao-menu-suspenso").slideToggle();
        
    });
    
    $("#btn-close-menu-suspenso").on('click', function(){
        
        $("#btn-close-menu-suspenso").hide();
        $("#btn-menu-suspenso").show();
        $("#sessao-menu-suspenso").slideToggle();
        
    })
    
})

