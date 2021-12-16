<?php

    $o_ditado = buscarPerguntaPorCodjogo($jogo->cod_jogo);
    echo "<pre>"; print_r ($o_ditado); echo "</pre>"; exit;
?>

<div class="row">
    
    <div class="col-12">
        
         <div class="row">

            <div class="col-12">

                <h1 class="text-center"><?php echo APP_NOME; ?></h1>

            </div>

        </div>
        
    </div>
    
</div>

<div class="row">

    <div class="col-12">
        
        <?php 
                        
            
            
            $i = 0;
            foreach ($o_ditado as $d){ $i++;
        ?>                    
        
        <div class="row" id="pergunta_<?php echo $i; ?>" style="display: none">
        
            <div class="col-lg-4 col-sm-12 offset-lg-4">
        

                <div class="row">


                    <div class="col-12 p-3">

                       
                            
                                
                            <?php echo "<img src='public/imagens/animais/".$d->numero_pergunta_ditado."' height='300px' width='100%'/>"; ?>
                                
                           
                       

                    </div>

                </div>

                <div class="row">

                    <div class="col-12">

                        <form class="col-lg-12 pt-2">

                            <button type="button" class="btn btn-primary btn_proxima_pergunta col-12" value="<?php echo $i; ?>">Próximo</button>

                        </form>

                    </div>

                </div>
                
                
                <div class="row">

                    <div class="col-12">
                      
                        <hr/>
                        
                    </div>
                    
                </div>    
                
                <div class="row">

                    <div class="col-12">

                        <table class="table table-responsive">
                            
                            <thead>
                                
                                <tr>
                                
                                    <th>    
                                        Aluno
                                    </th>    
                                
                                    <th class="text-center">    
                                        Resposta
                                    </th>
                                    
                                </tr>
                                
                            </thead>
                            
                        </table>

                    </div>

                </div>
                
            </div>
            
        </div> 
        
        <?php    
            }
        ?>
        
    </div>
    
</div>

<!-- ARMAZENO EM UM VARIAVEL OS JS E PLUGINS QUE DEVRAM SER CARREGADO NA INDEX --> 
<?php 

//CARREGANDO JS DA PG
$js_e_plugins_personalizados_pg = "<script type='text/javascript' src='public/js/pg/ditado.js'; ?></script>" ; 

//CARREGANDO TOAST
$js_e_plugins_personalizados_pg .= "<script type='text/javascript' src= 'public/plugins/toast-kamranahmed/jquery.toast.min.js'></script>"; 
    
