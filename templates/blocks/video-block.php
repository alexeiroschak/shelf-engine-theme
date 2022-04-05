<?php 
$className = 'video-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<section class="<?php echo esc_attr($className); ?>">
  <div class="js-visibility reveal-fade">
    <div class="dotted-circle video-block__dotted-1">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
    <div class="dotted-circle video-block__dotted-2">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
  </div>
  <div class="video-block__double js-visibility reveal-fade">
    <div class="dotted-circle video-block__double-1">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
    <div class="dotted-circle dotted-circle--reverse video-block__double-2">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
  </div>
  <div class="video-block__inner container">
    <div class="video-block__text-wrap js-visibility reveal-fade"><?php the_field('copy'); ?></div>

    <?php
    $vimeo = get_field('vimeo_id');
    if($vimeo) { ?>
      <div class="video-block__video-wrap js-visibility reveal-fade reveal-del-1">
        <a href="https://www.shelfengine.com/case-study-national-grocer/">
        <!-- <img src="https://www.shelfengine.com/wp-content/uploads/2020/10/gated-hero-1.png" srcset="https://www.shelfengine.com/wp-content/uploads/2020/10/gated-hero-1.png 768w, https://www.shelfengine.com/wp-content/uploads/2020/10/gated-hero-1.png 1186w" sizes="(max-width: 767px) 450px," alt="" loading="lazy"> -->
          <div class="embed-container">
            <iframe data-src="https://player.vimeo.com/video/<?php echo $vimeo; ?>" src="" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
          </div>
        </a>
      </div>
    <?php } ?>

    <?php if( have_rows('logos') ):
      echo '<ul class="logos">';
        while ( have_rows('logos') ) : the_row();
        $logo = get_sub_field('logo');
        ?>
          <li class="logos__item js-visibility reveal-fade">
            <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" loading="lazy">
          </li>
        <?php
        endwhile;
      echo '</ul>';
    endif; ?>



  </div>
</section>
