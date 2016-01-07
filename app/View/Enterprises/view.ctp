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

                <div class="heading-elements">
                        <div class="heading-btn-group">
                                <a class="btn btn-link btn-float has-text" id="excelLink"><i class="icon-file-excel text-primary"></i> <span>Excel</span></a>
                                <a class="btn btn-link btn-float has-text"><i class="icon-printer2 text-primary"></i> <span>Imprimir</span></a>
                        </div>
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
        
        <!-- Multiple donut charts -->
        <div class="panel panel-flat">
                <div class="panel-heading">
                        <h5 class="panel-title">Multiple donuts</h5>
                        <div class="heading-elements">
                                <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
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
                                                        <li><a data-action="close"></a></li>
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
                                        <li><a data-action="close"></a></li>
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

