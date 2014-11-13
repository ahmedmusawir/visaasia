<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package zerif
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<!-- <h1 class="well">this is content-malaysia</h1> -->
		<img src="http://lorempixel.com/850/200/nature">

	</header><!-- .entry-header -->



	<div class="entry-content">
		<!-- <h1>this is content-let-us-know</h1> -->

		<?php the_content(); ?>

		<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

		<?php

		/*====================================================================================
		=            Custom WP_Query Loop to collect malaysia category posts list            =
		====================================================================================*/


		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		// echo $paged;

		$args = array(
			'posts_per_page' => 5,
			'order' => 'ASC',
			'category_name' => 'malaysia',
			'nopaging' => false,
			'paged' => $paged
		);

		$query = new WP_Query( $args );
		// $query = new WP_Query( 'category_name=faq' );


		if ( $query->have_posts() ) : ?>



			<?php /* Start the Loop */ ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>



				<?php

					/* Include the Post-Format-specific template for the content.

					 * If you want to override this in a child theme, then include a file

					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.

					 */

					get_template_part( 'content', get_post_format() );

				?>

			<?php endwhile; ?>

			<?php wp_reset_query(); ?>

		<?php else : ?>



			<?php get_template_part( 'content', 'none' ); ?>



		<?php endif; ?>



		</main><!-- #main -->

	</div><!-- #primary -->
			
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'zerif-lite' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>

</article><!-- #post-## -->

