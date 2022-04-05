<?php 
$className = 'chart';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<section class="<?php echo esc_attr($className); ?>">
  <div class="js-visibility reveal-fade">
    <div class="dotted-circle chart__dotted-1">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
    <div class="dotted-circle dotted-circle--reverse chart__dotted-2">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
    <div class="dotted-circle chart__dotted-3">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>
  </div>
  <div class="chart__inner container">
    <div class="chart__text-wrap js-visibility reveal-fade"><?php the_field('copy'); ?></div>
    <div class="chart__bars js-visibility">
      <video muted playsinline class="reveal-fade">
        <?php
        if(get_field('chart_webm')) {
          echo '<source src="'. get_field('chart_webm') .'" type="video/webm" />';
        }
        if(get_field('chart')) {
          echo '<source src="' . get_field('chart') .'" type="video/mp4">';
        }
        ?>
      </video>
      <div class="chart__caption reveal-fade reveal-del-1">
        <span>Before Shelf Engine</span>
        <span>With Shelf Engine</span>
      </div>
    </div>
  </div>
</section>
