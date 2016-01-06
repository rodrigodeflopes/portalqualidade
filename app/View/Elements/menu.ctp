<div class="">            
        <ul class="nav nav-tabs">
          <?php if($this->params['controller'] === 'consults'){?><li class="icon-tasks" style="font-size: 20px; margin-left: 44px; margin-top: 10px;" onclick="collapse_content()" title="Menu"></li><?php } ?>
          <?php foreach ($accesses as $access){ ?>
                <?php if($this->params['controller'] === $access['acoAlias']){ ?> <li class="active"><a><?php echo $access['pageName']; ?></a></li>  
                <?php }else { ?> <li><?php echo $this->Html->link($access['pageName'], array('controller' => $access['acoAlias'], 'action' => 'index')); ?></li><?php } ?>
          <?php } ?>
        </ul>  
</div>


