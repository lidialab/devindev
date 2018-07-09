<?php get_header(); ?>


<?php

				if( has_post_thumbnail() ) {

?>


<?php
		$ll_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'll_big');
?>
  <section class="jumbotron jumbotron-fluid text-white cta-box"
  style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.7)),
  url(<?php echo $ll_image_attributes[0]; ?>);
  background-size: cover; background-position: center center">
    <div class="container">
      <h1 class="cta-box-title"><?php the_title(); ?></h1>
    </div>
  </section>

<?php

				}

?>

<main class="container mt-5 main-content">
	<div class="row">
		<div class="col-sm-8 ml-sm-auto mr-sm-auto"> <!-- ml-sm-auto mr-sm-auto: centratura flex bootstrap -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>

<?php

				if( !has_post_thumbnail() ) {

?>
				<h1 class="display-4 text-center"><?php the_title(); ?></h1>

<?php

				}

?>


<?php

            include 'moduli/modulo-rfc.php';

            the_content();

            include 'moduli/modulo-rif.php';
            include 'moduli/modulo-corsi.php';

?>

			</article>

		<?php endwhile; else : ?>

		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'll' ); ?></p>

		<?php endif; ?>
		</div>

	</div>
</main>


<?php get_footer(); ?>
