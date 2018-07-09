<!-- testimonials -->

  <section class="container testimonial">


<?php


$ll_args = array(
  'post_type' => 'page',
  'tax_query' => array(
    array(
      'taxonomy' => 'contenuto_per_frontpage',
      'field'    => 'slug',
      'terms'    => 'testimonials',
    ),
  ),
);

$ll_the_query = new WP_Query( $ll_args );


while ( $ll_the_query->have_posts() ) :
  $ll_the_query->the_post();

?>
      <div class="row">
        <div class="col-sm-3">
          <?php the_post_thumbnail('ll_quad', array('class' => 'img-fluid rounded-circle', 'alt' => get_the_title() )); ?>
        </div>
        <div class="col-sm-9">
            <blockquote><?php the_content();?></blockquote>
                      <?php the_field('ll_citazione'); ?>
        </div>
      </div>

<?php


endwhile;

// Ripristina Query & Post Data originali
wp_reset_query();
wp_reset_postdata();

  ?>

  </section>