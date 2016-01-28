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
                        <h6 class="panel-title">Verificações</h6>
                        <div class="heading-elements">
                                <span class="heading-text"><i class="icon-history text-warning position-left"></i> 13 Jan 16, 10:30</span>
                        </div>
                </div>

                <div class="container-fluid">
                        <div class="row text-center">
                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class=" icon-calculator position-left text-slate"></i> <?php echo $total; ?></h6>
                                                <span class="text-muted text-size-small">Total</span>
                                        </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-stack-check position-left text-slate"></i> <?php echo $totalC + $totalNC; ?></h6>
                                                <span class="text-muted text-size-small">Realizadas</span>
                                        </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-stack-check position-left text-slate"></i> <?php echo round((($totalC + $totalNC)/$total)*100,2) . " %"; ?></h6>
                                                <span class="text-muted text-size-small">% Realizadas</span>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-thumbs-up3 text-success position-left"></i> <?php if($totalC + $totalNC > 0) { echo round(($totalC/($totalC + $totalNC))*100,2) . " %"; } ?></h6>
                                                <span class="text-muted text-size-small">% Conformidades </span>
                                        </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="content-group">
                                                <h6 class="text-semibold no-margin"><i class="icon-thumbs-down3 text-danger position-left"></i> <?php if($totalC + $totalNC > 0) { echo round(($totalNC/($totalC + $totalNC))*100,2) . " %"; } ?></h6>
                                                <span class="text-muted text-size-small">% N. Conformidads</span>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <!-- Numbers -->
        
        <!-- Multiple donut charts -->
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
                        <div class="chart">
                                <div class="chart has-fixed-height has-minimum-width" id="multiple_donuts"></div>
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

<?php 
    //Services-------------------------------------------
    //$aux = array('a', 'b'); 
    $servicesLegends = json_encode($dataServices['legends']);     
    //$aux2 = array(array('value' => 50, 'name' => 'a'), array('value' => 50, 'name' => 'b')); 
    $servicesSeries = json_encode($dataServices['series']);  
    
    //Townhouses-----------------------------------------    
    $townhousesLegends = json_encode($dataTownhouses['legends']);     
    $townhousesSeries = json_encode($dataTownhouses['series']);  
  
    //Donuts Services------------------------------------
    $donuts = Set::remove($dataServices, 'legends.5');
    $donuts = Set::remove($donuts, 'series.5');
    $donuts = Set::remove($donuts, 'qtdeTotal.5');
    //debug($donuts);
?>

