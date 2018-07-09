 <!-- Focus -->
  <section class="container focuses">
  <h2>Percorso di studi</h2>
    <div class="row mt-5">

<?php

  $ll_args = array(
    'post_type' => 'page',
    'orderby'   => 'date',
    'order'     => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'contenuto_per_frontpage',
        'field'    => 'slug',
        'terms'    => 'focus',
      ),
    ),
  );



  $ll_the_query = new WP_Query( $ll_args );

  while ( $ll_the_query->have_posts() ) :
    $ll_the_query->the_post();

?>
  <div class="col-sm-3 focus">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="text-intro"><?php the_field('ll_intro'); ?></p>
    <a href="<?php the_permalink(); ?>" class="text-link"><?php esc_html_e( 'Scopri di più', 'll' ) ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
  </div>

<?php

  endwhile;

  // Ripristina Query & Post Data originali
  wp_reset_query();
  wp_reset_postdata();

?>
    </div>
  </section>
