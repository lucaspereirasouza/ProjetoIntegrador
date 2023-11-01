<?php if ( get_theme_mod('online_video_games_blog_box_enable') ) : ?>

<?php $online_video_games_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('online_video_games_blog_slide_category'),
  'posts_per_page' => get_theme_mod('online_video_games_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $online_video_games_arr_posts = new WP_Query( $online_video_games_args );
    if ( $online_video_games_arr_posts->have_posts() ) :
      while ( $online_video_games_arr_posts->have_posts() ) :
        $online_video_games_arr_posts->the_post();
        ?>
        <div class="blog_inner_box">
          <?php
            if ( has_post_thumbnail() ) :
              the_post_thumbnail();
            else:
              ?>
              <div class="slider-alternate">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
              </div>
              <?php
            endif;
          ?>
          <div class="blog_box pt-3 pt-md-0">
            <?php if ( get_theme_mod('online_video_games_slider_short_title') ) : ?>
              <h6><?php echo esc_html( get_theme_mod('online_video_games_slider_short_title' ) ); ?></h6>
            <?php endif; ?>
            <?php if ( get_theme_mod('online_video_games_title_unable_disable',true) ) : ?>
              <h3 class="my-3"><?php the_title(); ?></h3>
            <?php endif; ?>
            <?php if ( get_theme_mod('online_video_games_button_unable_disable',true) ) : ?>
              <p class="slider-button mt-4">
                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('KNOW MORE','online-video-games'); ?></a>
              </p>
            <?php endif; ?>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>