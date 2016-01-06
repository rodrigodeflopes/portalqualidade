<!DOCTYPE html>
<html lang="en">
        <head>
                <?php echo $this->Html->charset(); ?>
                <!-- <meta charset="utf-8"> >

                <?php echo $this->Html->meta(array('content' => 'IE=edge,chrome=1', 'http-equiv' => 'X-UA-Compatible')); ?>
                <!-- <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"> -->

                <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

                <?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1')); ?>
                <?php echo $this->Html->meta(array('name' => 'description', 'content' => '')); ?>
                <?php echo $this->Html->meta(array('name' => 'author', 'content' => '')); ?>

                <!-- Global stylesheets -->
                <?php echo $this->Html->css(array(
                                'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
                                '/assets/css/icons/icomoon/styles', 
                                '/assets/css/bootstrap',
                                '/assets/css/core',
                                '/assets/css/components',
                                '/assets/css/colors'
                            ));  ?>

                <!-- Core JS files -->
                <?php echo $this->Html->script(array(
                                '/assets/js/plugins/loaders/pace.min',
                                '/assets/js/core/libraries/jquery.min',
                                '/assets/js/core/libraries/bootstrap.min',
                                '/assets/js/plugins/loaders/blockui.min'
                           )); ?>

                <!-- Theme JS files -->
                <?php echo $this->Html->script(array(
                                '/assets/js/plugins/forms/styling/uniform.min',
                                '/assets/js/core/app',
                                '/assets/js/pages/login'
                           )); ?>

        </head>

        <body class="login-cover">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Session->flash('auth'); ?>
                <?php echo $this->fetch('content'); ?>
        </body>

</html>