<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/js/qrcode/qrcode'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Versão do update</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-width position-left"></i> Updates', array('action' => 'index'), array('escape' => false)); ?></li>
			<li class="active">Versão do update</li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    	<?php echo $this->Session->flash(); ?> 
        
        <!-- Content -->
        <div class="row">
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
                            
                                <div class="panel-body" style="height: 300px;">   
                                    <div class="panel-body">
                                            <div id="qrcode" style="position:relative; left:25%; margin-left:-50px;"> </div>                                        
                                    </div>
                                </div>
                        </div>
                        <!-- /ajax sourced data -->
                        
                </div>
            
                <div class="col-lg-8">
                        
                    <!-- Task details -->
                    <div class="panel panel-flat">
                            <div class="panel-heading">
                                    <h6 class="panel-title"><i class="icon-width position-left"></i> Informações da versão</h6>
                                    <div class="heading-elements">
                                            <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                            </ul>
                                    </div>
                            </div>
                            <div class="panel-body" style="height: 300px;">  
                                    <p style="font-size: 20px;"><strong><?php echo h($appUpdate['AppUpdate']['name']); ?></strong></p>
                                    <p><strong>Descrição: </strong><?php echo h($appUpdate['AppUpdate']['description']); ?></p>
                                    <p><strong>Criado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $appUpdate['AppUpdate']['created'])); ?></p>
                            </div>
                    </div>
                    <!-- /task details -->
                    
                </div>
            
        </div>
        <!-- /Content -->

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->

<script>
document.getElementById('qrcode').innerHTML = "";
    var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 250,
            height : 250
    });
        
    qrcode.makeCode('<?php echo Router::url('/', true); ?>transfers/appUpdate/<?php echo $appUpdate['AppUpdate']['id']; ?>');
</script>