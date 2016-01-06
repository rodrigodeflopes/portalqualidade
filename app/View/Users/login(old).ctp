<?php echo $this->Session->flash('auth'); ?>

<div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Login de Acesso</p>
            <div class="block-body">
                <?php echo $this->Form->create('User', array('action' => 'login')); ?>
                <?php 
                    echo $this->Form->input('email', array('label' => 'E-mail', 'class' => 'span12'));
                    echo $this->Form->input('password', array('type'=> 'password' ,'label' => 'Senha', 'class' => 'span12')); 
                ?>                        
                <input  type="submit" value="Entrar" class="btn btn-danger pull-right"></>
                <div class="clearfix"></div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>