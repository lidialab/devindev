<?php
      if (get_post_meta( $post->ID, '_ll_rfc', true )) {
?>
      <div class="rfc">
         <h2>RFC</h2>
<?php
         the_field(_ll_rfc);
?>
      </div>
<?php
      }
?>