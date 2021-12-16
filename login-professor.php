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
                    
                    <div class="mb-3 ">
                      <label for="exampleInputPassword1" class="form-label">Informe o código de 4 digitos</label>
                      <span id="alerta_codigo" class="alerta_campo"></span>
                      <input type="text" class="form-control" id="codigo">
                    </div>
                    
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Quantos alunos</label>
                        <span id="alerta_qtd_aluno" class="alerta_campo"></span>
                        <select id="qtd_aluno" class="form-select">
                            <option value="0"></option>
                            <?php for($i=1; $i <= 30; $i++): ?>
                            
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            
                            <?php endfor;?>
                        </select>
                     </div>
                    
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Quantas perguntas</label>
                        <span id="alerta_qtd_pergunta" class="alerta_campo"></span>
                        <select id="qtd_pergunta" class="form-select">
                            <option value="0"></option>
                            <?php for($i=1; $i <= 30; $i++): ?>
                            
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            
                            <?php endfor;?>
                        </select>
                     </div>
                    
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Informe sua turma</label>
                        <span id="alerta_turma" class="alerta_campo"></span>
                        <select id="turma" class="form-select">
                          <option value='0'></option>
                          <option value='10'>Pré-escola</option>
                          <option value='1'>1º ano</option>
                          <option value='2'>2º ano</option>
                          <option value='3'>3º ano</option>
                          <option value='4'>4º ano</option>
                          <option value='0'>5º ano</option>
                          <option value='6'>6º ano</option>
                          <option value='7'>7º ano</option>
                          <option value='8'>8º ano</option>
                          <option value='9'>9º ano</option>
                        </select>
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
$js_e_plugins_personalizados_pg = "<script type='text/javascript' src='public/js/pg/login-professor.js'; ?></script>" ; 

//CARREGANDO TOAST
$js_e_plugins_personalizados_pg .= "<script type='text/javascript' src= 'public/plugins/toast-kamranahmed/jquery.toast.min.js'></script>"; 
    

