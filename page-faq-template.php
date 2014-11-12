<?php

/**
 * The main template file.
 * Template Name: FAQ Template
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package zerif
 */



get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->



	<div id="content" class="site-content">

<div class="container">

<h2>New FAQ Template</h2>

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

				<div class="nav-previous alignleft"><?php //next_posts_link( 'Older posts' ); ?></div> 
				<div class="nav-next alignright"><?php //previous_posts_link( 'Newer posts' ); ?></div> 



			<?php endwhile; ?>

			<nav>
			    <ul>
			        <li><?php previous_posts_link( '&laquo; PREV', $query->max_num_pages) ?></li> 
			        <li><?php next_posts_link( 'NEXT &raquo;', $query->max_num_pages) ?></li>
			    </ul>
			</nav>

			<div class="text-center">
				<?php 
					bootstrap_pagination( $query->max_num_pages ); 
				?>
			</div>

				

			<?php zerif_paging_nav(); ?>

			<?php wp_reset_query(); ?>



		<?php else : ?>



			<?php get_template_part( 'content', 'none' ); ?>



		<?php endif; ?>



		</main><!-- #main -->

	</div><!-- #primary -->



</div><!-- .content-left-wrap -->



<div class="sidebar-wrap col-md-3 content-left-wrap">

	<?php get_sidebar(); ?>

</div><!-- .sidebar-wrap -->



</div><!-- .container -->



<?php get_footer(); ?>