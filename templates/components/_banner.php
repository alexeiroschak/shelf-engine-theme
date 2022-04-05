<?php
$img = get_field('pre_footer_image', 'options');
$img_med = $img['sizes']['medium'];
$srcset = wp_get_attachment_image_srcset( $img['ID'], 'medium' );
if(!$srcset) $srcset = $img_med;
?>
<section class="banner">
  <div class="banner__inner container">
    <div class="banner__copy-wrap js-visibility reveal-fade">
      <h2><?php the_field('pre_footer_title', 'options') ?></h2>
      <?php the_field('pre_footer_copy', 'options') ?>
      <a id="typeform-shelf" class="typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" style="" target="_blank"> See Your Profit Growth</a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>
      <!-- <button class="btn js-popup"><?php the_field('pre_footer_btn', 'options') ?></button> -->
    </div>
    <div class="banner__img-wrap js-visibility reveal-fade reveal-del-1">
      <img src="<?php echo $img_med ?>" srcset="<?php echo $srcset; ?>" sizes="(max-width: 767px) 450px," alt="<?php echo $img['alt'] ?>" loading="lazy">
      <div class="dotted-circle">
        <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
      </div>
    </div>
  </div>
</section>
