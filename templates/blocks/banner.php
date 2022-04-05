
<?php 
$className = 'banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$img = get_field('image');
$img_med = $img['sizes']['medium'];
$srcset = wp_get_attachment_image_srcset( $img['ID'], 'medium' );
if(!$srcset) $srcset = $img_med;
?>
<section class="<?php echo esc_attr($className); ?>">
  <div class="banner__inner container">
    <div class="banner__copy-wrap js-visibility reveal-fade">
      <h2><?php the_field('title') ?></h2>
      <p><?php the_field('copy') ?></p>
      <?php if ($link = get_field('link')) : ?>
        <a class="btn" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
      <?php endif; ?>
    </div>
    <div class="banner__img-wrap js-visibility reveal-fade reveal-del-1">
      <img src="<?php echo $img_med ?>" srcset="<?php echo $srcset; ?>" sizes="(max-width: 767px) 450px," alt="<?php echo $img['alt'] ?>" loading="lazy">
      <div class="dotted-circle">
        <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
      </div>
    </div>
  </div>
</section>
