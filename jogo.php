<!DOCTYPE html>
<html lang="pt-br">
<?php 
    session_start();
    require_once 'app/classe/sistema.php';
    require_once 'app/controller/jogoController.php';
    include_once 'componentes/layout/header.php'; 
    
    //0 = não tem jogo; 1 = tem jogo; 
    $tem_jogo = acessoJogo();   
   
?>
    
<body>
    
    <?php 
       
        if($tem_jogo == 1){
            
            $jogo = $_SESSION['jogo'];
            
           
            include 'componentes/jogo/ditado.php';
            
        }else{
            
            
            include 'index-professor.php';
            
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



