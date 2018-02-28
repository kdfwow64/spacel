<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link href="assets/vendors/fontawesome-icons/fa-light.css" rel="stylesheet">
	<link href="assets/vendors/fontawesome-icons/fa-regular.css" rel="stylesheet">		
	<link rel="stylesheet" href="assets/css/pace.css" />

	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?php echo isset( $title ) && $title ? $title : 'Starter Template by Megghross' ?></title>

	<!-- CSS -->
	<?php print_styles() ?>

	<!-- Head Libs -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>

</head>
<body<?php body_class() ?>>
	<div id="wrapper" class="wrapper">
    <?php get_template_part( $GLOBALS['nav_file'] ); ?>
