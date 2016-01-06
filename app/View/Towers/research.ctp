<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Obras'), array('controller' => 'enterprises', 'action' => 'index')); ?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link(__('Dados da obra'), array('controller' => 'enterprises', 'action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Pesquisa</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        <div class="row-fluid">
            <div class="span3">
                <div class="well"> 
                    <?php echo $this->Html->image($enterprise['Enterprise']['image_path'], array('class' => 'img-building')); ?>                                 
                    <p class="lead"><strong><?php echo $enterprise['Enterprise']['name']; ?></strong></p>  
                    <hr>
                    <h3><?php echo __('Pesquisa'); ?></h3>
                    <?php echo $this->Form->create('Tower'); ?>
                        <?php echo $this->Form->input('townhouse_id', array('label' => 'Condomínios', 'class' => 'span12', 'multiple' => 'multiple')); ?>  
                        <?php echo $this->Form->input('towers_id', array('label' => 'Blocos', 'class' => 'span12', 'type' => 'select', 'multiple' => 'multiple')); ?> 
                        <?php echo $this->Form->input('selectLoc1_id', array('label' => 'Pavimento', 'class' => 'span12', 'multiple' => 'multiple')); ?> 
                        <?php echo $this->Form->input('selectLoc2_id', array('label' => 'Apto/Hall', 'class' => 'span12', 'multiple' => 'multiple')); ?> 
                        <?php echo $this->Form->input('selectLoc3_id', array('label' => 'Outros', 'class' => 'span12', 'multiple' => 'multiple')); ?> 
                        <?php echo $this->Form->input('selectLoc4_id', array('label' => 'Serviços', 'class' => 'span12', 'multiple' => 'multiple')); ?> 
                        <?php echo $this->Form->input('selectName_id', array('label' => 'Verificaões', 'class' => 'span12', 'multiple' => 'multiple')); ?> 
                        <?php echo $this->Form->input('selectChecked_id', array('label' => 'Verificado', 'class' => 'span12', 'multiple' => 'multiple')); ?> 
                    <?php echo $this->Form->end(); ?>  
                    <br><br>   
                    <button onclick="teste2()">Procurar</button>    
                </div>
            </div>
            <div class="span9">
                <div class="well">
                    <div style="float:right; margin-top: 1em; margin-left: 1em;">
                        <?php echo $this->Html->link($this->Html->tag('i', ' Exportar', array('class'=>'icon-download-alt')), array('controller' => 'transfers', 'action'=>'add', 1), array('escape' => false, 'class'=>'btn btn-success btn-small')); ?>         						
                    </div>
                    <div style="float:right; margin-top: 1em;">
                        <?php echo $this->Html->link($this->Html->tag('i', ' Imprimir', array('class'=>'icon-download-alt')), array('controller' => 'transfers', 'action'=>'add', 1), array('escape' => false, 'class'=>'btn btn-small')); ?>         						
                    </div>
                    <h3><?php echo __('Resultado pesquisa'); ?></h3>
                    <div id="resultsDiv">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Pavimento</th>
                                    <th>Apto/Hall</th>
                                    <th>Outros</th>
                                    <th>Serviço</th>
                                    <th>Verificação</th>
                                    <th>Verif.</th>
                                    <th>Foto</th>
                                </tr>
                            <thead>
                            <tbody id="tableTbody"></tbody>
                        </table>
                    </div>
                 </div>
            </div>     
        </div>   
        
        
        <div class="modal small hide fade" id="FotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-photo" class="carousel-caption">               
                <h4 id="modalTitle"></h4>               
                <div class="row-fluid"> 
                    <div id="myCarousel" class="carousel slide">
                         <!-- Carousel items -->
                         <div class="carousel-inner" id="carouselInner">
                         </div>
                         <!-- Carousel nav -->
                         
                         <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                         <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                    </div>
                </div>
             </div>
        </div>
        
    </div>
</div>

