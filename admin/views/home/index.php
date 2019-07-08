  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
   
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

   
<section class="content">
  <!--  
   <div class="row">
    <div class="col-lg-12">
   <p>Blog status</p>
    </div>
<?php
$val = $this->blog;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
    $number = $key;
    $number = $number+1;
?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green" style="
background:#000 url('<?php echo URL;?>all-images/thumbnail/<?php echo $data[$key]->logo;?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;"></span>

            <div class="info-box-content">
              <span class="info-box-text">Views</span>
              <span class="info-box-number"><?php echo $data[$key]->views;?></span>
                <span class="info-box-text">Comments</span>
              <span class="info-box-number"><?php echo $data[$key]->comment_number;?></span>
            </div>
           
          </div>
       
        </div>
     
<?php
 } 
 }  
?>

<div class="clearfix visible-sm-block"></div>     
</div>
 -->



<div class="row">
   <div class="col-lg-12">
   <p>Site status</p>
    </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
<?php
$val = $this->totalvisit;
if (!empty($val)) {
$data = json_decode($val);
$visitnumber = $data->number;
}
?>
              <h3><?php echo $visitnumber;?></h3>

              <p>Total Traffic</p>
            </div>
            <div class="icon">
              <i class="fa fa-line-chart"></i>
            </div>
             <a href="<?LINK?>index/pages" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
   
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
<?php
$val = $this->totaluniquevisit;
if (!empty($val)) {
$data = json_decode($val);
$uniquevisitornum = $data->number;
}
?>
              
  <h3><?php echo $uniquevisitornum ;?></h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
              <a href="<?LINK?>index/pages" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

    <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">              
  <h3><?php echo  $this->n_downloads;?></h3>
              <p>Profile Downloads</p>
            </div>
            <div class="icon">
              <i class="fa fa-download"></i>
            </div>
            
          </div>
        </div>
<!-- ./col -->

      </div>

      <!-- /.row -->


 <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Total Traffic</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
        
 <canvas id="chart-legend-normal"></canvas>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
         

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Unique Visitors</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              
 <canvas id="chart-legend-pointstyle"></canvas>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

</section>
</div>

<?php
$val = $this->uniquevisit;
if (!empty($val)) {
$data      = json_decode($val);

$today1     = $data->today;
$yesterday1 = $data->yesterday;
$twodays1   = $data->twodays;
$threedays1 = $data->threedays;
$fourdays1  = $data->fourdays;
$fivedays1  = $data->fivedays;
$sixdays1   = $data->sixdays;
$sevendays1 = $data->sevendays;

}

?>
<?php
$val = $this->days;
if (!empty($val)) {
$data      = json_decode($val);

$today     = $data->today;
$yesterday = $data->yesterday;
$twodays   = $data->twodays;
$threedays = $data->threedays;
$fourdays  = $data->fourdays;
$fivedays  = $data->fivedays;
$sixdays   = $data->sixdays;
$sevendays = $data->sevendays;

}

?>

<script type="text/javascript" src="<?php echo ADMINURL;?>js/chart.js"></script>
<script type="text/javascript" src="<?php echo ADMINURL;?>js/site.js"></script>
<script type="text/javascript">

var color = Chart.helpers.color;
 function createConfig1(colorName) {
            return {
                type: 'line',
                data: {
                    labels: ["seven days","six days","five days","four days","three days","two days","yesterday","today"],
                    datasets: [{
                        label: "Visitors",
                        data: [
                            <?php echo $sevendays1;?>,
                            <?php echo $sixdays1;?>, 
                            <?php echo $fivedays1;?>, 
                            <?php echo $fourdays1;?>, 
                            <?php echo $threedays1;?>, 
                            <?php echo $twodays1;?>, 
                            <?php echo $yesterday1;?>, 
                            <?php echo $today1;?>
                        ],
                        backgroundColor: color(window.chartColors[colorName]).alpha(0.5).rgbString(),
                        borderColor: window.chartColors[colorName],
                        borderWidth: 1,
                        pointStyle: 'rectRot',
                        pointRadius: 5,
                        pointBorderColor: 'rgb(0, 0, 0)'
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        labels: {
                            usePointStyle: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Days'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Visitors'
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Visitors'
                    }
                }
            };
        }
        function createConfig(colorName) {
            return {
                type: 'line',
                data: {
                    labels: ["seven days","six days","five days","four days","three days","two days","yesterday","today"],
                    datasets: [{
                        label: "Views",
                        data: [
                            <?php echo $sevendays;?>,
                            <?php echo $sixdays;?>, 
                            <?php echo $fivedays;?>, 
                            <?php echo $fourdays;?>, 
                            <?php echo $threedays;?>, 
                            <?php echo $twodays;?>, 
                            <?php echo $yesterday;?>, 
                            <?php echo $today;?>
                        ],
                        backgroundColor: color(window.chartColors[colorName]).alpha(0.5).rgbString(),
                        borderColor: window.chartColors[colorName],
                        borderWidth: 1,
                        pointStyle: 'rectRot',
                        pointRadius: 5,
                        pointBorderColor: 'rgb(0, 0, 0)'
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        labels: {
                            usePointStyle: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Days'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Views'
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Views'
                    }
                }
            };
        }

        function createPointStyleConfig(colorName) {
            var config = createConfig(colorName);
            config.options.legend.labels.usePointStyle = true;
            config.options.title.text = 'Point Style Legend';
            return config;
        }

        window.onload = function() {
            [{
                id: 'chart-legend-normal',
                config: createConfig('red')
            }, {
                id: 'chart-legend-pointstyle',
                config: createConfig1('blue')
            }].forEach(function(details) {
                var ctx = document.getElementById(details.id).getContext('2d');
                new Chart(ctx, details.config)
            })
        };
</script>
