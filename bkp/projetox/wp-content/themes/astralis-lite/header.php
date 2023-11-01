<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Astralis Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#Tab-Naviagtion">
<?php esc_html_e('Skip to content', 'astralis-lite' ); ?>
</a>
<?php
$astralis_lite_infodetail_sec_show 	   			= esc_attr( get_theme_mod('astralis_lite_infodetail_sec_show', false) ); 
$astralis_lite_frontslider_settings_show 	  	= esc_attr( get_theme_mod('astralis_lite_frontslider_settings_show', false) );
$astralis_lite_fifthcolumn_settings_show        = esc_attr( get_theme_mod('astralis_lite_fifthcolumn_settings_show', false) );
$astralis_lite_bestgaming_settings_show      	= esc_attr( get_theme_mod('astralis_lite_bestgaming_settings_show', false) );
?>
<div id="main-site-wrapper" <?php if( get_theme_mod( 'astralis_lite_boxlayoutoption' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($astralis_lite_frontslider_settings_show)) {
	 	$innerpage_cls = '';
	}
	else {
		$innerpage_cls = 'innerpage_header';
	}
}
else {
$innerpage_cls = 'innerpage_header';
}
?>

<div id="masthead" class="site-header <?php echo esc_attr($innerpage_cls); ?> ">      
        <?php if( $astralis_lite_infodetail_sec_show != ''){ ?> 
          <div class="hdr-bluebar">
           <div class="container">  
           <div class="left">           
            <?php $astralis_lite_phonenumber = get_theme_mod('astralis_lite_phonenumber');
                if( !empty($astralis_lite_phonenumber) ){ ?>              
                <div class="hdr-infobx">
                    <i class="fas fa-phone fa-rotate-90"></i>
                    <?php echo esc_html($astralis_lite_phonenumber); ?>
                </div>       
            <?php } ?>            
                      
         </div>
         <div class="right">
          <?php $email = get_theme_mod('astralis_lite_emailid');
                if( !empty($email) ){ ?>                
                <div class="hdr-infobx">
                    <i class="far fa-envelope"></i>
                    <a href="<?php echo esc_url('mailto:'.sanitize_email($email)); ?>"><?php echo sanitize_email($email); ?></a>
                </div>            
            <?php } ?> 
             
             <div class="hdr-infobx">
                <div class="hdr-social-icons">                                                
					   <?php $astralis_lite_facebooklink = get_theme_mod('astralis_lite_facebooklink');
                        if( !empty($astralis_lite_facebooklink) ){ ?>
                        <a class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($astralis_lite_facebooklink); ?>"></a>
                       <?php } ?>
                    
                       <?php $astralis_lite_twitterlink = get_theme_mod('astralis_lite_twitterlink');
                        if( !empty($astralis_lite_twitterlink) ){ ?>
                        <a class="fab fa-twitter" target="_blank" href="<?php echo esc_url($astralis_lite_twitterlink); ?>"></a>
                       <?php } ?>
                
                      <?php $astralis_lite_linkedinlink = get_theme_mod('astralis_lite_linkedinlink');
                        if( !empty($astralis_lite_linkedinlink) ){ ?>
                        <a class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($astralis_lite_linkedinlink); ?>"></a>
                      <?php } ?> 
                      
                      <?php $astralis_lite_instagramlink = get_theme_mod('astralis_lite_instagramlink');
                        if( !empty($astralis_lite_instagramlink) ){ ?>
                        <a class="fab fa-instagram" target="_blank" href="<?php echo esc_url($astralis_lite_instagramlink); ?>"></a>
                      <?php } ?> 
                  </div><!--end .hdr-social-icons-->
                </div><!--end .hdr-infobx-->   
               </div> 
        	<div class="clear"></div> 
          </div><!-- .container -->  
      </div><!-- .hdr-bluebar -->      
   <?php } ?>   


    <div class="container"> 
      <div class="LogoNavBar">     
         <div class="logo <?php if( $astralis_lite_infodetail_sec_show == ''){ ?>hdrlogo<?php } ?>">
           <?php astralis_lite_the_custom_logo(); ?>
            <div class="site_branding">
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
         </div><!-- logo --> 
         
          <div class="MenuPart_Right"> 
             <div id="navigationpanel"> 
                 <nav id="main-navigation" class="site-navi" role="navigation" aria-label="Primary Menu">
                    <button type="button" class="menu-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                    	wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                    ) );
                    ?>
                </nav><!-- #main-navigation -->  
            </div><!-- #navigationpanel -->               
          </div><!-- .MenuPart_Right --> 
         <div class="clear"></div>
       </div><!-- .LogoNavBar -->    
    </div><!-- .container -->  
</div><!--.site-header --> 
 
