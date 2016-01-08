<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/visualization/echarts/echarts',   
    '/assets/js/pages/enterprisesView'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Dados da obra</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-home2 position-left"></i> Obras', array('action' => 'index'), array('escape' => false)); ?></li>
			<li class="active">Dados da obra</li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">    
        
        <!-- Numbers -->
        <div class="panel panel-flat">
                <div class="panel-heading">
                        <h6 class="panel-title">Numeros</h6>
                        <div class="heading-elements">
                                <span class="heading-text"><i class="icon-history text-warning position-left"></i> 08 Jan 16, 18:30</span>
                        </div>
                </div>

                <div class="container-fluid">
                        <div class="row text-center">
                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> 2,345</h6>
                                                <span class="text-muted text-size-small">this week</span>
                                        </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> 3,568</h6>
                                                <span class="text-muted text-size-small">this month</span>
                                        </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> 32,693</h6>
                                                <span class="text-muted text-size-small">all messages</span>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> 2,345</h6>
                                                <span class="text-muted text-size-small">this week</span>
                                        </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> 3,568</h6>
                                                <span class="text-muted text-size-small">this month</span>
                                        </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> 32,693</h6>
                                                <span class="text-muted text-size-small">all messages</span>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <!-- Numbers -->
        
        <!-- Multiple donut charts -->
        <div class="panel panel-flat">
                <div class="panel-heading">
                        <h5 class="panel-title">Multiple donuts</h5>
                        <div class="heading-elements">
                                <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                </ul>
                        </div>
                </div>

                <div class="panel-body">
                        <div class="chart-container has-scroll">
                                <div class="chart has-fixed-height has-minimum-width" id="multiple_donuts" style="height: 450px;"></div>
                        </div>
                </div>
        </div>
        <!-- /multiple donut charts -->
        
        
        <div class="row">
                <div class="col-md-6">

                        <!-- Basic pie chart -->
                        <div class="panel panel-flat">
                                <div class="panel-heading">
                                        <div class="heading-elements">
                                                                <ul class="icons-list">
                                                        <li><a data-action="collapse"></a></li>
                                                        <li><a data-action="reload"></a></li>
                                                </ul>
                                        </div>
                                </div>

                                <div class="panel-body">
                                        <div class="chart-container has-scroll">
                                                <div class="chart has-fixed-height has-minimum-width" id="basic_pie"></div>
                                        </div>
                                </div>
                        </div>
                        <!-- /bacis pie chart -->
                        
                </div>

                <div class="col-md-6">

                        <!-- Basic donut chart -->
                        <div class="panel panel-flat">
                                <div class="panel-heading">
                                        <div class="heading-elements">
                                                <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                </ul>
                        </div>
                                </div>

                                <div class="panel-body">
                                        <div class="chart-container has-scroll">
                                                <div class="chart has-fixed-height has-minimum-width" id="basic_donut"></div>
                                        </div>
                                </div>
                        </div>
                        <!-- /basic donut chart -->

                </div>
        </div>

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->

