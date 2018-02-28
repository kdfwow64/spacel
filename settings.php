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
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<div class="content-wrapper">
  <?php get_template_part( $GLOBALS['sidebar_file'] ) ?>

  <main class="main-wrapper clearfix">

    

    <!-- =================================== -->
    <!-- TMS Data widgets ============ -->
    <!-- =================================== -->
    <div class="widget-list ">
      <div class="grid-container">
        <div class="grid-item">
          <div class="grid_item_title">
            <span class="item_title">Company Profile</span>
            <div class="item_title_menu"><i class="fas fa-book" style="margin-right: 3px;"></i><i class="fas fa-ellipsis-v"></i></div>
          </div>
          <div class="grid_item_body">
            <div class="grid_item_body_sub1"><span style="margin-left: -75px;">Company Name</span></div>
            <div class="grid_item_body_sub"><span>Company Phone</span></div>
            <div class="grid_item_body_sub" style="height: 40% !important;"><span>Company Address</span></div>
          </div>
          <div class="grid_item_logo">
            <span>+Add Logo</span>
          </div>
        </div>
        <div class="grid-item">
          <div class="grid_item_title">
            <span class="item_title">User Management</span>
            <div class="item_title_menu"><i class="fas fa-book" style="margin-right: 3px;"></i><i class="fas fa-ellipsis-v"></i></div>
          </div>
          <div class="grid_item_body1">
            <div class="grid-container-sub">
              <div class="grid-item-sub">
                User1
              </div>
              <div class="grid-item-sub">
                Admin
              </div>
              <div class="grid-item-sub">
                Actions
              </div>
              <div class="grid-item-sub">
                User2
              </div>
              <div class="grid-item-sub">
                General
              </div>
              <div class="grid-item-sub">
                Actions
              </div>
              <div class="grid-item-sub">
                User3
              </div>
              <div class="grid-item-sub">
                General
              </div>
              <div class="grid-item-sub">
                Actions
              </div>
            </div>
            <i class="fas fa-plus-circle manage_i"></i>
            <span class="manage_span">Add New User</span>
          </div>
        </div>
        <div class="grid-item">
          <div class="grid_item_title">
            <span class="item_title">Useful Links</span>
          </div>
          <div class="grid_item_body" style="background-color: #eeeeee;height: 60% !important;padding: 10px;">
            <span>Update Subscription</span><br>
            <span>Request New Devices</span><br>
            <span>Access Route Data</span><br>
            <span>Warranty Information</span><br>
          </div>
        </div>
        <div class="grid-item1">
          <div class="grid_item_title">
            <span class="item_title">Contact Us</span>
          </div>
          <i class="fas fa-phone" style="transform: rotate(100deg);"></i><span>1-833-774-8885</span><br>
          <i class="fas fa-envelope"></i><span>support@skylarkllc.com</span><br><br><br><br>
          <span>Terms of Use</span><br>
          <span>Privacy Policy</span>
        </div>
      </div>
    </div><!-- /.widget-list -->


  </main><!-- /.main-wrappper -->


  <?php get_template_part('partials/right-sidebar') ?>
</div><!-- /.content-wrapper -->

<?php get_footer();