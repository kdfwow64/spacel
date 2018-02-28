<?php
include_once 'lib/init.php';

$config = array(
	'title' => 'Shuttle Analysis - TrackMyShuttle',
  'dasboardtitle' => 'Shuttle Analysis',   
	'body_class' => $GLOBALS['body_class'] . '',
	'scripts' => array(
		'sparkline',
    'bootstrap-table',
    'toastr',
    'sweet-alert',       
	),
 'styles' => array(
    'bootstrap-table',
    'toastr',
    'sweet-alert',    
  ), 
);

get_header($config);
?>

<div class="content-wrapper">
	<?php get_template_part( $GLOBALS['sidebar_file'] ) ?>

	<main class="main-wrapper clearfix">

		<?php get_page_title($config); ?>

		<!-- =================================== -->
		<!-- Different data widgets ============ -->
		<!-- =================================== -->
		<div class="widget-list">

      <div class="row">

        <div class="col-md-12 widget-holder">
          <div class="widget-bg">
            <div class="widget-body clearfix">

              <div class="alert alert-icon alert-success border-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="material-icons list-icon">check_circle</i>
                <strong>Well done!</strong> You've successfully read this important alert message.
              </div>

              <div class="alert alert-icon alert-info border-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="material-icons list-icon">info</i>
                <strong>Oh no batman!</strong> There's a cat signal in the sky.
              </div>

              <div class="alert alert-icon alert-warning border-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="material-icons list-icon">warning</i>
                <strong>It's a bird, it's a plane!</strong> Nope Justice League sucked.
              </div>

              <div class="alert alert-icon alert-danger border-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="material-icons list-icon">not_interested</i>
                <strong>Oh snap!</strong> Keep on snapping and snapping.
              </div>
            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        </div><!-- /.widget-holder -->

      </div><!-- /.row -->      

			<div class="row">

        <div class="col-lg-2 col-sm-6 widget-holder">
          <div class="widget-bg">
            <div class="widget-body clearfix">
              <span class="text-muted text-uppercase fw-500 blues">Shuttles</span>

              <section class="mb-5">
                <h3 class="m-0 sub-heading-font-family fw-300 float-left">36&#37;</h3>
                <span class="badge badge-pill badge-danger my-2 float-right">
                  <span class="mr-1 fs-12">8&#37;</span>
                  <i class="material-icons list-icons fs-12">arrow_drop_down</i>
                </span>
              </section>

              <div class="clearfix">
                <div class="sparklineChart" id="sparklinedash2"></div>
              </div>

            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        </div><!-- /.widget-holder -->

        <div class="col-lg-2 col-sm-6 widget-holder">
          <div class="widget-bg">
            <div class="widget-body clearfix">
              <span class="text-muted text-uppercase fw-500 blues">Routes</span>

              <section class="mb-5">
                <h3 class="m-0 sub-heading-font-family fw-300 float-left">42&#37;</h3>
                <span class="badge badge-pill badge-success my-2 float-right">
                  <span class="mr-1 fs-12">16&#37;</span>
                  <i class="material-icons list-icons fs-12">arrow_drop_up</i>
                </span>
              </section>

              <div class="clearfix">
                <div class="sparklineChart" id="sparklinedash3"></div>
              </div>

            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        </div><!-- /.widget-holder -->

        <div class="col-lg-2 col-sm-6 widget-holder">
          <div class="widget-bg">
            <div class="widget-body clearfix">
              <span class="text-muted text-uppercase fw-500 blues">Devices</span>

              <section class="mb-5">
                <h3 class="m-0 sub-heading-font-family fw-300 float-left">56&#37;</h3>
                <span class="badge badge-pill badge-primary my-2 float-right">
                  <span class="mr-1 fs-12">24&#37;</span>
                  <i class="material-icons list-icons fs-12">arrow_drop_up</i>
                </span>
              </section>

              <div class="clearfix">
                <div class="sparklineChart" id="sparklinedash4"></div>
              </div>

            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        </div><!-- /.widget-holder -->


        <div class="col-lg-2 col-sm-6 widget-holder">
          <div class="widget-bg">
            <div class="widget-body clearfix">
              <span class="text-muted text-uppercase fw-500 blues">Drivers</span>

              <section class="mb-5">
                <h3 class="m-0 sub-heading-font-family fw-300 float-left">83&#37;</h3>
                <span class="badge badge-pill badge-info my-2 float-right">
                  <span class="mr-1 fs-12">32&#37;</span>
                  <i class="material-icons list-icons fs-12">arrow_drop_up</i>
                </span>
              </section>

              <div class="clearfix">
                <div class="sparklineChart d-flex justify-content-center" id="sparklinedashbar5"></div>
              </div>

            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        </div><!-- /.widget-holder -->

        <div class="col-lg-2 col-sm-6 widget-holder">
          <div class="widget-bg">
            <div class="widget-body clearfix">
              <span class="text-muted text-uppercase fw-500 blues">Passengers</span>

              <section class="mb-5">
                <h3 class="m-0 sub-heading-font-family fw-300 float-left">36&#37;</h3>
                <span class="badge badge-pill badge-danger my-2 float-right">
                  <span class="mr-1 fs-12">8&#37;</span>
                  <i class="material-icons list-icons fs-12">arrow_drop_down</i>
                </span>
              </section>

              <div class="clearfix">
                <div class="sparklineChart d-flex justify-content-center" id="sparklinedashbar6"></div>
              </div>

            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        </div><!-- /.widget-holder -->

        <div class="col-lg-2 col-sm-6 widget-holder">
          <div class="widget-bg">
            <div class="widget-body clearfix">
                <span class="text-muted text-uppercase fw-500 blues">Trips</span>

              <section class="mb-5">
                <h3 class="m-0 sub-heading-font-family fw-300 float-left">42&#37;</h3>
                <span class="badge badge-pill badge-color-scheme my-2 float-right">
                  <span class="mr-1 fs-12">16&#37;</span>
                  <i class="material-icons list-icons fs-12">arrow_drop_up</i>
                </span>
              </section>

              <div class="clearfix">
                <div class="sparklineChart d-flex justify-content-center" id="sparklinedashbar7"></div>
              </div>

            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        </div><!-- /.widget-holder -->        
      </div><!-- /.row -->
      <hr>
      <div class="row">

        <div class="col-md-12 widget-holder">
          <div class="widget-bg">

            <div class="widget-heading clearfix">
              <h5>Shuttle Management</h5>
            </div><!-- /.widget-heading -->

            <div class="widget-body clearfix">
              <table class="table table-striped"
                     data-height="300"
                     data-toggle="table"
                     data-sort-name="Name"
                     data-search="true"
                     data-show-refresh="true"
                     data-show-toggle="true"
                     data-show-columns="true"
                     data-url="assets/js/bootstrap-table/bootstrap-table2.json">
                <thead>
                  <tr>
                    <th data-field="Type_shuttle" data-sortable="true">Shuttle</th>
                    <th data-field="Vin" data-sortable="true">Vin</th>                    
                    <th data-field="Driver_name" data-sortable="true">Driver Name</th>  
                    <th data-field="Vehicle_rating" data-sortable="true">Vehicle Rating</th>                                          
                    <th data-field="License" data-sortable="true">License</th>
                    <th data-field="Device" data-sortable="true">Device</th>                
                  </tr>
                </thead>
              </table>
            </div><!-- /.widget-body -->
          </div><!-- /.widget-bg -->
        </div><!-- /.widget-holder -->

			</div><!-- /.row -->

		</div><!-- /.widget-list -->
	</main><!-- /.main-wrappper -->

	<?php get_template_part('partials/right-sidebar') ?>
</div><!-- /.content-wrapper -->

<?php get_footer();
