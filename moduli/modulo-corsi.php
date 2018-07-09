<?php
      if (get_post_meta( $post->ID, '_ll_corsi', true )) {
?>
      <div class="ll_corsi">
         <h2>Corsi, letture per lo studio</h2>
<?php
         the_field(_ll_corsi);
?>
      </div>
<?php
      }
?>