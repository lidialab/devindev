<!-- 2 Quote -->
<?php


$ll_args = array(
  'post_type' => 'page',
  'tax_query' => array(
    array(
      'taxonomy' => 'contenuto_per_frontpage',
      'field'    => 'slug',
      'terms'    => 'post-evidenza',
    ),
  ),
);

$ll_the_query = new WP_Query( $ll_args );


while ( $ll_the_query->have_posts() ) :
  $ll_the_query->the_post();


?>

  <section class="container two-quote">

    <div class="row mt-5">
      <div class="col-sm-6">
        <?php the_content(); ?>
      </div>
      <div class="col-sm-6">
          <?php the_field('ll_citazione'); ?>
      </div>
    </div>
  </section>

<?php

endwhile;

// Ripristina Query & Post Data originali
wp_reset_query();
wp_reset_postdata();

  ?>
