<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php bloginfo('description'); ?>">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	  <!-- Navbar -->
<header id="header" class="header">
<nav class="navbar fixed-top navbar-expand-lg bg-primary navbar-dark animated"> <!-- fixed-top -->
	<div class="container">

<?php
		if ( get_theme_mod( 'll_logo_img', '' ) != '' ) {

				$ll_logo_image = get_theme_mod( 'll_logo_img' ,'' );

			} else {

				$ll_logo_image = get_template_directory_uri() . "/img/LLL75.png";
			}

		if ( get_theme_mod( 'll_logo_alt_text', '' ) != '' ) {

				$ll_alt_text_logo = get_theme_mod( 'll_logo_alt_text' );

			} else {

				$ll_alt_text_logo = "logo LidiaLAB Dev in Dev";
			}
?>

		<a class="navbar-brand animated" href="<?php echo esc_url_raw(home_url()); ?>"><img class="animated" src="<?php echo $ll_logo_image; ?>" alt="<?php echo $ll_alt_text_logo; ?>"></a>


		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="bs4navbar">
			<?php
				wp_nav_menu([
				'menu'            => 'header',
				'theme_location'  => 'header',
				'container'       => '',
				'container_id'    => '',
				'container_class' => '',
				'menu_id'         => false,
				'menu_class'      => 'navbar-nav mr-auto animated',
				'depth'           => 2,
				'fallback_cb'     => 'bs4navwalker::fallback',
				'walker'          => new bs4navwalker()
				]);
			?>

		    <form class="form-inline my-2 my-lg-0" action="<?php echo esc_url_raw( home_url() ); ?>" method="get">
		      <input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Search" name="s">
		      <button class="icon-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		    </form>

			<ul class="navbar-nav navbar-social push-right">
				<li><a href="https://www.linkedin.com/in/lidiapellizzaro/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				<li><a href="https://twitter.com/LidiaLAB_IT" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="https://github.com/lidialab" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></li>
			</ul>

		</div>

	</div>
</nav>
</header>