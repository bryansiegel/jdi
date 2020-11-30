<?php
/**
* Template Name: Homepage
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

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">

                <?php
                    //Get the images ids from the post_metadata
                    $images = acf_photo_gallery('homepage-slides', $post->ID);
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
                                    <?php echo $title; ?>
                                </h2>
                                <p class="animate__animated animate__fadeInUp">
                                    <?php echo $caption; ?>
                                </p>
                                <a href="<?php echo get_home_url(); ?>/contact/" class="btn-get-started animate__animated animate__fadeInUp scrollto">LEARN
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

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about" style="background-color:#F3685A;color:white;">
            <div class="container">

                <?php the_content(); ?>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <?php echo get_template_part('partials/services') ?>
        <!-- End Services Section -->

        <?php echo get_template_part('partials/brands') ?>
    </main>
    <!-- End #main -->
    <?php echo get_template_part('partials/footer') ?>
</body>

</html>