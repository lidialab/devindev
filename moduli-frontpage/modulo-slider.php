
  <!-- Slider -->
  <section id="carouselIndicators" class="carousel slide slider-big" data-ride="carousel" data-interval="8000" data-wrap="false">
    <ol class="carousel-indicators">
      <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselIndicators" data-slide-to="1"></li>
      <li data-target="#carouselIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <?php


$ll_args = array(
  'post_type' => 'page',
  'tax_query' => array(
    array(
      'taxonomy' => 'contenuto_per_frontpage',
      'field'    => 'slug',
      'terms'    => 'slider',
    ),
  ),
);




$ll_the_query = new WP_Query( $ll_args );
$ll_idx = 0;

while ( $ll_the_query->have_posts() ) :
   $ll_the_query->the_post();

         $ll_idx++;
      $ll_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'll_big');
?>


      <div class="carousel-item  <?php if($ll_idx==1){echo 'active';} ?>" style="background: linear-gradient(rgba(0,0,0, 0.3), rgba(0,0,0, 0.7)), url(<?php echo $ll_image_attributes[0]; ?>); background-size: cover; background-position: center center">
        <div class="carousel-caption text-center">
          <div class="container">
            <h3><?php the_title(); ?></h3>
            <div class="carousel-text"><?php the_excerpt(); ?></div>
            <div class="trattino"></div>
            <a href="<?php the_permalink(); ?>" class="btn btn-outline-light btn-lg"><?php esc_html_e( 'Leggi tutto', 'll' ) ?></a>
          </div>
        </div>
      </div>


<?php

endwhile;

// Ripristina Query & Post Data originali
wp_reset_query();
wp_reset_postdata();

  ?>


    </div>
    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</section>

