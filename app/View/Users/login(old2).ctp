

        <div class="row-fluid" style="background: url('/portalqualidade/app/webroot/img/moto.jpg') no-repeat; background-size: 100%; height:100%; ">
            <div class="span9" style="height: 100%;">
                <div></div>
            </div>
            <div class="span3" style="height: 100%; background-color: white;">
                <div class="container-fluid" style="height: 100%">
                    <div style="margin-top: 8em;" class="span9 offset1">       
                        <img src="/portalqualidade/app/webroot/img/qualitab.png" width="200px">
                        <br><br>
                        <p  style="font-size:100%;  ">Entre com conta do portal</p>

                        <?php echo $this->Form->create('User', array('action' => 'login')); ?>
                        <?php 
                            echo $this->Form->input('email', array('placeholder' => 'email', 'label' => '', 'class' => 'span12'));
                            echo $this->Form->input('password', array('type'=> 'password' , 'placeholder' =>'Senha' ,'label' => '', 'class' => 'span12')); 
                        ?>                        
                        <input  type="submit" value="Entrar" class="btn btn-primary pull-right">
                        <div class="clearfix"></div>
                        <br><br><br>
                        <img src="/portalqualidade/app/webroot/img/apis.png" width="40%">
                        <img src="/portalqualidade/app/webroot/img/tecplaner.png" width="56%">
                        <?php echo $this->Form->end(); ?>             
                    </div>
                </div>
            </div>
        </div>












