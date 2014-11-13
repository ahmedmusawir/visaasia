<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package zerif
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<!-- <h1 class="well"><?php //the_title(); ?></h1> -->

	</header><!-- .entry-header -->



	<div class="entry-content">
		<!-- <h1>this is content-let-us-know</h1> -->

		<?php the_content(); ?>

		<?php

			wp_link_pages( array(

				'before' => '<div class="page-links">' . __( 'Pages:', 'zerif-lite' ),

				'after'  => '</div>',

			) );

		?>

	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'zerif-lite' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>

</article><!-- #post-## -->
