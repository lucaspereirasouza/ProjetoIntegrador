<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astralis Lite
 */

get_header(); ?>

<div class="container">
    <div id="Tab-Naviagtion">
        <div class="left-content-wrap">
			<?php if ( have_posts() ) : ?>
                <header class="page-header">
                <?php
                the_archive_title( '<h1 class="entry-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?> 
                </header><!-- .page-header -->
              
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content' ); ?>
                 <?php endwhile; ?>                   
            
            <?php the_posts_pagination(); ?>
            <?php else : ?>
            <?php get_template_part( 'no-results' ); ?>
            <?php endif; ?>
        </div><!-- left-content-wrap-->   
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->
	
<?php get_footer(); ?>