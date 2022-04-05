<?php 
$className = 'hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<div class="<?php echo esc_attr($className); ?>">
  <div class="hero__carousel">

  <?php if( have_rows('slides') ):
    while ( have_rows('slides') ) : the_row();
      $img = get_sub_field('image');
     ?>
        <section class="image-text image-text--<?php the_sub_field('type'); ?>" data-index="<?php echo get_row_index(); ?>">
          <div class="image-text__dotted dotted-circle">
            <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
          </div>
          <div class="image-text__inner container">
            <div class="image-text__text-wrap">
              <div class="image-text__circle-white bg-circle bg-circle--white"></div>
              <h2><?php the_sub_field('title'); ?></h2>
              <p><?php the_sub_field('copy'); ?></p>
              <a class="btn js-show-demo" href="#"><?php the_sub_field('cta_text'); ?></a>

              <!-- <a id="typeform-shelf" class="typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" style="" target="_blank"> See Your Profit Growth</a> -->
              <!-- <button class="btn js-popup">See Your Profit Growth</button> -->
            </div>
            <?php _get_template_part('templates/components/_resp-img', [
              'field' => get_sub_field('image'),
              'class' => 'image-text__img',
              'sizes' => '(max-width: 1023px) 100vw, calc(100vw - 300px)'
            ]); ?>
          </div>
        </section>
    <?php endwhile;
  endif; ?>
  </div>
	<!-- <a id="typeform-shelf" class="hero__btn typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" style="text-align: center" target="_blank"> See Your Profit Growth</a> -->
  <!--<button class="hero__btn btn js-popup">See Your Profit Growth</button>-->
  <?php if( have_rows('slides') ): ?>
  <div class="hero__dots">
    <?php while ( have_rows('slides') ) : the_row(); ?>
    <div class="dot" data-index="<?php echo get_row_index(); ?>"></div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
</div>

<!-- <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script> -->