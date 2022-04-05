<?php 
$className = 'process';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<section class="<?php echo esc_attr($className); ?>">
  <div class="process__inner container">
    <h2 class="js-visibility reveal-fade"><?php the_field('title'); ?></h2>
    <ul class="process__list">
      <?php if( have_rows('process') ):
        while ( have_rows('process') ) : the_row();
        $icon = get_sub_field('icon');
        ?>
          <li class="process__item js-visibility">
            <div class="process__icon">
              <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>">
            </div>
            <?php
            echo '<h3>'. get_sub_field('title') .'</h3>';
            echo '<p>'. get_sub_field('copy') .'</p>';
            ?>
          </li>
        <?php
        endwhile;
      endif; ?>
    </ul>
  </div>
</section>
