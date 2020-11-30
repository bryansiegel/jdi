<?php
/**
* Template Name: Brands
*
*
* @package WordPress

* @since 1.0.0
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo wp_title(); ?></title>
    <?php echo get_template_part('partials/head') ?>
    <?php wp_head() ?>
    <style>
        .no-padding {
  padding-left: 0;
  padding-right: 0;
}

.product-header {
min-height:590px;
}

.sub-product-header {
    min-height:500px;
}
.sub-brands-header {
    min-height:400px;
}
.krazy_sprinkles_main_banner {
    min-height:300px;
}

  @media (max-width: 575.98px) {
.product-header {
    min-height:150px;
}

.sub-product-header {
    min-height:150px;
}
.sub-brands-header {
    min-height:150px;
}
.krazy_sprinkles_main_banner{
    min-height:300px;
}
}
</style>
</head>

<body>
    <?php echo get_template_part('partials/nav') ?>
    <main id="main">
        <!-- ======= Hero Section ======= -->
        <section id="hero">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">

                    <?php
                        //Get the images ids from the post_metadata
                        $images = acf_photo_gallery('brands-slides', $post->ID);
                        //Check if return array has anything in it
                        if( count($images) ):
                            //Cool, we got some data so now let's loop over it
                            foreach($images as $key => $image):
                                // var_dump($images);
                                $id = $image['id']; // The attachment id of the media
                                $title = $image['title']; //The title
                                $description = $image['description'];
                                $caption= $image['caption']; //The caption
                                $full_image_url= $image['full_image_url']; //Full size image url
                                // $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
                                $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                                $url= $image['url']; //Goto any link when clicked
                                $target= $image['target']; //Open normal or new tab
                                $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                                $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
                    ?>

                    <?php if($key == 0) :?>
                    <div class="carousel-item active" style="background-image: url(<?php echo $full_image_url; ?>);">
                        <?php else: ?>
                        <div class="carousel-item" style="background-image: url(<?php echo $full_image_url; ?>);">
                            <?php endif; ?>

                            <div class="carousel-container">
                                <div class="container">
                                    <h2 class="animate__animated animate__fadeInDown">
                                        <?php get_field('slideshow_title'); ?>
                                    </h2>
                                    <p class="animate__animated animate__fadeInUp">
                                        <?php echo $caption; ?>
                                    </p>
                                    <a href="<?php echo get_home_url(); ?>/contact/"
                                        class="btn-get-started animate__animated animate__fadeInUp scrollto">LEARN
                                        MORE</a>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; endif; ?>
                        <!-- end -->
                    </div>

                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        </section>
        <!-- End Hero -->

        <!-- ======= Brew Glitter ======= -->
        

<section class="product-header" style="background-image:url(<?php the_field('brew_glitter_main_banner'); ?>); background-size:cover;"></section>
<!-- <img src="<?php the_field('brew_glitter_main_banner'); ?>" class="img-fluid" /> -->

        <section id="about" class="about" style="background-color:black; color:white;">
            <div class="container">


<?php the_field('brew_glitter_description'); ?>

            </div>
        </section>

     <section class="sub-product-header" style="background-image:url(<?php the_field('brew_glitter_sub_banner'); ?>); background-size:cover;"></section>  

        <section id="blog" class="blog" style="background-color:black;">
            <div class="container content">
                <h1 style="color:white;text-align:center;">Products</h1>
                <h2 style="color:white;"><?php the_field('brew_glitter_product_title'); ?></h2>
                <br>
                <div class="row">

                    <!-- posts -->

                    <?php
                                // the query
                                $the_query = new WP_Query(array(
                                    'category_name' => 'Brew Glitter Products',
                                    'posts_per_page' => 3,
                                ));
                                ?>

                    <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                    <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">

                        <article class="entry" style="background-color: white;border-radius:10px;">

                            <div class="entry-img">
                                <img src="<?php echo $backgroundImg[0]; ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <!-- <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a
                                            href="blog-single.php">John Doe</a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                                            href="blog-single.php"><time datetime="2020-01-01">Jan 1,
                                                2020</time></a>
                                    </li>
                                </ul>
                            </div> -->

                            <div class="entry-content">
                                <p>
                                    <?php the_excerpt();
                                    ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?php echo the_permalink(); ?>">Read More</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div>



                    <?php //the_title();
                                        ?>
                    <?php //the_excerpt();
                                        ?>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php __('No News'); ?></p>
                    <?php endif; ?>
                    <!-- end posts -->



                </div>


            </div>

            <!-- <div class="blog-pagination" data-aos="fade-up">
                <ul class="justify-content-center">
                    <li class="disabled"><i class="icofont-rounded-left"></i></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                </ul>
            </div> -->

            </div>        </section>

        <!-- ======= Bakell ======= -->
<!--         <section class="bakell-brands">
        </section>
 -->

<section class="product-header" style="background-image:url(<?php the_field('bakell_main_banner'); ?>); background-size:cover;"></section>
<!-- <img src="<?php the_field('bakell_main_banner'); ?>" class="img-fluid"/> -->


        <section id="about" class="about" style="background-color:white; color:black;">
            <div class="container">
                <?php the_field('bakell_description'); ?>
                <!-- <div class="row content">
                    <div class="col-lg-6">
                        <img src="assets/img/brands/media1.jpg" />
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h2 style="color:#DA9F30;text-align:center;">Bakell® </h2>
                        <p> Our edible dusts & glitters are made with highest quality
                            ingredients on the market, use only FDA compliant ingredients,
                            are tasteless and dissolve!</p>

                        <p style="text-align:center;">
                            <a href="#" class="get-started-btn ml-auto">GET IN TOUCH</a>
                        </p>
                    </div>
                </div> -->

            </div>
        </section><!-- End Brew Bakell Section -->

<section class="sub-product-header" style="background-image:url(<?php the_field('bakell_sub_banner'); ?>); background-size:cover;"></section>

<!-- <img src="<?php the_field('bakell_sub_banner'); ?>" class="img-fluid" /> -->
 <!--        <section
            style="background-image:url('<?php echo get_bloginfo('template_directory'); ?>/assets/img/brands/shop-all-decorating-dusts_1350x.jpg');background-size:cover;position:relative;min-height:500px;">
        </section> -->

        <section id="blog" class="blog" style="background-color:white;">
            <div class="container content">
                <h1 style="text-align:center;">Products</h1>
                <!-- <h2 style="">NEW! Cocktail Glitter Pumps</h2> -->
                <br>
                <div class="row">


                    <!-- posts -->

                    <?php
                                // the query
                                $the_query = new WP_Query(array(
                                    'category_name' => 'Bakell Products',
                                    'posts_per_page' => 3,
                                ));
                                ?>

                    <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                    <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">

                        <article class="entry" style="background-color: white;border-radius:10px;">

                            <div class="entry-img">
                                <img src="<?php echo $backgroundImg[0]; ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <!-- <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a
                                            href="blog-single.php">John Doe</a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                                            href="blog-single.php"><time datetime="2020-01-01">Jan 1,
                                                2020</time></a>
                                    </li>
                                </ul>
                            </div> -->

                            <div class="entry-content">
                                <p>
                                    <?php the_excerpt();
                                    ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?php echo the_permalink(); ?>">Read More</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div>



                    <?php //the_title();
                                        ?>
                    <?php //the_excerpt();
                                        ?>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php __('No News'); ?></p>
                    <?php endif; ?>
                    <!-- end posts -->



                </div>


            </div>

            <!-- <div class="blog-pagination" data-aos="fade-up">
                <ul class="justify-content-center">
                    <li class="disabled"><i class="icofont-rounded-left"></i></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                </ul>
            </div> -->

            </div>
        </section>



        <!-- ======= BBQThingz ======= -->
<!-- <section> -->
<!-- <div class="container-fluid">
  <div class="row">
    <div class="col-12 px-0">
      <img class="img-fluid" src="<?php //the_field('bbqthingz_main_banner'); ?>">
    </div>
  </div>  --> 
</div>
<!-- </section> -->
         <section class="product-header" style="background:url(<?php the_field('bbqthingz_main_banner') ?>); background-size:cover;"></section>
        <!-- <img src="<?php the_field('bbqthingz_main_banner'); ?>" class="img-fluid"> -->
<!--         <section class="bbqthingz-brands">
        </section>
 -->
        <section id="about" class="about" style="background-color:black; color:white;">
            <div class="container">
                <?php the_field('bbqthingz_description'); ?>
                <!-- <div class="row content">
                    <div class="col-lg-6">
                        <img
                            src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/brands/bbqthingz-product.jpg" />
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h2 style="color:#DA9F30;text-align:center;">BBQThingz®</h2>
                        <p> At BBQthingz™, all of the products we sell are our OWN BRAND!
                            We don't have to contend with paying markups to the big
                            distributors and retailer's to sell their stuff! Instead, we
                            decided to carry our own line of BBQ tools, outdoor kitchen
                            accessories, rubs and BBQ sauces!</p>

                        <p style="text-align:center;">
                            <a href="#" class="get-started-btn ml-auto">GET IN TOUCH</a>
                        </p>
                    </div>
                </div> -->

            </div>
        </section><!-- End Brew Bakell Section -->

        <section id="blog" class="blog" style="background-color:black;color:white;">
            <div class="container content">
                <h1 style="text-align:center;color:white;">Products</h1>
                <!-- <h2 style="">NEW! Cocktail Glitter Pumps</h2> -->
                <br>
                <div class="row">

                    <!-- posts -->

                    <?php
                                // the query
                                $the_query = new WP_Query(array(
                                    'category_name' => 'BBqthingz Products',
                                    'posts_per_page' => 3,
                                ));
                                ?>

                    <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                    <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">

                        <article class="entry" style="background-color:white; border-radius:10px;">

                            <div class="entry-img">
                                <img src="<?php echo $backgroundImg[0]; ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <!-- <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a
                                            href="blog-single.php">John Doe</a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                                            href="blog-single.php"><time datetime="2020-01-01">Jan 1,
                                                2020</time></a>
                                    </li>
                                </ul>
                            </div> -->

                            <div class="entry-content">
                                <p>
                                    <?php the_excerpt();
                                    ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?php echo the_permalink(); ?>">Read More</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div>



                    <?php //the_title();
                                        ?>
                    <?php //the_excerpt();
                                        ?>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php __('No News'); ?></p>
                    <?php endif; ?>
                    <!-- end posts -->



                </div>


            </div>

            <!-- <div class="blog-pagination" data-aos="fade-up">
                <ul class="justify-content-center">
                    <li class="disabled"><i class="icofont-rounded-left"></i></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                </ul>
            </div> -->

            </div>
        </section>

        <!-- <section class="tinker-dust"></section> -->


<section class="sub-brands-header" style="background-image:url('<?php the_field('tinker_dust_main_banner'); ?>'); background-size:cover;"></section>

<!-- <div class="container">
  <div class="row">
          <img src="<?php the_field('tinker_dust_main_banner'); ?>" class="img-fluid w-100" />
      <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=1300%C3%97400&w=1300&h=400" alt="placeholder 960" class="img-responsive" />
  </div>
</div>
 -->      

        <section id="about" class="about" style="background-color:#F3685A; color:white;">
            <div class="container">
                <?php the_field('tinker_dust_description'); ?>

            </div>
        </section><!-- End Brew Bakell Section -->
        <section id="blog" class="blog" style="background-color:#F3685A;color:white;">
            <div class="container content">
                <h1 style="text-align:center;color:white;">Products</h1>
                <!-- <h2 style="">NEW! Cocktail Glitter Pumps</h2> -->
                <br>
                <div class="row">

  <!-- posts -->

                    <?php
                                // the query
                                $the_query = new WP_Query(array(
                                    'category_name' => 'Tinker Dust Products',
                                    'posts_per_page' => 3,
                                ));
                                ?>

                    <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                    <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">

                        <article class="entry" style="background-color:white; border-radius:10px;">

                            <div class="entry-img">
                                <img src="<?php echo $backgroundImg[0]; ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <!-- <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a
                                            href="blog-single.php">John Doe</a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                                            href="blog-single.php"><time datetime="2020-01-01">Jan 1,
                                                2020</time></a>
                                    </li>
                                </ul>
                            </div> -->

                            <div class="entry-content">
                                <p>
                                    <?php the_excerpt();
                                    ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?php echo the_permalink(); ?>">Read More</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div>



                    <?php //the_title();
                                        ?>
                    <?php //the_excerpt();
                                        ?>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php __('No News'); ?></p>
                    <?php endif; ?>
                    <!-- end posts -->



                </div>


            </div>

            <!-- <div class="blog-pagination" data-aos="fade-up">
                <ul class="justify-content-center">
                    <li class="disabled"><i class="icofont-rounded-left"></i></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                </ul>
            </div> -->

            </div>
        </section>

        <section class="krazy_sprinkles_main_banner" style="background-image:url(<?php the_field('krazy_sprinkles_main_banner'); ?>); background-size:cover;"></section>
        
        <section id="about" class="about" style="background-color:white; color:black;">
            <div class="container">
                <?php the_field('krazy_sprinkles_description') ?>
            </div>
        </section><!-- End Brew Bakell Section -->
        <section id="blog" class="blog" style="background-color:white;color:white;">
            <div class="container content">
                <h1 style="text-align:center;color:black;">Products</h1>
                <!-- <h2 style="">NEW! Cocktail Glitter Pumps</h2> -->
                <br>
                <div class="row">

          <!-- posts -->

                    <?php
                                // the query
                                $the_query = new WP_Query(array(
                                    'category_name' => 'Krazy Sprinkles Products',
                                    'posts_per_page' => 3,
                                ));
                                ?>

                    <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                    <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">

                        <article class="entry" style="background-color:white; border-radius:10px;">

                            <div class="entry-img">
                                <img src="<?php echo $backgroundImg[0]; ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <!-- <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a
                                            href="blog-single.php">John Doe</a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                                            href="blog-single.php"><time datetime="2020-01-01">Jan 1,
                                                2020</time></a>
                                    </li>
                                </ul>
                            </div> -->

                            <div class="entry-content">
                                <p>
                                    <?php the_excerpt();
                                    ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?php echo the_permalink(); ?>">Read More</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div>



                    <?php //the_title();
                                        ?>
                    <?php //the_excerpt();
                                        ?>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php __('No News'); ?></p>
                    <?php endif; ?>
                    <!-- end posts -->



                </div>


            </div>

            <!-- <div class="blog-pagination" data-aos="fade-up">
                <ul class="justify-content-center">
                    <li class="disabled"><i class="icofont-rounded-left"></i></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                </ul>
            </div> -->

            </div>
        </section>

    </main><!-- End #main -->

    <?php echo get_template_part('partials/footer') ?>


</body>

</html>