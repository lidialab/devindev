  <!-- card -->
  <section>
    <div class="card-group my-5">

<?php

$ll_args = array(
  'post_type' => 'page',
  'tax_query' => array(
    array(
      'taxonomy' => 'contenuto_per_frontpage',
      'field'    => 'slug',
      'terms'    => 'in-evidenza',
    ),
  ),
);

$ll_the_query = new WP_Query( $ll_args );


while ( $ll_the_query->have_posts() ) :
  $ll_the_query->the_post();

  $ll_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'll_single');
?>
      <div class="card card-cover" style="background: linear-gradient(rgba(0,0,0, 0.3), rgba(0,0,0, 0.7)), url(<?php echo $ll_image_attributes[0]; ?>); background-size: cover; background-position: center center">

        <div class="card-body">
          <a href="<?php the_permalink(); ?>">
          <h4 class="card-title"><?php the_title(); ?></h4>
          <div class="card-text"><?php the_excerpt(); ?></div>
          <p class="card-link"><?php esc_html_e( 'Scopri di più', 'll' ) ?> <i class="fa fa-angle-right" aria-hidden="true"></i></p>
        </a>
        </div>

      </div>

        <?php

endwhile;

// Ripristina Query & Post Data originali
wp_reset_query();
wp_reset_postdata();

  ?>


      </div>
    </section>
