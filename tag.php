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


		<!-- ======= Blog Section ======= -->
		<section id="blog" class="blog">
			<!-- <div class="container">

				<div class="row"> -->
			<h1 style="padding:50px;text-align:center;"><?php echo single_tag_title('', false); ?></h1>


			<!-- </div>


			</div>

			</div> -->
		</section><!-- End Blog Section -->

	</main><!-- End #main -->
	<?php echo get_template_part('partials/footer') ?>


</body>

</html>