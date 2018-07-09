<!-- Ultimi 3 post -->
<section class="container">
  <h2>Ultimi articoli</h2>
  <div class="card-deck my-5">

<?php

$ll_args = array(
  'post_type' => 'post',
  'posts_per_page' => 3
);

$ll_the_query = new WP_Query( $ll_args );


while ( $ll_the_query->have_posts() ) :
  $ll_the_query->the_post();

  $ll_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'll_single');
?>
      <div class="card card-news">

        <div class="card-body">

          <p class="card-meta"><?php the_time('l, j M Y'); ?> | <?php the_category(', '); if ( has_tag() ) { echo" - "; the_tags(', '); } ?></p>

          <a href="<?php the_permalink(); ?>">
          <h3 class="card-title"><?php the_title(); ?></h3>
          <?php the_post_thumbnail('', array('class' => 'img-fluid mb-4', 'alt' => get_the_title() )); ?>
        </a>

          <div class="card-text"><?php the_excerpt(); ?></div>

          <p class="card-info">autore: <?php the_author(); ?></p>

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