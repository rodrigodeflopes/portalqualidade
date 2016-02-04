<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/pages/itemsImport',
    '/js/qrcode/qrcode'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Importar</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-download position-left"></i> Importar', array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    
        <!-- Content -->
        <div class="row">
                <div class="col-lg-8">
                        
                    <!-- Task details -->
                    <div class="panel panel-flat">
                            <div class="panel-heading">
                                    <h6 class="panel-title"><i class="icon-qrcode position-left"></i> Importação de FVS para o portal</h6>
                                    <div class="heading-elements">
                                            <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                            </ul>
                                    </div>
                            </div>
                            <div class="panel-body">  
                                    <p>MUITA ATENÇÃO ao selecionar o bloco que será sincronizado com o Portal QualiTab.</p> 
                                    <p>A importação de dados do dispositivo para o portal ocorre apenas selecionando um bloco por vez. O Bloco selecionado para ser importado, será transmitido totalmente. Todas as FVS e verificações serão carregadas para o portal conforme estão salvas no seu dispositivo.</p>
                                    <hr>
                                    <img src="/img/qrcodeexample.jpg" width="300px">
                                    <hr>
                                    <p>Mantenha sempre o portal QualiTab atualizado. E antes de iniciar as suas verificações em campo, certifique-se de que você está com seu dispositivo devidamente atualizado.</p>
                            </div>
                    </div>
                    <!-- /task details -->
                    
                </div>
            
                <div class="col-lg-4">

                        <!-- Ajax sourced data -->
                        <div class="panel panel-flat">
                                <div class="panel-heading">
                                        <h6 class="panel-title"><i class="icon-tablet position-left"></i> Escaneie aqui...</h6>
                                        <div class="heading-elements">
                                                <ul class="icons-list">
                                                        <li><a data-action="collapse"></a></li>
                                                </ul>
                                        </div>
                                </div>
                            
                                <div class="panel-body">   
                                    <div class="panel-body">
                                            <div id="qrcode" style="position:relative; left:25%; margin-left:-50px;"> </div>                                        
                                    </div>
                                </div>
                        </div>
                        <!-- /ajax sourced data -->
                        
                </div>
        </div>
        <!-- /Content -->

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->

