<h1>Licitações em andamento SSP DF - (<?php echo count($licitacoes_ssp_df); ?>)</h1>
<ul>
<?php 
    foreach ($licitacoes_ssp_df as $licitacao_ssp_df){
        echo '<li><a href="'.$licitacao_ssp_df['link'].'">'.$licitacao_ssp_df['objeto'].'<a></li>';
    }
    
?>
</ul>

<h1>Outras licitações no DF - (<?php echo count($licitacoes_df); ?>)</h1>
<ul>
<?php 
    foreach ($licitacoes_df as $licitacao_df){
        echo '<li><a href="'.$licitacao_df['link'].'">'.$licitacao_df['objeto'].'<a></li>';
    }
    
?>
</ul>

