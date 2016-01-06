<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Obras'), array('controller' => 'enterprises', 'action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Dados da Torre/Bloco</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        <div class="btn-toolbar">     
            <?php echo $this->Html->link($this->Html->tag('i', ' Editar', array('class'=>'icon-edit')), array('action'=>'edit', $tower['Tower']['id']), array('escape' => false, 'class'=>'btn btn-primary btn-mini')); ?>     
        </div>  
        <div class="well"> 
            <div class="row-fluid">
                <div class="pull-left">
                    <?php echo $this->Html->image($tower['Tower']['image_path'], array('class' => 'img-building')); ?>  
                </div>
                <div class="pull-left" style="margin-left: 40px;">
                    <p class="lead"><strong><?php echo h($tower['Tower']['name']); ?></strong></p>
                </div>                    
            </div>           
        </div>
        
        
        <div class="row-fluid">
            <div class="span8">
                <div class="well">
                    <div style="float:right; margin-top: 1em;" class="span2">
                        <strong>Data ref.: </strong><span class="label"> <?php echo '04/out/2015'; ?> </span>       						
                    </div>
                    <h3><?php echo __('Blocos / Torres'); ?></h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Loc1</th>
                                <th>Loc2</th>
                                <th>Loc3</th>
                                <th>Serviço</th>
                                <th>Verificação</th>
                                <th>Verif.</th>
                                <th>Foto</th>
                            </tr>
                        <thead>
                        <tbody>                              
                            <?php foreach ($items as $item): ?>
                                <tr> 
                                    <td><?php echo $item['Item']['loc1']; ?></td>
                                    <td><?php echo $item['Item']['loc2']; ?></td>
                                    <td><?php echo $item['Item']['loc3']; ?></td>
                                    <td><?php echo $item['Item']['loc4']; ?></td>
                                    <td><strong><?php echo $this->Html->link(h($item['Item']['name']), array('controller' => 'items', 'action'=>'view', $item['Item']['id']), array('escape' => false)); ?>&nbsp;</strong></td>     
                                    <?php   if(Set::check($item, 'Measurement.0')){ ?>
                                        <?php if($item['Measurement']['0']['checked'] === '1'){ ?>
                                            <td><i class='icon-thumbs-up' style='font-size: 22px; color:green;'></i></td>
                                        <?php }else if($item['Measurement']['0']['checked'] === '2'){ ?>
                                            <td><i class='icon-thumbs-down' style='font-size: 22px; color:red;'></i></td>
                                        <?php }else if($item['Measurement']['0']['checked'] === '3'){ ?>
                                            <td><i class='icon-thumbs-up' style='font-size: 22px; color:orange;'></i></td> 
                                        <?php }else{ ?>
                                            <td></td> 
                                        <?php } ?>
                                    <?php }else{ ?>
                                            <td></td>    
                                    <?php } ?> 
                                    <?php   if(Set::check($item, 'Photo.0')){ ?>
                                        <td><i class='icon-camera' style='font-size: 22px;'></i></td>                                        
                                    <?php }else{ ?>
                                        <td></td>    
                                    <?php } ?>          
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo $this->element('pagination', array('model' => 'Item')); ?>
                 </div>
            </div>
            <div class="span4">
                <div class="well">
                    <div style="float:right; margin-top: 1em;">
                        <?php echo $this->Html->link($this->Html->tag('i', ' Adicionar', array('class'=>'icon-plus')), array('controller' => 'transfers', 'action'=>'add', $tower['Tower']['id']), array('escape' => false, 'class'=>'btn btn-primary btn-mini')); ?>         						
                    </div>
                    <h3><?php echo __('Transferências'); ?></h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Dispositivo</th>
                                <th>Data</th>         
                                <th></th>         
                            </tr>
                        <thead>
                        <tbody>                              
                            <?php foreach ($transfers as $transfer): ?>
                                <tr>
                                    <td><?php echo $transfer['Device']['name']; ?></td>
                                    <td><?php echo h($this->Time->format('d/M/Y H:i', $transfer['Transfer']['created'])); ?>&nbsp;</td>  
                                    <td><strong><?php echo $this->Html->link($this->Html->tag('i', ' Ver', array('class'=>'icon-eye-open')), array('controller' => 'transfers', 'action'=>'view', $transfer['Transfer']['id']), array('escape' => false)); ?></strong></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="well">
                    <div class="row-fluid">
                        <div id="qrcode" class="span4"> </div>
                    </div>
                </div>
            </div>
            </div>
        </div>         
    </div>
</div>


<?php echo $this->Html->script('/js/qrcode/qrcode'); ?>
<script>
    loadlink(); // This will run on page load
    
    //setInterval(function(){
    //    loadlink() // this will run after every 5 seconds
    //}, 5000);
    
    function loadlink(){
        
        //$.ajax({url: "http://servidor/portalqualidade/devices/uploadDevice", success: function(result){
            //document.getElementById("qrcode").innerHTML = '';
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                    width : 600,
                    height : 600
            });
            //qrcode.makeCode(result);
            qrcode.makeCode('http://192.168.0.153/portalqualidade/transfers/downloadAjax/<?php echo $tower['Tower']['id']; ?>');
            //qrcode.makeCode('http://tecplaner.poweredbyclear.com:8080/portalqualidade/transfers/downloadAjax/<?php echo $tower['Tower']['id']; ?>');
        //}});
    }
</script>