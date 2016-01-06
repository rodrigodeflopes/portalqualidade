<div class="pagination">
    <div class="row-fluid">
        <div class="span3" style="text-align: left">
            <?php
                echo $this->Paginator->counter(array(
                'format' => __('Exibindo: {:start} - {:end} de {:count}')
                ));
            ?> 
        </div>
        <div class="span6" style="text-align: center">
            <ul>                        	
                <?php
                    echo $this->Paginator->prev(' « ', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled', 'disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                    echo $this->Paginator->next(' » ', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled', 'disabledTag' => 'a'));
                ?>
            </ul>
        </div>
        <div class="span3" style="text-align: right">  
                Página
                <?php echo $this->Form->input('page', array(
                    'label' => false, 
                    'div' => false,
                    'class' => 'input-micro', 
                    'value' => $this->params['paging'][$model]['page'], 
                    'onchange' => 'GoToPage()')); 
                ?>                           
                <?php echo $this->Paginator->counter(array('format' => __('de {:pages}'))); ?>            
        </div>
        <script>
            function GoToPage(){ 
                //alert('ok');
                location.href = '<?php echo $this->webroot . $this->params['controller']. DS . $this->params['action']. DS . $this->params['pass']['0'] . DS . 'page:'; ?>' + document.getElementById('page').value;                 
            }
        </script>
    </div>
</div>  