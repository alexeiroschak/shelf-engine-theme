<?php 
$className = 'features';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<section class="<?php echo esc_attr($className); ?>" id="how-it-works">
  <div class="features__inner container">
    <div class="features__text-wrap"><?php the_field('copy'); ?></div>
    <ul class="features__list">
      <?php if( have_rows('features') ):
        while ( have_rows('features') ) : the_row();
        $icon = get_sub_field('icon');
        ?>
          <li class="features__item js-visibility reveal-fade">
            <?php if($icon) {
              echo '<img src="'.$icon['url'].'" alt="'.$icon['alt'].'">';
            } ?>
            <h3><?php the_sub_field('title'); ?></h3>
            <?php the_sub_field('copy'); ?>
          </li>
        <?php
        endwhile;
      endif; ?>
    </ul>
  </div>
  <div class="js-visibility reveal-fade">
    <div class="features__dotted-1 dotted-circle">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
    <div class="features__dotted-2 dotted-circle">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
    <div class="features__dotted-3 dotted-circle dotted-circle--reverse">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
  </div>
</section>
