<footer>
  <div class="container">
    <?php
      if ( is_active_sidebar('online-video-games-footer-sidebar')) {
        echo '<div class="row sidebar-area footer-area">';
          dynamic_sidebar('online-video-games-footer-sidebar');
        echo '</div>';
      }
    ?>
  </div>
  <div class="copyright">
    <div class="container">
      <div class="copy-text">
        <p class="mb-0 py-3">
          <?php
                if (!get_theme_mod('online_video_games_footer_text') ) { ?>
                  <a href="<?php echo esc_url('https://www.misbahwp.com/themes/free-games-wordpress-theme/'); ?>" target="_blank">
                  <?php esc_html_e('Online Game WordPress Theme ','online-video-games'); ?></a>
                <?php } else {
                  echo esc_html(get_theme_mod('online_video_games_footer_text'));
                }
              ?>
          <?php if ( get_theme_mod('online_video_games_copyright_enable', true) == true ) : ?>
            <?php
            /* translators: %s: Misbah WP */
            printf( esc_html__( ' by %s', 'online-video-games' ), 'Misbah WP' ); ?>
            <a href="<?php echo esc_url(__('https://wordpress.org','online-video-games')); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'online-video-games' ), 'WordPress' ); ?></a>
          <?php endif; ?>
        </p>
        <?php if ( get_theme_mod('online_video_games_scroll_enable_setting', true) == true ) : ?>
          <div class="scroll-up">
            <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
          </div>
        <?php endif; ?>
      </div>
  </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
