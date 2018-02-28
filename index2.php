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

    

    <!-- =================================== -->
    <!-- TMS Data widgets ============ -->
    <!-- =================================== -->
    <div class="widget-list dash_top">
      <div class="row">

        <!-- User Summary -->
        <div class="widget-holder col-md-6">
          <div class="widget-bg">
            <div class="widget-heading ">
              <span class="dash_top_title">Getting Started</span>
              <span>1 out of 3 trackers fully setup</span>
            </div><!-- /.widget-heading -->
            <div class="widget-body">
              <div class="featured-jobs" style="width: 378px;">
                <ul class="nav nav-tabs contact-details-tab">
                  <li class="nav-item">
                    <div>
                    <a href="#device1" id="dev1" class="dev nav-link active"  data-toggle="tab"><i class="fas fa-microchip micro" ></i><span class="spand1">Device 1</span><span class="spand2">S/N XXXXXXXXX</span></a>
                    </div>
                    

                  </li>
                  <li class="nav-item">
                    <a href="#device2" id="dev2"  class="dev nav-link"  data-toggle="tab"><i class="fas fa-microchip micro" ></i><span class="spand1">Device 2</span><span class="spand2">S/N XXXXXXXXX</span></a>
                  </li>
                  <li class="nav-item">
                    <a href="#device3" id="dev3"  class="dev nav-link"  data-toggle="tab"><i class="fas fa-microchip micro" ></i><span class="spand1">Device 3</span><span class="spand2">S/N XXXXXXXXX</span></a>
                  </li>
                </ul>

              </div><!-- /.featured-jobs -->
              <div class="counter-gradient no-padding canvas_pos1" id="ppp1"  name = "ppp1">
                <div class="col-md-12 col-sm-6 mr-b-40 center" id = "aaa1" name = "aaa1">
                    <input data-plugin="knob" data-width="100" data-height="100" data-angleOffset="180" data-linecap="round" data-fgColor="#4990E2" value="90"  id="input_percent" name="input_percent"/>
                </div>
                <span class="canvas_pro">%</span>
                <span class="canvas_txt">Complete</span>
              </div><!-- /.widget-counter -->

              <div class="counter-gradient no-padding canvas_pos2" id="ppp2"  name = "ppp2">
                <div class="col-md-12 col-sm-6 mr-b-40 center" id = "aaa2" name = "aaa2">
                    <input data-plugin="knob" data-width="100" data-height="100" data-angleOffset="180" data-linecap="round" data-fgColor="#4990E2" value="90"  id="input_percent" name="input_percent"/>
                </div>
                <span class="canvas_pro">%</span>
                <span class="canvas_txt">Complete</span>
              </div><!-- /.widget-counter -->

              <div class="counter-gradient no-padding canvas_pos3" id="ppp3"  name = "ppp3">
                <div class="col-md-12 col-sm-6 mr-b-40 center" id = "aaa3" name = "aaa3">
                    <input data-plugin="knob" data-width="100" data-height="100" data-angleOffset="180" data-linecap="round" data-fgColor="#4990E2" value="90"  id="input_percent" name="input_percent"/>
                </div>
                <span class="canvas_pro">%</span>
                <span class="canvas_txt">Complete</span>
              </div><!-- /.widget-counter -->

            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        


        </div><!-- /.widget-holder -->

        <!-- Tabs Content -->
        <div class="col-12 col-md-6 mr-b-30" style="padding-top: 67px;">
          <div class="tab-content" style="width: 200px;float: left;padding-top: 0px;background-color: white;">
            <div role="tabpanel" class="tab-pane active" id="device1">
              <ul class="nav nav-tabs contact-details-tab">
                <li class="nav-item">
                  <a href="#device1_1" id="device11" class="nav-link active" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Plug-in</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device1_2" id="device12"  class="nav-link" style="padding-right: 0px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Personalize</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device1_3" id="device13"  class="nav-link" style="padding-right: 0px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>AssignRoute</span></a>
                </li>
              </ul>

              

            </div>

            <div role="tabpanel" class="tab-pane" id="device2">
              <ul class="nav nav-tabs contact-details-tab">
                <li class="nav-item">
                  <a href="#device2_1" id="device21"  class="nav-link " data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Plug-in</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device2_2"  id="device22" class="nav-link " style="padding-right: 0px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Personalize</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device2_3" id="device23"  class="nav-link" style="padding-right: 0px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>AssignRoute</span></a>
                </li>
              </ul>

             


            </div>

            <div role="tabpanel" class="tab-pane" id="device3">
              <ul class="nav nav-tabs contact-details-tab">
                <li class="nav-item">
                  <a href="#device3_1"  id="device31" class="nav-link " data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Plug-in</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device3_2" id="device32" class="nav-link" style="padding-right: 0px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>Personalize</span></a>
                </li>
                <li class="nav-item">
                  <a href="#device3_3" id="device33" class="nav-link " style="padding-right: 0px;" data-toggle="tab"><i class="far fa-check-circle plugin_tab"></i><span>AssignRoute</span></a>
                </li>
              </ul>



            </div>
          </div>

          <div class="tab-content" style="float: left;width: 340px;height: 207px;padding: 10px 10px;">

            <div role="tabpanel" class="tab-pane active" id="device1_1">
              <h5 style="margin: 20 0;">Status:</h5>
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
              <h5 style="margin: 20 0;">Status:</h5>
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
              
                <h8 style="margin-top: 20px;">Add more vehicle details</h8>
            </div><!-- /.tab-pane -->

            <div role="tabpanel" class="tab-pane " id="device3_1">
              <h5 style="margin: 20 0;">Status:</h5>
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



        <!-- /.col-sm-8 -->
      </div><!-- /.row -->
    </div><!-- /.widget-list -->


    <div class="widget-list row dash_bottom" >

  <!-- User Summary -->
    <div class="widget-holder col-md-12">
      <div class="widget-bg">
        <div class="widget-heading widget-heading-border">
          <h5 class="widget-title">Tracking Lanes</h5>
          <div class="widget-actions">
          
          </div><!-- /.widget-actions -->
        </div><!-- /.widget-heading -->
        <div class="widget-body">
          <div class="featured-jobs">

            <div class="job-single row border-bottom pb-4 hover-parent tracking-dash" id="track1">

              <span style="color: #7030a0;">Shuttle 1|Route1</span>
              <div class="col-sm-12">
                <div class="media">
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4-rtl">
                    <i class="fas fa-building build_size"></i>
                  </figure>
                  <div class="media-body">


                  <div id="timeline">

                    <div class="dot" id="one">
                      <span></span>
                      <date class="greener">COMPLETED � 18 mins ago</date>
                    </div>


                    <div class="dot" id="three">
                      <span></span>
                      <date class="burgand">STOP 2 � ETA 20 mins</date>
                    </div>
                    <div id="two">
                      <span>
                        <img id="bus-logo" class="svg route-bus-dash-brown "  src="assets/img/bus-b.svg"/>
                      </span>
                    </div>
                    <div class="inside" style="background-color: #7030a0;"></div>
                  </div>




                  
                  </div><!-- /.media-body -->
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4 end-route">
                    <i class="fas fa-building build_size"></i>
                  </figure>
                </div><!-- /.media -->
              </div><!-- /.col-sm-10 -->
              <span style="color: grey;font-size: 10px;">Department</span>
            </div><!-- /.job-single -->

            <div class="job-single row border-bottom pb-4 hover-parent tracking-dash"  id="track2">
              <span style="color: black;">Shuttle 2|Route1</span>

              <div class="col-sm-12">
                <div class="media">
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4-rtl">
                    <i class="fas fa-building build_size"></i>
                  </figure>
                  <div class="media-body">
                  <div id="timeline">

                    <div class="dot" id="one">
                      <span  style="border-color: black !important;"></span>
                      <date class="greener">COMPLETED � 18 mins ago</date>
                    </div>
                    

                    <div class="dot" id="three">
                      <span  style="border-color: black !important;"></span>
                      <date class="burgand">STOP 2 � ETA 20 mins</date>
                    </div>
                    <div id="two">
                      <span>
                        <img id="bus-logo" class="svg route-bus-dash-black" src="assets/img/bus-b.svg"/>
                      </span>
                    </div>
                    <div class="inside"  style="background-color: black !important;"></div>
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
                    <i class="fas fa-building build_size"></i>
                  </figure>
                </div><!-- /.media -->
              </div><!-- /.col-sm-10 -->
            <span style="color: grey;font-size: 10px;">Department</span>
            </div><!-- /.job-single -->

            <div class="job-single row border-bottom pb-4 hover-parent tracking-dash"  id="track3">

              <span style="color: #14a235;">Shuttle 3|Route1</span>
              <div class="col-sm-12">
                <div class="media">
                  <figure class="thumb-xs2 mr-4 mr-0-rtl ml-4-rtl">
                    <i class="fas fa-building build_size"></i>
                  </figure>
                  <div class="media-body">
                  <div id="timeline" >

                    <div class="dot" id="one">
                      <span style="border-color: #14a235 !important;"></span>
                      <date class="greener">COMPLETED � 18 mins ago</date>
                    </div>
                    

                    <div class="dot" id="three">
                      <span style="border-color: #14a235 !important;"></span>
                      <date class="burgand">STOP 2 � ETA 20 mins</date>
                    </div>
                    <div id="two">
                      <span>
                        <img id="bus-logo" class="svg route-bus-dash-green" src="assets/img/bus-b.svg"/>
                      </span>
                    </div>
                    <div class="inside"  style="background-color: #14a235 !important;"></div>
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
                    <i class="fas fa-building build_size"></i>
                  </figure>
                </div><!-- /.media -->
              </div><!-- /.col-sm-10 -->
            <span style="color: grey;font-size: 10px;">Department</span>
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