<script>  
        $(document).ready(function() {
            
            $('#TowerTownhouseId').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                numberDisplayed: 5,
                maxHeight: 400,
                buttonClass: 'btn span12',
                onChange: function(element, checked) {
                    var brands = $('#TowerTownhouseId option:selected');
                    var selected = [];
                    $(brands).each(function(index, brand){
                        selected.push([$(this).val()]);
                    });
                    //alert(selected);
                    $.ajax({
                        type: 'post',
                        url: "/portalqualidade/towers/searchSelects/1/" + selected,
                        contentType: "json",
                        traditional: true,
                        success: function (result) {
                            //alert(result);                    
                            var options = JSON.parse(result);
                            $('#TowerTowersId').multiselect('dataprovider', options);
                        }
                    });
                }
            });
                        
            $('#TowerTowersId').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                numberDisplayed: 5,
                maxHeight: 400,
                buttonClass: 'btn span12',
                onChange: function(element, checked) {
                    var brands = $('#TowerTowersId option:selected');
                    var selected = [];
                    $(brands).each(function(index, brand){
                        selected.push([$(this).val()]);
                    });
                    //alert(selected);
                    $.ajax({
                        type: 'post',
                        url: "/portalqualidade/towers/searchSelects/2/" + selected,
                        contentType: "json",
                        traditional: true,
                        success: function (result) {
                            //alert(result);                    
                            var options = JSON.parse(result);
                            $('#TowerSelectLoc1Id').multiselect('dataprovider', options);
                        }
                    });
                }                
            });
            
            
            $('#TowerSelectLoc1Id').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                numberDisplayed: 5,
                maxHeight: 400,
                buttonClass: 'btn span12',
                onChange: function(element, checked) {
                    var brands = $('#TowerSelectLoc1Id option:selected');
                    var selected = [];
                    $(brands).each(function(index, brand){
                        selected.push([$(this).val()]);
                    });
                    //alert(selected);
                    $.ajax({
                        type: 'post',
                        url: "/portalqualidade/towers/searchSelects/3/" + selected,
                        contentType: "json",
                        traditional: true,
                        success: function (result) {
                            //alert(result);                    
                            var options = JSON.parse(result);
                            $('#TowerSelectLoc2Id').multiselect('dataprovider', options);
                        }
                    });
                }
            });
            
            $('#TowerSelectLoc2Id').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                numberDisplayed: 5,
                maxHeight: 400,
                buttonClass: 'btn span12',
                onChange: function(element, checked) {
                    var brands = $('#TowerSelectLoc2Id option:selected');
                    var selected = [];
                    $(brands).each(function(index, brand){
                        selected.push([$(this).val()]);
                    });
                    //alert(selected);
                    $.ajax({
                        type: 'post',
                        url: "/portalqualidade/towers/searchSelects/4/" + selected,
                        contentType: "json",
                        traditional: true,
                        success: function (result) {
                            //alert(result);                    
                            var options = JSON.parse(result);
                            $('#TowerSelectLoc3Id').multiselect('dataprovider', options);
                        }
                    });
                }
            });
            
            $('#TowerSelectLoc3Id').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                numberDisplayed: 5,
                maxHeight: 400,
                buttonClass: 'btn span12',
                onChange: function(element, checked) {
                    var brands = $('#TowerSelectLoc3Id option:selected');
                    var selected = [];
                    $(brands).each(function(index, brand){
                        selected.push([$(this).val()]);
                    });
                    //alert(selected);
                    $.ajax({
                        type: 'post',
                        url: "/portalqualidade/towers/searchSelects/5/" + selected,
                        contentType: "json",
                        traditional: true,
                        success: function (result) {
                            //alert(result);                    
                            var options = JSON.parse(result);
                            $('#TowerSelectLoc4Id').multiselect('dataprovider', options);
                        }
                    });
                }
            });
            
            $('#TowerSelectLoc4Id').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                numberDisplayed: 2,
                maxHeight: 400,
                buttonClass: 'btn span12',
                onChange: function(element, checked) {
                    var brands = $('#TowerSelectLoc4Id option:selected');
                    var selected = [];
                    $(brands).each(function(index, brand){
                        selected.push([$(this).val()]);
                    });
                    //alert(selected);
                    $.ajax({
                        type: 'post',
                        url: "/portalqualidade/towers/searchSelects/6/" + selected,
                        contentType: "json",
                        traditional: true,
                        success: function (result) {
                            //alert(result);                    
                            var options = JSON.parse(result);
                            $('#TowerSelectNameId').multiselect('dataprovider', options);
                        }
                    });
                }
            });
            
            $('#TowerSelectNameId').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                numberDisplayed: 2,
                maxHeight: 400,
                buttonClass: 'btn span12'
            });
            
            $('#TowerSelectCheckedId').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                numberDisplayed: 2,
                maxHeight: 400,
                buttonClass: 'btn span12'
            });
            $('#TowerSelectCheckedId').multiselect('dataprovider', [{label: 'Conformes', value: '1'},{label: 'Não conformes', value: '2'},{label: 'Não verificados', value: '0'}]);
        }); 
        
        
        function teste2(){
            //alert($('#TowerSelectCheckedId').val());
            $.ajax({
                type: 'post',
                url: '/portalqualidade/towers/itemsFound/' + $('#TowerTowersId').val() + '/' + $('#TowerSelectLoc1Id').val() + '/' + $('#TowerSelectLoc2Id').val() + '/' + $('#TowerSelectLoc3Id').val() + '/' + $('#TowerSelectLoc4Id').val() + '/' + $('#TowerSelectNameId').val() + '/' + $('#TowerSelectCheckedId').val(),
                contentType: "json",
                traditional: true,
                success: function (result) {
                    //alert(result); 
                    $('#tableTbody tr').remove(); 
                    
                    var JsonObj = JSON.parse(result);
                    $.each(JsonObj, function(i, item){                             
                        var Checked = "";                                          
                        if(item.Measurement.checked === '1'){
                            Checked = "<i class='icon-thumbs-up' style='font-size: 22px; color:green;'></i>";
                        }else if(item.Measurement.checked === '2'){
                            Checked = "<i class='icon-thumbs-down' style='font-size: 22px; color:red;'></i>";
                        }else if(item.Measurement.checked === '3'){
                            Checked = "<i class='icon-thumbs-up' style='font-size: 22px; color:orange;'></i>";
                        }
                       
                        var Photo = (item.Item.Photo.length > 0 ? "<a href='#FotoModal' data-toggle='modal' onclick='getPhoto(" + item.Item.id + ")'><i class='icon-camera' style='font-size: 22px;'></i></a>" : "");
                        var $tr = $('<tr>').append(
                            $('<td>').text(item.Item.loc1),
                            $('<td>').text(item.Item.loc2),
                            $('<td>').text(item.Item.loc3),
                            $('<td>').text(item.Item.loc4),
                            $('<td>').text(item.Item.name),
                            $('<td>').append(Checked),
                            $('<td>').append(Photo)
                        ); 
                        $('#tableTbody').append($tr);
                    });
                }
            });
            
        }
        
        function getPhoto(itemId){    
            //alert(itemId);
            $.ajax({
                type: 'post',
                url: '/portalqualidade/towers/photoFound/' + itemId,
                contentType: "json",
                traditional: true,
                success: function (result) {
                    //alert(result);
                    $('#carouselInner').empty();
                    $('#carouselInner').classname = 'carousel-inner';
                    var JsonObj = JSON.parse(result);
                    
                    $.each(JsonObj, function(i, item){ 
                        if(i===0){
                            $div = $("<div class='active item'> <img src='" + item.Photo.imageBase64 + "'>").append(
                                $("<div class='carousel-caption'>").append("<h4>Condomínio 3 - Bloco 1 - Pav. 02 - Apto 103</h4><h4>Obs. A cerâmica foi trocada porém não foi rejuntada.</h4>")
                            ); 
                        }else{
                            $div = $("<div class='item'> <img src='" + item.Photo.imageBase64 + "'>").append(
                                //$("<div class='carousel-caption'>").append("<h4>" + item.Photo.name + "</h4>")
                            ); 
                        }    
                        $('#carouselInner').append($div);
                    });
                }
            });
        }
</script>


<!--<div class="active item"> <img src="/portalqualidade/img/exemplo1.png">
    <div class="carousel-caption">
        <h4>Teste 2</h4>
        <p>TESTE TESTE TESTE TESTE</p>
    </div>
</div>-->