<?php 
if ( is_front_page() && !is_home() ) {
if($astralis_lite_frontslider_settings_show != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('astralis_lite_slider_pagenumber'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('astralis_lite_slider_pagenumber'.$i,true));
	  }
	}
?> 
<div class="FrontSlider">              
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
     <h2><?php the_title(); ?></h2>
     <p><?php $excerpt = get_the_excerpt(); echo esc_html( astralis_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('astralis_lite_slidepage_excerptlength','10')))); ?></p>
		<?php
        $astralis_lite_slider_discoverbtn = get_theme_mod('astralis_lite_slider_discoverbtn');
        if( !empty($astralis_lite_slider_discoverbtn) ){ ?>
            <a class="slidermorebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($astralis_lite_slider_discoverbtn); ?></a>
        <?php } ?> 
        
        <?php
                $astralis_lite_browsegametext = get_theme_mod('astralis_lite_browsegametext');
                if( !empty($astralis_lite_browsegametext) ){ ?>        
                <?php $astralis_lite_browsegametextlink = get_theme_mod('astralis_lite_browsegametextlink');
                if( !empty($astralis_lite_browsegametextlink) ){ ?>                     
                        <a class="slidermorebtn browse" target="_blank" href="<?php echo esc_url($astralis_lite_browsegametextlink); ?>">
                        	<?php echo esc_html($astralis_lite_browsegametext); ?>            
                        </a>                     
             <?php }} ?> 
                        
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
</div><!-- .FrontSlider -->    
<?php } } ?> 

<?php if ( is_front_page() && ! is_home() ) { ?>  
 <?php if( $astralis_lite_fifthcolumn_settings_show != ''){ ?>  
   <section id="Section-1">
     <div class="container">      
         <div class="box-equal-height"> 
            <?php 
                for($n=1; $n<=5; $n++) {    
                if( get_theme_mod('astralis_lite_fifthbx_pgeno'.$n,false)) {      
                    $queryvar = new WP_Query('page_id='.absint(get_theme_mod('astralis_lite_fifthbx_pgeno'.$n,true)) );		
                    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
                     <div class="column-5bx <?php if($n % 5 == 0) { echo "last_column"; } ?>">  
                    	 <div class="equalbx-bg">
							  <?php if(has_post_thumbnail() ) { ?>
                                <div class="imgbox25">
                                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>                                
                                </div>        
                               <?php } ?>
                               <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                               <p><?php $excerpt = get_the_excerpt(); echo esc_html( astralis_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('astralis_lite_fifthbx_pgeno_excerpt_length','8')))); ?></p>
                        </div>
                      </div>
                    <?php endwhile;
                    wp_reset_postdata();                                  
                } } ?>                                 
                 <div class="clear"></div>  
               </div>
           </div><!-- .container -->
         </section><!-- #Section-1-->          
      <?php } ?>    
          
     <?php if( $astralis_lite_bestgaming_settings_show != ''){ ?>   
         <section id="Section-2">
           <div class="container"> 
           <?php 
                if( get_theme_mod('astralis_lite_intropagebx',false)) {      
                    $queryvar = new WP_Query('page_id='.absint(get_theme_mod('astralis_lite_intropagebx',true)) );		
                    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>  
                     			
                             <?php if(has_post_thumbnail() ) { ?>
                                   <div class="left-column-45">
                                      <div class="ImgFix">
                                         <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a> 
                                      </div>                               
                                    </div>        
                              <?php } ?>
                      
                               <div class="right-column-45">
									<?php
                                    $astralis_lite_bestgaming_settings_subtitle = get_theme_mod('astralis_lite_bestgaming_settings_subtitle');
                                    if( !empty($astralis_lite_bestgaming_settings_subtitle) ){ ?>
                                        <h4><?php echo esc_html($astralis_lite_bestgaming_settings_subtitle); ?></h4>
                                    <?php } ?>
                                   <h2><?php the_title(); ?></h2>
                                   <p><?php $excerpt = get_the_excerpt(); echo esc_html( astralis_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('astralis_lite_excerpt_length_intropagebx','100')))); ?></p>
                                    <?php
                                    $astralis_lite_intropagebx_readmoretext = get_theme_mod('astralis_lite_intropagebx_readmoretext');
                                    if( !empty($astralis_lite_intropagebx_readmoretext) ){ ?>
                                    <a class="ReadMoreBtn" href="<?php the_permalink(); ?>"><?php echo esc_html($astralis_lite_intropagebx_readmoretext); ?></a>
                                    <?php } ?>
                         	 </div>
                             
                           
                               
                    <?php endwhile;
                    wp_reset_postdata();                                  
                } ?> 
            <div class="clear"></div>    
     	 </div><!-- .container -->
      </section><!-- #Section-2-->  
    <?php } ?>    
<?php } ?>