<!-- Page container -->
<div class="page-container login-container">

        <!-- Page content -->
        <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper">

                        <!-- Content area -->
                        <div class="content">

                                <!-- Advanced login -->
                                <?php echo $this->Form->create('User', array('action' => 'login')); ?>
                                        <div class="panel panel-body login-form">
                                                <div class="text-center">                                                        
                                                        <img src="/portalqualidade/app/webroot/img/qualitab.png" width="80%">
                                                        <h5 class="content-group-lg">Login <small class="display-block">Entre com suas credenciais</small></h5>
                                                </div>
                                                
                                                <div class="form-group has-feedback has-feedback-left">
                                                        <?php echo $this->Form->input('email', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'E-mail', 'div' => false)); ?>
                                                        <div class="form-control-feedback">
                                                                <i class="icon-user text-muted"></i>
                                                        </div>
                                                </div>

                                                <div class="form-group has-feedback has-feedback-left">
                                                        <?php echo $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'div' => false)); ?>
                                                        <div class="form-control-feedback">
                                                                <i class="icon-lock2 text-muted"></i>
                                                        </div>
                                                </div>

                                                <div class="form-group login-options">
                                                        <div class="row">
                                                                <div class="col-sm-6">
                                                                        <label class="checkbox-inline">
                                                                                <input type="checkbox" class="styled" checked="checked">
                                                                                Remember
                                                                        </label>
                                                                </div>

                                                                <div class="col-sm-6 text-right">
                                                                        <a href="login_password_recover.html">Forgot password?</a>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
                                                </div>                                                
                                                <img src="/portalqualidade/app/webroot/img/logo.jpg" width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <img src="/portalqualidade/app/webroot/img/tecplaner.png" width="50%">
                                                <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                                        </div>
                                <?php echo $this->Form->end(); ?>
                                <!-- /advanced login -->


                                <!-- Footer -->
                                <div class="footer text-white">
                                        &copy; 2015. <a href="#" class="text-white">QualiTab Web</a> by <a href="http://themeforest.net/user/Kopyov" class="text-white" target="_blank">TecPlaner</a>
                                </div>
                                <!-- /footer -->

                        </div>
                        <!-- /content area -->

                </div>
                <!-- /main content -->

        </div>
        <!-- /page content -->

</div>
<!-- /page container -->