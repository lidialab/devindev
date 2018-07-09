<?php get_header(); ?>

<div class="main-content">

<?php

  include 'moduli-frontpage/modulo-slider.php';

?>

<section class="container intro-home-sito">
   <h1>Dev in Dev, riga dopo riga</h1>
   <p>Questo è un sito di appunti personali</p>
</section>

<?php

  include 'moduli/modulo-spazio-tra-sezioni-con-trattino.php';
  include 'moduli-frontpage/modulo-focus.php';
  include 'moduli/modulo-spazio-tra-sezioni-con-trattino.php';
  include 'moduli-frontpage/modulo-testimonial.php';
  include 'moduli/modulo-spazio-tra-sezioni-con-trattino.php';
  include 'moduli-frontpage/modulo-ultimi-post.php';

?>

</div>
<?php get_footer(); ?>