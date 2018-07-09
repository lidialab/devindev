<?php get_header(); ?>

<div class="container my-5">
<?php 
		if( is_search() ) {
		
?>
				<h1><?php esc_html_e('Risultati di ricerca per : ', 'll'); echo $s;?></h1>
<?php 
		} 	else 
			if( is_category() || is_tag() ) {
		
?>
				<h1><?php echo single_cat_title(); ?></h1>
<?php 
			} else {
?>

				<h1><?php bloginfo('description'); ?></h1>
<?php 
			}
?>
</div>


<main class="container  main-content">
	<div class="row">
		<div class="col-sm-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p><?php the_time('l, j M Y'); ?> - <?php the_category(', '); ?></p>
				<?php the_post_thumbnail('', array('class' => 'img-fluid mb-4', 'alt' => get_the_title() )); ?>
				<p><?php the_excerpt(); ?></p>
			</article>

		<?php endwhile; ?>

		<?php
				global $wp_query;

				$big = 999999999; // need an unlikely integer

				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages
				) );
		?>



		<?php else : ?>

		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.','ll' ); ?></p>

		<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>

	</div>
</main>


<?php get_footer(); ?>