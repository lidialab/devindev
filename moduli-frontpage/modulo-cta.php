
  <!-- jumbotron -->
<?php

$ll_args = array(
  'post_type' => 'page',
  'tax_query' => array(
    array(
      'taxonomy' => 'contenuto_per_frontpage',
      'field'    => 'slug',
      'terms'    => 'cta',
    ),
  ),
);

$ll_the_query = new WP_Query( $ll_args );


while ( $ll_the_query->have_posts() ) :
   $ll_the_query->the_post();


?>

<?php
$ll_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'll_big');
?>


  <section class="jumbotron jumbotron-fluid mt-5 text-white cta-box"
  style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.7)),
  url(<?php echo $ll_image_attributes[0]; ?>);
  background-size: cover; background-position: center center">
    <div class="container">
      <h3 class="cta-box-title"><?php the_title(); ?></h3>
      <div class="cta-box-text"><?php the_excerpt(); ?></div>
      <a class="btn btn-primary btn-lg ll-btn-stile" href="<?php the_permalink(); ?>" role="button"><?php esc_html_e('Contattaci','ll'); ?></a>

    </div>
  </section>

        <?php

endwhile;

// Ripristina Query & Post Data originali
wp_reset_query();
wp_reset_postdata();

   ?>
