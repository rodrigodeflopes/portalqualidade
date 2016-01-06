<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Obras'), array('action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Dados da Obra</li>
</ul>

<div class="container-fluid">
    <?php echo $this->Session->flash(); ?>
    <div class="btn-toolbar">     
        <?php echo $this->Html->link($this->Html->tag('i', ' Editar', array('class'=>'icon-edit')), array('action'=>'edit', $enterprise['Enterprise']['id']), array('escape' => false, 'class'=>'btn btn-primary btn-mini')); ?>     
    </div>  
    <div class="row-fluid">
        <div class="span2">            
            <div class="well"> 
                <div class="row-fluid">
                    <div class="pull-left">
                        <p><?php echo $this->Html->image($enterprise['Enterprise']['image_path'], array('class' => 'img-building')); ?></p> 
                    </div> 
                    <div class="pull-left span8">
                        <h3><?php echo $enterprise['Enterprise']['name']; ?></h3>
                    </div>
                    <?php echo $this->Form->create('Enterprise', array('action' => 'image_edit/' . $enterprise['Enterprise']['id'], 'type' => 'file')); ?>
                            <div class="modal small hide fade" id="FotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel">Alterar imagem de perfil</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row-fluid">
                                            <div class="span2"><i class="icon-home modal-icon"></i></div> Selecione um arquivo de imagem:
                                            <?php echo $this->Form->file('uploadfile', array('label' => 'Arquivo de imagem', 'class' => 'span12')); ?> 
                                            <?php echo $this->Form->input('image_path', array('type' => 'hidden', 'value' => $enterprise['Enterprise']['image_path']));  ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                        <button class="btn btn-primary"><i class="icon-save"></i> Alterar</button>
                                    </div>
                            </div>
                    <?php echo $this->Form->end(); ?>
                </div>           

                <hr>
                
                <h3><?php echo __('Condomínios'); ?></h3>
                <div class="row-fluid">
                    <?php foreach ($enterprise['Townhouse'] as $townhouse): ?>
                        <div>
                            <?php echo $this->Html->image($townhouse['image_path'], array('class' => 'img-face1')); ?>
                            <strong><?php echo $this->Html->link(h($townhouse['name']), array('controller' => 'townhouses', 'action'=>'view', $townhouse['id']), array('escape' => false)); ?>&nbsp;</strong>       
                        </div>
                    <?php endforeach; ?>    
                </div>
            </div>
        </div>
        <div class="span10">
            <div class="well">
                <div class="row-fluid">
                    <div class="span6">            
                        <div class="well"> 
                            <h3>Ranking de Não Conformidades (Serviços) - Top 5 serviços</h3>
                            <table class="table table-striped"  style="font-size: 16px;">
                                <thead>
                                    <tr>
                                        <th>Class.</th>
                                        <th>Serviço</th>
                                        <th>(%)NC</th>
                                        <th>Total Verif.</th>
                                    </tr>
                                <thead>
                                    <tr>
                                        <td>1</td>
                                        <td>Assentamento Cerâmico</td>
                                        <td>16,22%</td>
                                        <td>526</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>colocação de janela</td>
                                        <td>14,50%</td>
                                        <td>647</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>porta pronta</td>
                                        <td>14,12%</td>
                                        <td>582</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>colocação de louça</td>
                                        <td>8,73%</td>
                                        <td>352</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>colocação de metais</td>
                                        <td>7,68%</td>
                                        <td>163</td>
                                    </tr>
                                <tbody id="tableTbody"></tbody>
                            </table>
                            
                        </div>
                    </div>
                    <div class="span6">            
                        <div class="well"> 
                            <h3>Ranking de Não Conformidades (Condomínios)</h3>                            
                            <table class="table table-striped"  style="font-size: 16px;">
                                <thead>
                                    <tr>
                                        <th>Class.</th>
                                        <th>Serviço</th>
                                        <th>(%)NC</th>
                                    </tr>
                                <thead>
                                    <tr>
                                        <td>1</td>
                                        <td>Condomínio 3</td>
                                        <td>9,38%</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Condomínio 7</td>
                                        <td>7,22%</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Condomínio 8</td>
                                        <td>5,89%</td>
                                    </tr>
                                <tbody id="tableTbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">            
                        <div class="well">
                            <h3>Evolução mensal de Não Conformidades (Serviço)</h3>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                    </div>
                    <div class="span6">            
                        <div class="well"> 
                            <h3>Evolução mensal de Não Conformidades (Geral)</h3>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                    </div>
                </div>
                
            </div>            
        </div>
    </div>
</div>