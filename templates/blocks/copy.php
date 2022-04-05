<?php 
$className = 'legal';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<section class="<?php echo esc_attr($className); ?>">
  <div class="container"><?php the_field('copy'); ?></div>
</section>
