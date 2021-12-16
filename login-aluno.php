<div class="row">

    <div class="col-12">

        <div class="row">
            
            <div class="col-12">
                
                <h1 class="text-center"><?php echo APP_NOME; ?></h1>
                
            </div>
            
        </div>
        
        <div class="row">
            
            <div class="col-12">
                
                
                <form class="col-lg-6 offset-lg-3 col-10 offset-1 border p-lg-3 p-2">
                    
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Informe seu nome</label>
                      <span id="alerta_nome" class="alerta_campo"></span>
                      <input type="text" class="form-control" id="nome" aria-describedby="nomr">
                    </div>
                    
                    <div class="mb-3 ">
                      <label for="exampleInputPassword1" class="form-label">Informe a chave acesso</label>
                      <span id="alerta_chave_acesso" class="alerta_campo"></span>
                      <input type="text" class="form-control" id="chave_acesso">
                    </div>
                    
                    <button type="button" class="btn btn-primary" id="btn-enviar">Enviar</button>
                    
                  </form>
                
            </div>
            
        </div>
        
    </div>
    
</div>

<!-- ARMAZENO EM UM VARIAVEL OS JS E PLUGINS QUE DEVRAM SER CARREGADO NA INDEX --> 
<?php 

//CARREGANDO JS DA PG
$js_e_plugins_personalizados_pg = "<script type='text/javascript' src='public/js/pg/login-aluno.js'; ?></script>" ; 

//CARREGANDO TOAST
$js_e_plugins_personalizados_pg .= "<script type='text/javascript' src= 'public/plugins/toast-kamranahmed/jquery.toast.min.js'></script>"; 
    