<script>
$(function () {

    // Set paths
    // ------------------------------

    require.config({
        paths: {
            echarts: '<?php echo Router::url('/', true); ?>/assets/js/plugins/visualization/echarts'
        }
    });


    // Configuration
    // ------------------------------

    require(
        [
            'echarts',
            'echarts/theme/limitless',
            'echarts/chart/pie',
            'echarts/chart/funnel'
        ],


        // Charts setup
        function (ec, limitless) {


            // Initialize charts
            // ------------------------------

            var basic_pie = ec.init(document.getElementById('basic_pie'), limitless);
            var basic_donut = ec.init(document.getElementById('basic_donut'), limitless);
            var multiple_donuts = ec.init(document.getElementById('multiple_donuts'), limitless);
            
            
            // Get data sources
            //-------------------------------
            
            $.ajax({
                    type: 'post',
                    url: "../grafDataSource",
                    contentType: "json",
                    traditional: true,
                    success: function (result) {                   
                            //alert(result);                    
                            var dataSource = JSON.parse(result);
                            
                            //alert([dataSource.legends]);
                            //dataLegend = Object.keys(dataSource.legends);
                            //dataSeries = Object.keys(dataSource.series);
                            
                            //dataLegend = dataSource.legends;
                            //dataSeries = dataSource.series;
                            
                            //dataLegend = ['a','b'];
                            //dataSeries = [{value: 50, name: 'a'}, {value: 50, name: 'b'}];
                    }
            });


            // Charts setup
            // ------------------------------                    

            //
            // Basic pie options
            //

            basic_pie_options = {

                // Add title
                title: {
                    text: 'Distribuição das N.C.',
                    subtext: 'Distribuição por serviços',
                    x: 'center'
                },

                // Add tooltip
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: <?php echo $servicesLegends; ?>
                },

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'View data',
                            lang: ['View chart data', 'Close', 'Update']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'Restore'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: true,

                // Add series
                series: [{
                    name: 'Browsers',
                    type: 'pie',
                    radius: '70%',
                    center: ['50%', '57.5%'],
                    data: <?php echo $servicesSeries; ?>
                }]
            };


            //
            // Basic donut options
            //

            basic_donut_options = {

                // Add title
                title: {
                    text: 'Distribuição das N.C.',
                    subtext: 'Distribuição por condomínios',
                    x: 'center'
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: <?php echo $townhousesLegends; ?>
                },

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'View data',
                            lang: ['View chart data', 'Close', 'Update']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'Restore'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: true,

                // Add series
                series: [
                    {
                        name: 'Browsers',
                        type: 'pie',
                        radius: ['50%', '70%'],
                        center: ['50%', '57.5%'],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true
                                },
                                labelLine: {
                                    show: true
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true,
                                    formatter: '{b}' + '\n\n' + '{c} ({d}%)',
                                    position: 'center',
                                    textStyle: {
                                        fontSize: '17',
                                        fontWeight: '500'
                                    }
                                }
                            }
                        },

                        data: <?php echo $townhousesSeries; ?>
                    }
                ]
            };

            //
            // Multiple donuts options
            //

            // Top text label
            var labelTop = {
                normal: {
                    label: {
                        show: true,
                        position: 'center',
                        formatter: '{b}\n',
                        textStyle: {
                            baseline: 'middle',
                            fontWeight: 300,
                            fontSize: 15
                        }
                    },
                    labelLine: {
                        show: false
                    }
                }
            };

            // Format bottom label
            var labelFromatter = {
                normal: {
                    label: {
                        formatter: function (params) {
                            return '\n\n' + (100 - params.value) + '%'
                        }
                    }
                }
            }

            // Bottom text label
            var labelBottom = {
                normal: {
                    color: '#eee',
                    label: {
                        show: true,
                        position: 'center',
                        textStyle: {
                            baseline: 'middle'
                        }
                    },
                    labelLine: {
                        show: false
                    }
                },
                emphasis: {
                    color: 'rgba(0,0,0,0)'
                }
            };

            // Set inner and outer radius
            var radius = [60, 75];

            
            
            
            // Add options
            multiple_donuts_options = {

                // Add title
                title: {
                    text: 'Ranking de NC por serviço',
                    subtext: 'Serviços com maiores % de NC',
                    x: 'center'
                },

                // Add legend
                legend: {
                    x: 'center',
                    y: '56%',
                    data: <?php echo json_encode($donuts['legends']); ?>
                },

                // Add series
                series: [
                    {
                        type: 'pie',
                        center: ['10%', '32.5%'],
                        radius: radius,
                        itemStyle: labelFromatter,
                        data: [
                            {name: 'other', value: <?php echo 100 - round(((int)$donuts['series'][0]['value']/(int)$donuts['qtdeTotal'][0]*100),0); ?>, itemStyle: labelBottom},
                            {name:  '<?php echo $donuts['legends'][0]; ?>', value: <?php echo round(((int)$donuts['series'][0]['value']/(int)$donuts['qtdeTotal'][0]*100),0); ?>,itemStyle: labelTop}
                        ]
                    },
                    {
                        type: 'pie',
                        center: ['30%', '32.5%'],
                        radius: radius,
                        itemStyle: labelFromatter,
                        data: [
                            {name: 'other', value: <?php echo 100 - round(((int)$donuts['series'][1]['value']/(int)$donuts['qtdeTotal'][1]*100),0); ?>, itemStyle: labelBottom},
                            {name: '<?php echo $donuts['legends'][1]; ?>', value: <?php echo round(((int)$donuts['series'][1]['value']/(int)$donuts['qtdeTotal'][1]*100),0); ?>,itemStyle: labelTop}
                        ]
                    },
                    {
                        type: 'pie',
                        center: ['50%', '32.5%'],
                        radius: radius,
                        itemStyle: labelFromatter,
                        data: [
                            {name: 'other', value: <?php echo 100 - round(((int)$donuts['series'][2]['value']/(int)$donuts['qtdeTotal'][2]*100),0); ?>, itemStyle: labelBottom},
                            {name: '<?php echo $donuts['legends'][2]; ?>', value: <?php echo round(((int)$donuts['series'][2]['value']/(int)$donuts['qtdeTotal'][2]*100),0); ?>,itemStyle: labelTop}
                        ]
                    },
                    {
                        type: 'pie',
                        center: ['70%', '32.5%'],
                        radius: radius,
                        itemStyle: labelFromatter,
                        data: [
                            {name: 'other', value: <?php echo 100 - round(((int)$donuts['series'][3]['value']/(int)$donuts['qtdeTotal'][3]*100),0); ?>, itemStyle: labelBottom},
                            {name: '<?php echo $donuts['legends'][3]; ?>', value: <?php echo round(((int)$donuts['series'][3]['value']/(int)$donuts['qtdeTotal'][3]*100),0); ?>,itemStyle: labelTop}
                        ]
                    },
                    {
                        type: 'pie',
                        center: ['90%', '32.5%'],
                        radius: radius,
                        itemStyle: labelFromatter,
                        data: [
                            {name:'other', value:<?php echo 100 - round(((int)$donuts['series'][4]['value']/(int)$donuts['qtdeTotal'][4]*100),0); ?>, itemStyle: labelBottom},
                            {name:'<?php echo $donuts['legends'][4]; ?>', value:<?php echo round(((int)$donuts['series'][4]['value']/(int)$donuts['qtdeTotal'][4]*100),0); ?>,itemStyle: labelTop}
                        ]
                    }
                ]
            };



            // Apply options
            // ------------------------------

            basic_pie.setOption(basic_pie_options);
            basic_donut.setOption(basic_donut_options);            
            multiple_donuts.setOption(multiple_donuts_options);



            // Resize charts
            // ------------------------------

            window.onresize = function () {
                setTimeout(function (){
                    basic_pie.resize();
                    basic_donut.resize();
                    multiple_donuts.resize();
                }, 200);
            }
        }
    );
});
</script>