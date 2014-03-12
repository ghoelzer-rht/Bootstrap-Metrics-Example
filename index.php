<?PHP

/* Credentials, Calculations, and MYSQL Queries (PDO) */

include '/var/www/Archon/config.inc.php';
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Statistics and Metrics with PHP and ChartJS">
    <meta name="author" content="Benjamin Wiens, Keystone Library Network">

    <title>Archon Stats</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/custom.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Archon Stats</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
           
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Archon Admin</h1>
        <p class="lead">Keystone Library Network</p>
</br>
<!-- row -->
<div class="row">
          <div class="col-lg-4"><div class="panel panel-primary">  <div class="panel-heading">
    <h3 class="panel-title">Space Usage Pie Chart</h3>
  </div><div class="panel-body"><div class="panel-inner">
<!-- chartjs -->
<script src="dist/js/Chart.js"></script>
    <meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
    <style>
      canvas{
      }
    </style>
    <canvas id="canvas" height="250" width="250"></canvas>
  <script>
    var pieData = [
        {
          value: 
<?php
echo  '' . $mbytesr . '
          ,
          color:"#F38630"
        },
        {
          value : 

      ' . $mbytes2r . '
          ,
          color : "#E0E4CC"
        },
        {
          value : ' . $freespace . ',
          color : "#69D2E7"
        }
      
      ];

  var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
    </script>'
?>
<!-- inner --> </div></div></div></div>
  <div class="col-lg-4"><div class="panel panel-primary">  <div class="panel-heading">
      <h3 class="panel-title">Space Usage</h3>
  </div><div class="panel-body">
      <button type="button" class="btn btn-default btn-lg" style="width:330px; text-align:left;">
      <span class="glyphicon glyphicon-list"></span> Database Size is: <?php echo "$mbytesr" ?> MB
      </button><br><br>
      <button type="button" class="btn btn-default btn-lg" style="width:330px; text-align:left;">
      <span class="glyphicon glyphicon-hdd"></span> Aggregated File Size is: <?php echo "$mbytes2r" ?> MB
      </button><br /><br />
      <br><strong>Your total allocated Space Usage is at <?php echo "$percentager" ?> % </strong>
      <div class="progress progress-striped active">
    <div class="progress-bar"  role="progressbar" aria-valuenow=<?php echo "\"$percentager\"" ?> aria-valuemin="0" aria-valuemax="100" <?php echo "style=\"width:$percentager%\""?>>
    <span class="sr-only"> <?php echo "$percentager" ?> % Complete</span>
  </div>
</div>
 <div class="alert alert-success"><strong>Please note:</strong> Current space allocation has been set to hypothetical 4 GB.</div>


    </div></div> </div> 
<div class="col-lg-4"><div class="panel panel-primary">  <div class="panel-heading">
    <h3 class="panel-title">Repository Details</h3>
  </div><div class="panel-body">

 <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                 <span class="glyphicon glyphicon-book"></span>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo "$colnr" ?></p>
                    <p class="announcement-text">Collections</p>
                  </div>
                </div>
              </div>
              <a href="https://archon.klnpa.org/millersv/?p=collections/collections&browse"  target="_blank">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Collections
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
<div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                 <span class="glyphicon glyphicon-eye-open"></span>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"></p>
                    <p class="announcement-text">Website Traffic & Traffic Sources</p>
                  </div>
                </div>
              </div>
              <a href="http://www.google.com/analytics/"  target="_blank">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Google Analytics
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
    <!-- row -->
      <!--    <a href="#" class="btn btn-primary btn-default"><span class="glyphicon glyphicon-eye-open"></span> Default text here</a> -->

    </div><!-- /.container -->
        </div><!-- /.info -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
