<!DOCTYPE html>
<html lang="pt-br">
<?php 
    session_start();
    require_once 'app/classe/sistema.php';
    require_once 'app/controller/acessoController.php';
    //include_once 'app/biblioteca/default-delivery.php';
    include_once 'componentes/layout/header.php'; 
    
    
   //unset($o_aluno_logado);
      
    $o_aluno_logado = controlerAcesso::verificarAcesso();
    
    //print_r($o_aluno_logado);
    //unset($o_aluno_logado);
?>
    
<body>
    
    <?php 
        $o_aluno_logado->logado = 0;
        if($o_aluno_logado->logado == 1){
           
            if(isset($pg)){
            
            // Incluir a pagina corrente
            //include $pg.".php";
            
            }else{

                include 'ditado.php';

            }
            
        }else{
            
            
            include 'login-aluno.php';
            
        }
    
        
    
    ?>
    
    <!-- CARREGANDO BOOTSTRAP JS -->
    <script type="text/javascript" src="<?php echo 'public/plugins/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js' ?>"></script>

    <!-- CARREGANDO JQUERY JS -->
    <script type="text/javascript" src="<?php echo 'public/plugins/jquery/dist/jquery.min.js' ?>"></script>
    
    <!-- CARREGANDO BIBLIOTECA JS -->
    <script type="text/javascript" src="<?php echo 'public/plugins/biblioteca/biblioteca.js' ?>"></script>
    
    <!-- CARREGANDO JS PADRÃO -->
    <script type="text/javascript" src=" <?php echo 'public/js/pg/padrao.js'; ?>"> </script> 
  
    <!-- CARREGANDO JS E PLUGINS DA PAGINA CORRENTE {OS JS SÃO IMPORTANDOS DENTREO DOS COMPONETES} -->
    <?php echo $js_e_plugins_personalizados_pg; ?>
    
</body>

</html>
