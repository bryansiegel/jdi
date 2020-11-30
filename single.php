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
					<h2>
						<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?> <?php echo the_permalink(); ?>"
							title="Share on Twitter"><i class="icofont-twitter"></i></a>
						<a href="https://www.facebook.com/sharer.php?s=100&p[url]=<?php echo the_permalink(); ?>&p[title]=<?php echo the_title(); ?>"
							title="Share on Facebook"><i class="icofont-facebook"></i></a>
						<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo the_permalink(); ?>&amp;title=<?php echo the_title(); ?>"
							title="Share on Linkedin"><i class="icofont-linkedin"></i></a>
					</h2>
					<ol>
						<li><a href="<?php echo get_home_url(); ?>">Home</a></li>
						<li><a href="<?php echo get_home_url(); ?>/blog/">Blog</a></li>
					</ol>
				</div>

			</div>
		</section><!-- End Breadcrumbs -->

		<!-- ======= Blog Section ======= -->
		<section id="blog" class="blog">
			<div class="container">

				<div class="row">

					<div class="col-lg-8 entries">

						<article class="entry entry-single">

							<div class="entry-img">
								<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="img-fluid">
									<?php the_post_thumbnail('large'); // Fullsize image for the single post ?>
								</a>
								<?php endif; ?>
							</div>

							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
							</h2>
							<!-- 
							<div class="entry-meta">
								<ul>
									<li class="d-flex align-items-center"><i class="icofont-user"></i> <a
											href="blog-single.php"><?php //the_author(); ?></a></li>
									<li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
											href="blog-single.php"><time
												datetime="2020-01-01"><?php //the_date(); ?></time></a>
									</li>
									<li class="d-flex align-items-center"><i class="icofont-comment"></i> <a
											href="blog-single.php">12 Comments</a></li>
								</ul>
							</div> -->

							<div class="entry-content">
								<?php the_content(); ?>

							</div>

							<div class="entry-footer clearfix">
								<!-- <div class="float-left">
									<i class="icofont-folder"></i>
									<ul class="cats">
										<li><?php //the_category(); ?></li>
									</ul>

									<i class="icofont-tags"></i>
									<ul class="tags">
										<li><?php //the_tags(); ?></li>
									</ul>
								</div> -->

								<div class="float-right share">
									<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?> <?php echo the_permalink(); ?>"
										title="Share on Twitter"><i class="icofont-twitter"></i></a>
									<a href="https://www.facebook.com/sharer.php?s=100&p[url]=<?php echo the_permalink(); ?>&p[title]=<?php echo the_title(); ?>"
										title="Share on Facebook"><i class="icofont-facebook"></i></a>
									<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo the_permalink(); ?>&amp;title=<?php echo the_title(); ?>"
										title="Share on Linkedin"><i class="icofont-linkedin"></i></a>

									<!-- <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a> -->
								</div>

							</div>

						</article><!-- End blog entry -->


					</div><!-- End blog entries list -->

					<div class="col-lg-4">

						<div class="sidebar">

							<h3 class="sidebar-title">Search</h3>
							<div class="sidebar-item search-form">
								<?php //get_search_form(); ?>

								<form action="<?php echo get_home_url(); ?>">
									<input type="text" name="s">
									<button type="submit"><i class="icofont-search"></i></button>
								</form>

							</div>
							<!-- End sidebar search formn-->

							<!-- <h3 class="sidebar-title">Categories</h3>
							<div class="sidebar-item categories">
								<ul>
									<?php 
									//$categories = get_categories();
									//foreach($categories as $category) {
									//echo '<li></li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>
									//</li>';
									//}
									
									?>
								</ul>

							</div> -->
							<!-- End sidebar categories-->

							<h3 class="sidebar-title">Recent Posts</h3>
							<div class="sidebar-item recent-posts">
								<?php
									$recent_posts = wp_get_recent_posts(array(
										'numberposts' => 4,
										'post_status' => 'publish'
									));
									foreach($recent_posts as $post) : ?>
								<div class="post-item clearfix">

									<h4><a href="<?php echo get_permalink($post['ID']) ?>">
											<?php echo $post['post_title'] ?>
										</a></h4>
									<time
										datetime="<?php echo $post['post_date'] ?>"><?php echo $post['post_date']; ?></time>

								</div>
								<?php endforeach; wp_reset_query(); ?>
								</ul>
							</div><!-- End sidebar recent posts-->

							<h3 class="sidebar-title">Tags</h3>
							<div class="sidebar-item tags">
								<ul>

									<?php 
									$tags = get_tags(array(
									'hide_empty' => false
									));
									
									foreach ($tags as $tag) {
										// var_dump($tag);
									echo '<li><a href="' .get_home_url(). '/tag/' .$tag->slug.'">' . $tag->name . '</a></li>';
									}
									
									?>
								</ul>

							</div><!-- End sidebar tags-->

						</div><!-- End sidebar -->

					</div><!-- End blog sidebar -->

				</div>

			</div>
		</section><!-- End Blog Section -->

	</main><!-- End #main -->



	<?php echo get_template_part('partials/footer') ?>

</body>

</html>