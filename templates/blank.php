
<?php
/**
* Template Name: Blank
*
*
* @package WordPress

* @since 1.0.0
*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title><?php echo wp_title(); ?></title>
    <?php echo get_template_part('partials/head'); ?>
    <?php wp_head(); ?>
</head>

<body>

  <!-- ======= Header ======= -->
    <?php echo get_template_part('partials/nav') ?>
  <!-- End Header -->

  <main id="main">

  
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        
<?php the_content(); ?>
        

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
    <?php echo get_template_part('partials/footer') ?>
  

</body>

</html>