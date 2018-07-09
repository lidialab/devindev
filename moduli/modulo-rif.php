<?php
      if (get_post_meta( $post->ID, '_ll_riferimenti', true )) {
?>
      <div class="ll_riferimenti">
         <h2>Riferimenti</h2>
<?php
         the_field(_ll_riferimenti);
?>
      </div>
<?php
      }
?>