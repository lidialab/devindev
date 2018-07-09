<?php get_header(); ?>
<main class="container mt-5 main-content">
	<div class="row">
		<div class="col-sm-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>
				<h1 class="display-5"><?php the_title(); ?></h1>
				<p><?php the_time('l, j M Y'); ?><?php if ( has_category() ) {echo" - "; the_category(', ');} if ( has_tag() ) { echo" - "; the_tags(', '); } ?></p>
				<?php the_post_thumbnail('', array('class' => 'img-fluid mb-4', 'alt' => get_the_title() )); ?>
				<?php
            		include 'moduli/modulo-rfc.php';

						the_content();

		            include 'moduli/modulo-rif.php';
		            include 'moduli/modulo-corsi.php';
				?>

				 <?php wp_link_pages( 'pagelink=Page %' ); ?>


			</article>

		<?php endwhile; else : ?>

		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.','ll' ); ?></p>

		<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>


		<div class="commenti">
			<hr>
			<?php comments_template(); ?>
		</div>
	</div>
</main>


<?php get_footer(); ?>
