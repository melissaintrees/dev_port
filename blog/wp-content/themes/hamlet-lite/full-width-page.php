<?php
/**
 * Template Name: Full-Width Page
 *
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area container">
        <main id="main" class="site-main full-width" role="main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
        
    </div><!-- #primary -->

<?php
get_footer();
