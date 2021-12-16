<!DOCTYPE html>
<html lang="pt-br">
<?php 
    session_start();
    require_once 'app/classe/sistema.php';
    //include_once 'app/biblioteca/default-delivery.php';
    include_once 'componentes/layout/header.php'; 
   
?>
    
<body>
    
    <?php 
        $o_professor_logado = (object) '$o_professor_logado';
        $o_professor_logado->logado = 0;
        if($o_professor_logado->logado == 1){
           
            if(isset($pg)){
            
            // Incluir a pagina corrente
            //include $pg.".php";
            
            }else{

                include 'ditado.php';

            }
            
        }else{
            
            
            include 'login-professor.php';
            
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
