<?php

$prefix = '';
if( $GLOBALS['enable_relative_nav'] )
  $prefix = $prefix . '../default/';

?>
<!-- SIDEBAR -->
<aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">

	<!-- Sidebar Menu -->
	<nav class="sidebar-nav">
		<ul class="nav in side-menu">
			<li>
				<a class="bluer" href="<?php echo $prefix; ?>index.php">
					<i class="list-icon feather feather-grid" ></i>
					<span class="hide-menu">
						Dashboard
					</span>
				</a>
			</li>

			<li>
				<a class="bluer" href="<?php echo $prefix; ?>live-tracking.php">
					<i class="list-icon feather feather-navigation"></i>
					<span class="hide-menu">
						Live Tracking
					</span>
				</a>
			</li>

			<li>
				<a class="bluer" href="<?php echo $prefix; ?>routes.php">
					<i class="list-icon feather feather-map"></i>
					<span class="hide-menu">
						Routes
					</span>
				</a>
			</li>

			<li>
				<a class="bluer" href="<?php echo $prefix; ?>shuttles.php">
					<i class="list-icon fal fa-bus"></i>
					<span class="hide-menu">
						Shuttles
					</span>
				</a>
			</li>

			<li>
				<a class="bluer" href="<?php echo $prefix; ?>settings.php">
					<i class="list-icon feather feather-settings"></i>
					<span class="hide-menu">
						Settings
					</span>
				</a>
			</li>

			<li>
				<a class="bluer" href="<?php echo $prefix; ?>support.php">
					<i class="list-icon feather feather-life-buoy"></i>
					<span class="hide-menu">
						Support
					</span>
				</a>
			</li>

		</ul><!-- /.side-menu -->
	</nav><!-- /.sidebar-nav -->
</aside><!-- /.site-sidebar -->