<?php
/**
* Template Name: Blog
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
    <?php echo get_template_part('partials/head') ?>
    <?php wp_head() ?>
</head>

<body>
    <?php echo get_template_part('partials/nav') ?>


    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Blog</h2>
                    <ol>
                        <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">

                <div class="row">


                    <!-- posts -->

                    <?php
                                // the query
                                $the_query = new WP_Query(array(
                                    // 'category_name' => 'Solar Blog',
                                    'posts_per_page' => 100,
                                ));
                                ?>

                    <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                    <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">

                        <article class="entry">

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
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
    <?php echo get_template_part('partials/footer') ?>


</body>

</html>