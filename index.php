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
  ),
  'styles' => array(
    'slick',
    'slick-theme',
    'switchery',
    'daterangepicker',
    'touchspin',
    'rangeslider',    
  )
);

get_header($config);
?>
<div class="content-wrapper">
  <?php get_template_part( $GLOBALS['sidebar_file'] ) ?>

  <main class="main-wrapper clearfix">

    <?php get_page_title($config); ?>

    <!-- =================================== -->
    <!-- TMS Data widgets ============ -->
    <!-- =================================== -->
    <div class="widget-list">
      <div class="row">

        <!-- User Summary -->
        <div class="widget-holder col-md-6">
          <div class="widget-bg">
            <div class="widget-heading widget-heading-border">
              <h5 class="widget-title">Devices</h5>
              <div class="widget-actions">
                <a href="<?php echo $prefix; ?>devices.php" class="badge bg-info-contrast px-3">See All Devices</a>
              </div><!-- /.widget-actions -->
            </div><!-- /.widget-heading -->
            <div class="widget-body">
              <div class="featured-jobs">



                <ul class="nav nav-tabs contact-details-tab">
                  <li class="nav-item">
                    <a href="#device1" id="dev1" class="dev nav-link active"  data-toggle="tab">
                  <div class="col-sm-10" >
                    <div class="media">
                      <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4-rtl">
                        <i class="feather feather-cpu mega"></i>
                      </figure>
                      <div class="media-body">
                        <h6 class="fs-base mt-2 mb-2 fw-semibold">Motorola 10000</h6>
                        <ul class="list-unstyled list-inline text-muted fs-13 mb-3">
                          <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl cereal">Serial <i class="feather feather-hash fs-base mr-1"></i>1234567890</li>
                        </ul>
                      </div><!-- /.media-body -->
                    </div><!-- /.media -->
                  </div><!-- /.col-sm-9 -->
                  </a>
                  <div class="col-sm-2 dash_knobchart">
                    <div class="counter-gradient no-padding canvas_pos1" style="width: 100px;height: 100px;"  id="ppp1" name="ppp1">
                        <div class="col-sm-12" id="aaa1" name="aaa1">
                            <input data-plugin="knob" data-width="100" data-height="100" data-angleOffset="100" data-linecap="round" data-fgColor="#4990E2" value="100"  id="input_percent" name="input_percent"/>
                        </div>
                    </div><!-- /.widget-counter -->
                  </div><!-- /.col-sm-3 -->
                    

                  </li>
                  <li class="nav-item">
                        <a href="#device2" id="dev2" class="dev nav-link "  data-toggle="tab">
                  <div class="col-sm-10 ">
                    <div class="media">
                      <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4-rtl">
                        <i class="feather feather-cpu mega"></i>
                      </figure>
                      <div class="media-body">
                        <h6 class="fs-base mt-2 mb-2 fw-semibold">Motorola 20000</h6>
                        <ul class="list-unstyled list-inline text-muted fs-13 mb-3">
                          <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl cereal">Serial <i class="feather feather-hash fs-base mr-1"></i>1234567890</li>
                        </ul>
                      </div><!-- /.media-body -->
                    </div><!-- /.media -->
                  </div><!-- /.col-sm-9 -->
                  </a>
                  <div class="col-sm-2 dash_knobchart">
                    <div class="counter-gradient no-padding canvas_pos1" style="width: 100px;height: 100px;" id="ppp1" name="ppp1">
                        <div class="col-sm-12" id="aaa2" name="aaa2">
                            <input data-plugin="knob" data-width="100" data-height="100" data-angleOffset="100" data-linecap="round" data-fgColor="#4990E2" value="100"  id="input_percent" name="input_percent"/>
                        </div>
                    </div><!-- /.widget-counter -->
                  </div><!-- /.col-sm-3 -->
                  </li>
                  <li class="nav-item">
                        <a href="#device3" id="dev3" class="dev nav-link"  data-toggle="tab">
                  <div class="col-sm-10">
                    <div class="media">
                      <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4-rtl">
                        <i class="feather feather-cpu mega"></i>
                      </figure>
                      <div class="media-body">
                        <h6 class="fs-base mt-2 mb-2 fw-semibold">Motorola 30000</h6>
                        <ul class="list-unstyled list-inline text-muted fs-13 mb-3">
                          <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl cereal">Serial <i class="feather feather-hash fs-base mr-1"></i>1234567890</li>
                        </ul>
                      </div><!-- /.media-body -->
                    </div><!-- /.media -->
                  </div><!-- /.col-sm-9 -->
                  </a>
                  <div class="col-sm-2 dash_knobchart">
                    <div class="counter-gradient no-padding canvas_pos1" style="width: 100px;height: 100px;"  id="ppp1" name="ppp1">
                        <div class="col-sm-12" id="aaa3" name="aaa3">
                            <input data-plugin="knob" data-width="100" data-height="100" data-angleOffset="100" data-linecap="round" data-fgColor="#4990E2" value="100"  id="input_percent" name="input_percent"/>
                        </div>
                    </div><!-- /.widget-counter -->
                  </div><!-- /.col-sm-3 -->
                  </li>
                </ul>


                        

              </div><!-- /.featured-jobs -->
            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        </div><!-- /.widget-holder -->



        <!-- Tabs Content -->
        <div class="col-12 col-md-6 mr-b-30" style="margin-top: 67px;">

           <div class="tab-content" style="width: 200px;float: left;padding-top: 0px;background-color: white;">
            <div role="tabpanel" class="tab-pane active" id="device1">
              <ul class="nav nav-tabs contact-details-tab" style="width: 175px;">
                <li class="nav-item">
                  <a href="#device1_1" id="device11" class="nav-link active" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Plug-in</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device1_2" id="device12"  class="nav-link" style="padding-right: 0px;width: 175px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Personalize</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device1_3" id="device13"  class="nav-link" style="padding-right: 0px;width: 175px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>AssignRoute</span></a>
                </li>
              </ul>

              

            </div>

            <div role="tabpanel" class="tab-pane" id="device2">
              <ul class="nav nav-tabs contact-details-tab" style="width: 175px;">
                <li class="nav-item">
                  <a href="#device2_1" id="device21"  class="nav-link " data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Plug-in</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device2_2"  id="device22" class="nav-link " style="padding-right: 0px;width: 175px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Personalize</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device2_3" id="device23"  class="nav-link" style="padding-right: 0px;width: 175px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>AssignRoute</span></a>
                </li>
              </ul>

             


            </div>

            <div role="tabpanel" class="tab-pane" id="device3">
              <ul class="nav nav-tabs contact-details-tab" style="width: 175px;">
                <li class="nav-item">
                  <a href="#device3_1"  id="device31" class="nav-link " data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Plug-in</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device3_2" id="device32" class="nav-link" style="padding-right: 0px;width: 175px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Personalize</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device3_3" id="device33" class="nav-link " style="padding-right: 0px;width: 175px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>AssignRoute</span></a>
                </li>
              </ul>



            </div>
          </div>

          <div class="tab-content" style="float: left;width: 230px;height: 207px;padding: 10px 10px;">

            <div role="tabpanel" class="tab-pane active" id="device1_1">
              <h5 style="margin: 0 0 !important;">Status:</h5>
              <input type="hidden" value="device1">
              <div class="plugin">
                <div class="plugin_back">
                  <h3 class="plugin_txt">CONNECTED</h3>
                </div>
                <div class="plugin_circle"><i class="fas fa-plug plugin_rotate"></i>
                </div>
              </div>
              
              <h8>Congratulations!You've just completed the hardest task.</h8>
            </div><!-- /.tab-pane -->

            <div role="tabpanel" class="tab-pane" id="device1_2">
                <h5 style="margin: 0 0 !important;">Name Your Shuttle:</h5>
                <h8>Example Back Ford Transit</h8>
                <input type="hidden" value="device1">
                <div class="personal">
                  <div class="personal_back">
                    <h3 class="personal_txt">Shuttle 1</h3>
                  </div>
                  <div class="personal_circle"><i class="fas fa-book personal_size"></i>
                  </div>
                </div>
              
                <h8 style="margin-top: 20px;float: left;">Add more vehicle details</h8>
            </div><!-- /.tab-pane -->            

            <div role="tabpanel" class="tab-pane" id="device1_3">
                <h5 style="margin: 0 0 !important;">Pick a Route:</h5>
                <h8>OR Create a new one</h8>
                <input type="hidden" value="device1">
                
                <div class="route">
                  <i class="fas fa-plus-circle route_size"></i><i class="fas fa-plus-circle route_size"></i><i class="fas fa-plus-circle route_size"></i><i class="fas fa-plus-circle route_size1"></i>
                </div>
              
                <h8 style="margin-top: 20px;">Add more vehicle details</h8>
            </div><!-- /.tab-pane -->

            <div role="tabpanel" class="tab-pane" id="device2_1">
              <h5 style="margin: 0 0 !important;">Status:</h5>
              <input type="hidden" value="device2">
              
              <div class="plugin">
                <div class="plugin_back">
                  <h3 class="plugin_txt">CONNECTED</h3>
                </div>
                <div class="plugin_circle"><i class="fas fa-plug plugin_rotate"></i>
                </div>
              </div>
              
              <h8>Congratulations!You've just completed the hardest task.</h8>
            </div><!-- /.tab-pane -->

            <div role="tabpanel" class="tab-pane" id="device2_2">
                <h5 style="margin: 0 0 !important;">Name Your Shuttle:</h5>
                <h8>Example Back Ford Transit</h8>
                <input type="hidden" value="device2">
                <div class="personal">
                  <div class="personal_back">
                    <h3 class="personal_txt">Shuttle 1</h3>
                  </div>
                  <div class="personal_circle"><i class="fas fa-book personal_size"></i>
                  </div>
                </div>
              
                <h8 style="margin-top: 20px;float: left;">Add more vehicle details</h8>
            </div><!-- /.tab-pane -->            

            <div role="tabpanel" class="tab-pane" id="device2_3">
              <h5 style="margin: 0 0 !important;">Pick a Route:</h5>
                <h8>OR Create a new one</h8>
                <input type="hidden" value="device1">
                
                <div class="route">
                  <i class="fas fa-plus-circle route_size"></i><i class="fas fa-plus-circle route_size"></i><i class="fas fa-plus-circle route_size"></i><i class="fas fa-plus-circle route_size1"></i>
                </div>
              
                <h8 style="margin-top: -30px;float: left;">Add more vehicle details</h8>
            </div><!-- /.tab-pane -->

            <div role="tabpanel" class="tab-pane " id="device3_1">
              <h5 style="margin: 0 0 !important;">Status:</h5>
              <input type="hidden" value="device3">
              <div class="plugin">
                <div class="plugin_back">
                  <h3 class="plugin_txt">CONNECTED</h3>
                </div>
                <div class="plugin_circle"><i class="fas fa-plug plugin_rotate"></i>
                </div>
              </div>
              
              <h8>Congratulations!You've just completed the hardest task.</h8>
            </div><!-- /.tab-pane -->

            <div role="tabpanel" class="tab-pane" id="device3_2">
                <h5 style="margin: 0 0 !important;">Name Your Shuttle:</h5>
                <h8>Example Back Ford Transit</h8>
                <input type="hidden" value="device3">
                <div class="personal">
                  <div class="personal_back">
                    <h3 class="personal_txt">Shuttle 1</h3>
                  </div>
                  <div class="personal_circle"><i class="fas fa-book personal_size"></i>
                  </div>
                </div>
              
                <h8 style="margin-top: 20px;float: left;">Add more vehicle details</h8>
            </div><!-- /.tab-pane -->            

            <div role="tabpanel" class="tab-pane" id="device3_3">
              <h5 style="margin: 0 0 !important;">Pick a Route:</h5>
                <h8>OR Create a new one</h8>
                <input type="hidden" value="device1">
                
                <div class="route">
                  <i class="fas fa-plus-circle route_size"></i><i class="fas fa-plus-circle route_size"></i><i class="fas fa-plus-circle route_size"></i><i class="fas fa-plus-circle route_size1"></i>
                </div>
              
                <h8 style="margin-top: 20px;">Add more vehicle details</h8>
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.col-sm-8 -->
      </div><!-- /.row -->
    </div><!-- /.widget-list -->


    <div class="widget-list row">

  <!-- User Summary -->
    <div class="widget-holder col-md-12">
      <div class="widget-bg">
        <div class="row page-title clearfix">
          <h6 class="widget-title page-title-heading mr-0 mr-r-5">Live Tracking</h6>
          <div class="widget-actions">
            <a href="<?php echo $prefix; ?>live-tracking.php" class="badge bg-info-contrast px-3">See All En Route</a>
          </div><!-- /.widget-actions -->
        </div><!-- /.widget-heading -->
        <div class="widget-body">
          <div class="featured-jobs">

            <div class="job-single row border-bottom pb-4 hover-parent tracking-dash">


              <div class="col-sm-12">
                <div class="media">
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4-rtl">
                    <i class="material-icons list-icon hotel-bigga">business</i>
                  </figure>
                  <div class="media-body">


                  <div id="timeline">

                    <div class="dot purp-full" id="one">
                      <span></span>
                      <date class="greener">COMPLETED � 18 mins ago</date>
                    </div>

                    <div class="dot purp-empty" id="three">
                      <span></span>
                      <date class="burgand">STOP 2 � ETA 20 mins</date>
                    </div>

                    <div id="two">
                      <span>
                        <img id="bus-logo" class="svg route-bus-dash-red" src="assets/img/bus-b.svg"/>
                      </span>
                    </div>

                    <div class="inside purp"></div>

                  </div>




                  <ul class="list-unstyled list-inline text-muted fs-13 mb-3 blues" style="padding-top: 17px;">
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Shuttle<b> <i class="feather feather-hash fs-base mr-1"></i>00000</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Route</b> <i class="feather feather-hash fs-base mr-1"></i>00000</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Departure</b> <i class="feather feather-log-out fs-base mr-1"></i>10:20am</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Arrival<b> <i class="feather feather-log-in fs-base mr-1"></i>10:40am</li>                        
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Round Trip</b> <i class="feather feather-clock fs-base mr-1"></i></i>20m</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Status</b> <i class="feather feather-zap fs-base mr-1"></i>On time</li>                    
                    </ul>

                  </div><!-- /.media-body -->
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4 end-route">
                    <i class="material-icons list-icon hotel-bigga">business</i>
                  </figure>
                </div><!-- /.media -->
              </div><!-- /.col-sm-10 -->
            </div><!-- /.job-single -->

            <div class="job-single row border-bottom pb-4 hover-parent tracking-dash">


              <div class="col-sm-12">
                <div class="media">
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4-rtl">
                    <i class="material-icons list-icon hotel-bigga">business</i>
                  </figure>
                  <div class="media-body">
                  <div id="timeline">

                    <div class="dot blacker-full" id="one">
                      <span ></span>
                      <date class="greener">COMPLETED � 18 mins ago</date>
                    </div>
                    

                    <div class="dot blacker-empty" id="three">
                      <span></span>
                      <date class="burgand">STOP 2 � ETA 20 mins</date>
                    </div>
                    <div id="two">
                      <span>
                        <img id="bus-logo" class="svg route-bus-dash-blue" src="assets/img/bus-b.svg"/>
                      </span>
                    </div>
                    <div class="inside blacker"></div>
                  </div>

                  <ul class="list-unstyled list-inline text-muted fs-13 mb-3 blues" style="padding-top: 17px;">
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Shuttle<b> <i class="feather feather-hash fs-base mr-1"></i>00000</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Route</b> <i class="feather feather-hash fs-base mr-1"></i>00000</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Departure</b> <i class="feather feather-log-out fs-base mr-1"></i>10:20am</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Arrival<b> <i class="feather feather-log-in fs-base mr-1"></i>10:40am</li>                        
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Round Trip</b> <i class="feather feather-clock fs-base mr-1"></i></i>20m</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Status</b> <i class="feather feather-zap fs-base mr-1"></i>On time</li>                    
                    </ul>
                  </div><!-- /.media-body -->
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4 end-route">
                    <i class="material-icons list-icon hotel-bigga">business</i>
                  </figure>
                </div><!-- /.media -->
              </div><!-- /.col-sm-10 -->
            </div><!-- /.job-single -->

            <div class="job-single row border-bottom pb-4 hover-parent tracking-dash">


              <div class="col-sm-12">
                <div class="media">
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4-rtl">
                    <i class="material-icons list-icon hotel-bigga">business</i>
                  </figure>
                  <div class="media-body">
                  <div id="timeline" >

                    <div class="dot greenly-full" id="one">
                      <span></span>
                      <date class="greener">COMPLETED � 18 mins ago</date>
                    </div>
                    

                    <div class="dot greenly-empty" id="three">
                      <span></span>
                      <date class="burgand">STOP 2 � ETA 20 mins</date>
                    </div>
                    <div id="two">
                      <span>
                        <img id="bus-logo" class="svg route-bus-dash-green" src="assets/img/bus-b.svg"/>
                      </span>
                    </div>
                    <div class="inside greenly"></div>
                  </div>


                  <ul class="list-unstyled list-inline text-muted fs-13 mb-3 blues" style="padding-top: 17px;">
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Shuttle<b> <i class="feather feather-hash fs-base mr-1"></i>00000</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Route</b> <i class="feather feather-hash fs-base mr-1"></i>00000</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Departure</b> <i class="feather feather-log-out fs-base mr-1"></i>10:20am</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Arrival<b> <i class="feather feather-log-in fs-base mr-1"></i>10:40am</li>                        
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Round Trip</b> <i class="feather feather-clock fs-base mr-1"></i></i>20m</li>
                      <li class="list-inline-item mr-4 mr-0-rtl ml-4-rtl"><b>Status</b> <i class="feather feather-zap fs-base mr-1"></i>On time</li>                    
                    </ul>
                  </div><!-- /.media-body -->
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4 end-route">
                    <i class="material-icons list-icon hotel-bigga">business</i>
                  </figure>
                </div><!-- /.media -->
              </div><!-- /.col-sm-10 -->
            </div><!-- /.job-single -->

          </div><!-- /.featured-jobs -->
        </div><!-- /.widget-body -->
      </div><!-- /.widget-bg -->
    </div><!-- /.widget-holder -->

    </div><!-- /.widget-list -->
  </main><!-- /.main-wrappper -->


  <?php get_template_part('partials/right-sidebar') ?>
</div><!-- /.content-wrapper -->

<?php get_footer();