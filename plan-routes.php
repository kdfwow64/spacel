<?php
include_once 'lib/init.php';

$config = array(
	'title' => 'Plan Routes - TrackMyShuttle',
	'dasboardtitle' => 'Plan Routes',
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
        
        <iframe src="routes-planner.php" width="100%" height="630">
        
			</div><!-- /.row -->
		</div><!-- /.widget-list -->
  </main><!-- /.main-wrapper -->

  <?php get_template_part('partials/right-sidebar') ?>
</div><!-- /.content-wrapper -->

<?php get_footer(); ?>