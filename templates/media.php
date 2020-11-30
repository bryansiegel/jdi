<?php
/**
* Template Name: Media
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
    <style>
        img {
            max-width: 100%;
        }

        .gallery_box li {
            width: 33.333333%;
            max-width: 100%;
            display: inline-block;
            float: left;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .gallery_box {
            padding: 0;
            display: flow-root;
        }

        .gallery_box li:hover img {
            -moz-transform: scale(1.1);
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            -o-transform: scale(1.1);
            transform: scale(1.1);
        }

        .gallery_box li img {
            -webkit-transition: transform 0.5s ease;
            -o-transition: transform 0.5s ease;
            transition: transform 0.5s ease;
        }

        .gallery_box li:nth-child(even) {
            height: 304px;
        }

        .gallery_box li:nth-child(odd) {
            height: 438px;
        }

        .gallery_box li:nth-child(odd) .box_data {
            background: rgba(0, 0, 0, 0.17)
        }

        .gallery_box li:nth-child(even) .box_data {
            background: rgba(0, 44, 255, 0.27)
        }

        .gallery_box .box_data {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            color: #fff;
        }

        .gallery_box .box_data span {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            right: 0;
            font-size: 24px;
        }

        .gallery_box li:hover .box_data {
            background: rgba(255, 0, 39, 0.55)
        }
    </style>
</head>

<body>
    <?php echo get_template_part('partials/nav') ?>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Media & Press</h2>
                    <ol>
                        <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
                        <li>Media & Press</li>
                    </ol>
                </div>

            </div>
        </section>


        <!-- Press Release -->
        <section id="blog" class="blog" style="background-color:black;">
            <div class="container">
                <h2 style="color:white;">Press Releases</h2>
                <br>
                <div class="row">
                                        <!-- posts -->

                    <?php
                                // the query
                                $the_query = new WP_Query(array(
                                    'category_name' => 'Press Releases',
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
                            <div class="entry-content">
                                <p>
                                    <?php the_excerpt();
                                    ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?php echo the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
                        </article>
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

                </div>
        </section>


        <section id="blog" class="blog" style="background-color:#F3685A;">
            <div class="container">
                <h2 style="color:white;">Company Announcements</h2>
                <br>
                <div class="row">
                                                           <!-- posts -->

                    <?php
                                // the query
                                $the_query = new WP_Query(array(
                                    'category_name' => 'Press Releases',
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
                            <div class="entry-content">
                                <p>
                                    <?php the_excerpt();
                                    ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?php echo the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
                        </article>
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

                </div>
        </section>


    </main><!-- End #main -->
    <?php echo get_template_part('partials/footer') ?>

</body>

</html>