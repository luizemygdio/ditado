/**
 * function para remover espaços em branco
 */
function removerEspaco(string){
    
    var string
    
    string = string.replace(/ /g, ""); 
    return string;
    
}

/**
 * Function para remover mascara de telefone
 */
function removerMascaraTelefone(string){
    
   var string;
   
   string = string.replace(/[^0-9]/g,'');
   return string;
    
}
