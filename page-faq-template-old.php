<?php

/**
 * The template for displaying all pages.
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zerif
 */



get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->



	<div id="content" class="site-content">

<div class="container">



<div class="content-left-wrap col-md-9">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">
		<?php 
		/*======================================================================
		=            Custom WP_Query to bring in FAQ catagory posts            =
		======================================================================*/

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		echo $paged;

		$args = array(
			'posts_per_page' => 3,
			'order' => 'ASC',
			'category_name' => 'faq',
			'nopaging' => false,
			'paged' => $paged
		);

		$query = new WP_Query( $args );
		// $query = new WP_Query( 'category_name=faq' );

		/*-----  End of Custom WP_Query to bring in FAQ catagory posts  ------*/

		?>

		<?php if ( $query->have_posts() ) : ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<h1><?php the_title(); ?></h1>
				<p>
					<?php the_content(''); ?>
				</p>


			<?php endwhile; // end of the loop. ?>

			<div class="text-center">
				<?php 
					bootstrap_pagination(); 
				?>
			</div>

		<?php endif; ?>
		<!-- Restoring original Post Data -->
		<?php wp_reset_postdata(); ?>
		

		</main><!-- #main -->

<h1>Currently Browsing Page <?php echo $paged; ?></h1>
		

	</div><!-- #primary -->

</div><!-- .content-left-wrap -->



<div class="sidebar-wrap col-md-3 content-left-wrap">

	<?php get_sidebar(); ?>

</div><!-- .sidebar-wrap -->



</div><!-- .container -->

<?php get_footer(); ?>