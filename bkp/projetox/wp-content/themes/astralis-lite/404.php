<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Astralis Lite
 */

get_header(); ?>

<div class="container">
    <div id="Tab-Naviagtion">
        <div class="left-content-wrap">
           <div class="post-list-style-2">
            <div class="blogin-bx"> 
             <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'astralis-lite' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn....Dont worry... it happens to the best of us.', 'astralis-lite' ); ?></p>  
            </div><!-- .page-content -->
           </div><!--.blogin-bx-->
          </div><!--.post-list-style-2-->      
       </div><!-- left-content-wrap-->   
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>