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
                                    <h6 class="panel-title"><i class="icon-qrcode position-left"></i> Importar verificações</h6>
                                    <div class="heading-elements">
                                            <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                            </ul>
                                    </div>
                            </div>
                            <div class="panel-body">  
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                    <hr>
                                    <img src="/portalqualidade/img/qrcodeexample.jpg" width="300px">
                                    <hr>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
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

