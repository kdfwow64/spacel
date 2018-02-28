<?php
include_once 'lib/init.php';
include_once 'lib/functions.php';

$config = array(
  'title' => 'TrackMyShuttle - An Automated Solution for Shuttle Tracking',
  'dasboardtitle' => 'Start Here',
  'body_class' => $GLOBALS['body_class'] . '',
  'scripts' => array(
    'countup',
    'switchery',
    'moment',
    'charts-js',
    'jquery-circle-progress',
    'sparkline',
    'daterangepicker',
    'slick',
    'mithril',
    'theme-widgets',
    'touchspin',
    'rangeslider',
    'knob',
    'knob-excanvas',   
    'morris-charts',
    'morris-raphael' 
  ),
  'styles' => array(
    'slick',
    'slick-theme',
    'switchery',
    'daterangepicker',
    'touchspin',
    'rangeslider',   
    'morris-css' 
  )
);


get_header($config);
?>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<div class="content-wrapper">
  <?php get_template_part( $GLOBALS['sidebar_file'] ) ?>

  <main class="main-wrapper clearfix">

    

    <!-- =================================== -->
    <!-- TMS Data widgets ============ -->
    <!-- =================================== -->
    <div class="widget-list ">
      <div class="grid-container-shuttle">

        <div class="shuttle_item1">
          <div class="grid_item_title">
            <span class="item_title">Company Profile</span>
            <div class="item_title_menu"><i class="fas fa-book" style="margin-right: 3px;"></i><i class="fas fa-ellipsis-v"></i></div>
          </div>
          <div class="shuttle_manage_body">
            <div class="shuttle_manage_body_sub">
                <div class="shuttle_manage_sub1">
                  <i class="list-icon fas fa-bus shuttle_busi"></i>
                  <span class="shuttle_busi_span">Shuttle 1</span>
                </div>
                <div class="shuttle_manage_sub1">
                  <span style="margin-left: 5px;">License Plate</span><br>
                  <span style="margin-left: 5px;">VIN</span>
                </div>
                <div class="shuttle_manage_sub1" style="background-color: white !important;">
                  <div class="shuttle_manage_sub1_sub"><div><span>Fault Codes</span></div><span class="shuttle_num1">1</span></div>
                  <div class="shuttle_manage_sub1_sub" style="margin-left: 2%;"><div><span>Alerts</span></div><span class="shuttle_num1" style="color: grey !important;">2</span></div>
                </div>
                <div class="shuttle_manage_logo">
                  <i class="fas fa-user shuttle_user_logo"></i>
                </div>
            </div>
            <div class="shuttle_manage_body_sub">
                <div class="shuttle_manage_sub1">
                  <i class="list-icon fas fa-bus shuttle_busi"></i>
                  <span class="shuttle_busi_span">Shuttle 1</span>
                </div>
                <div class="shuttle_manage_sub1">
                  <span style="margin-left: 5px;">License Plate</span><br>
                  <span style="margin-left: 5px;">VIN</span>
                </div>
                <div class="shuttle_manage_sub1" style="background-color: white !important;">
                  <div class="shuttle_manage_sub1_sub"><div><span>Fault Codes</span></div><span class="shuttle_num1" style="color: grey !important;">0</span></div>
                  <div class="shuttle_manage_sub1_sub" style="margin-left: 2%;"><div><span>Alerts</span></div><span class="shuttle_num1" style="color: grey !important;">4</span></div>
                </div>
                <div class="shuttle_manage_logo">
                  <i class="fas fa-user shuttle_user_logo"></i>
                </div>
            </div>
            <div class="shuttle_manage_body_sub">
                <div class="shuttle_manage_sub1">
                  <i class="list-icon fas fa-bus shuttle_busi"></i>
                  <span class="shuttle_busi_span">Shuttle 1</span>
                </div>
                <div class="shuttle_manage_sub1">
                  <span style="margin-left: 5px;">License Plate</span><br>
                  <span style="margin-left: 5px;">VIN</span>
                </div>
                <div class="shuttle_manage_sub1" style="background-color: white !important;">
                  <div class="shuttle_manage_sub1_sub"><div><span>Fault Codes</span></div><span class="shuttle_num1">2</span></div>
                  <div class="shuttle_manage_sub1_sub" style="margin-left: 2%;"><div><span>Alerts</span></div><span class="shuttle_num1" style="color: grey !important;">3</span></div>
                </div>
                <div class="shuttle_manage_logo">
                  <i class="fas fa-user shuttle_user_logo"></i>
                </div>
            </div>
          </div>
        </div>

        <div class="shuttle_item3">
          <span class="item_title">Hours of Operation</span>
          <div class="shuttle_operation_body">
            <div class="shuttle_operation_first">
              <span>View Week</span><span style="float: right;margin-right: 20px;">Daily Average</span>
              <div class="shuttle_operation_checkbody">
                <div class="shuttle_operation_checkbody_sub" style="background-color: #a5c8f2;"><i class="far fa-check-circle shutt_check"></i><span class="shutt_check_span">Shuttl 1</span></div>
                <div class="shuttle_operation_checkbody_sub" style="background-color: grey;"><i class="far fa-check-circle shutt_check"></i><span class="shutt_check_span">Shuttl 2</span></div>
                <div class="shuttle_operation_checkbody_sub" style="background-color: #ffeeee;"><i class="far fa-check-circle shutt_check"></i><span class="shutt_check_span">Shuttl 3</span></div>
              </div>
            </div>
            <div class="shuttle_operation_second">
              <div id="barMorris1" style="position: absolute;margin-top: -210px;"></div>
            </div>
              <div class="col-md-12 col-sm-6 mr-b-40 center shutt_knob">
                  <input data-plugin="knob" data-width="100" data-height="100" data-angleOffset="180" data-linecap="round" data-fgColor="#4990E2" value="90"  id="input_percent" name="input_percent"/>
              </div>

          </div>
        </div>  
        <div class="shuttle_item3" style="margin-left: 2%;">
          
          <span class="item_title">Hours of Operation</span>
          <div class="shuttle_operation_body">
            <div class="shuttle_operation_first">
              <span>View Week</span><span style="float: right;margin-right: 20px;">Daily Average</span>
              <div class="shuttle_operation_checkbody">
                <div class="shuttle_operation_checkbody_sub" style="background-color: #a5c8f2;"><i class="far fa-check-circle shutt_check"></i><span class="shutt_check_span">Shuttl 1</span></div>
                <div class="shuttle_operation_checkbody_sub" style="background-color: grey;"><i class="far fa-check-circle shutt_check"></i><span class="shutt_check_span">Shuttl 2</span></div>
                <div class="shuttle_operation_checkbody_sub" style="background-color: #ffeeee;"><i class="far fa-check-circle shutt_check"></i><span class="shutt_check_span">Shuttl 3</span></div>
              </div>
            </div>
            <div class="shuttle_operation_second">
              <div id="barMorris" style="position: absolute;margin-top: -210px;"></div>
            </div>
              <div class="col-md-12 col-sm-6 mr-b-40 center shutt_knob">
                  <input data-plugin="knob" data-width="100" data-height="100" data-angleOffset="180" data-linecap="round" data-fgColor="#4990E2" value="90"  id="input_percent" name="input_percent"/>
              </div>

          </div>
        </div>
      </div>
    </div><!-- /.widget-list -->

  </main><!-- /.main-wrappper -->


  <?php get_template_part('partials/right-sidebar') ?>
</div><!-- /.content-wrapper -->

<?php get_footer();