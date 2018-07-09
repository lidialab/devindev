<footer id='footer' class="footer">
	<div class="container py-4">
		<p><?php esc_html_e('LidiaLAB - ', 'll'); echo date('o');
               esc_html_e(' - Realizzato grazie a ', 'll');
               echo ( '<a href="https://wordpress.org" class="link-footer" target="_blank">WordPress</a>' );
               esc_html_e(', diverse fonti di ', 'll');
               echo ( '<a href="https://devindev.lidialab.it/riconoscimenti/" class="link-footer">ispirazione</a>' );
               echo ( ' e un po\' di personale <strong>presti-digitazione</strong> :) ' ); ?> </p>
	</div>

   <div>
      <?php
         wp_nav_menu([
         'menu'            => 'footer',
         'menu_class'      => '',
         'menu_id'         => 'll-footer-menu',
         'container_class' => '',
         'container'       => 'div',
         'container_id'    => 'll-footer-menu-section',
         'fallback_cb'     => false,
         'depth'           => 1,
         'theme_location'  => 'footer'
         ]);
      ?>
   </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>