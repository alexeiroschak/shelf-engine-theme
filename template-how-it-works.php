<?php /* Template Name: Template How It Works/ ?>


<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme-name
 */

$hero = get_field('hero');
$guaranteedSales = get_field('guaranteed_sales');
/* $pricing = get_field('pricing');*/
$forecasting = get_field('forecasting');
$process = get_field('process');
$vendors = get_field('vendors');
$reporting = get_field('reporting');
$banner = get_field('banner-hiw');

get_header(); ?>
<section class="v3-hero" id="how-it-works">
  <div class="v3-hero__inner container">
    <div class="v3-hero__text-wrap">
      <h1><?php echo $hero['hero_header']; ?></h1>
      <div class="v3-hero__auto-type">
        <span class="typing v3-hero__typing"></span>
      </div>
      <p><?php echo $hero['hero_copy']; ?></p>
      <a id="typeform-shelf" class="button btn btn--dark_bg" href="https://www.shelfengine.com/resources/progressive-grocer-retail-foodservice-faq/">Watch Our Progressive Grocer Q&A Session</a>
      <!--<a id="typeform-shelf" class="typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" onclick="myFunction()" style="" target="_blank"> See Your Profit Growth</a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>-->
      <!-- <button class="btn js-popup js-visibility reveal-fade"><?php echo $hero['hero_button_copy']; ?></button> -->
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

<section class="v3-how-it-works">
  <div class="v3-how-it-works__inner container">
    <div class="v3-how-it-works__text-wrap">
      <h2 class="js-visibility reveal-fade"><?php echo $guaranteedSales['title']; ?></h2>
      <p class="v3-how-it-works__guaranteed js-visibility reveal-fade reveal-del-1"><img class="js-visibility reveal-fade" src="<?php echo $guaranteedSales['icon']['sizes']['large'] ?>" alt=""><?php echo $guaranteedSales['header']; ?></p>
      <p class="js-visibility reveal-fade  reveal-del-2"><?php echo $guaranteedSales['copy']; ?></p>
    </div>
    <div class="v3-how-it-works__speech-bubbles-wrap">
      <img class="how-it-works-1 how-it-works-bubble" src="<?php echo $guaranteedSales['speech_bubbles']['speech_bubble_one']['sizes']['large'] ?>" alt="">
      <img class="how-it-works-2 how-it-works-bubble" src="<?php echo $guaranteedSales['speech_bubbles']['speech_bubble_two']['sizes']['large'] ?>" alt="">
      <img class="how-it-works-3 how-it-works-bubble" src="<?php echo $guaranteedSales['speech_bubbles']['speech_bubble_three']['sizes']['large'] ?>" alt="">
      <img class="how-it-works-4 how-it-works-bubble" src="<?php echo $guaranteedSales['speech_bubbles']['speech_bubble_four']['sizes']['large'] ?>" alt="">
      <img class="how-it-works-5 how-it-works-bubble" src="<?php echo $guaranteedSales['speech_bubbles']['speech_bubble_five']['sizes']['large'] ?>" alt="">
      <img class="how-it-works-6 how-it-works-bubble" src="<?php echo $guaranteedSales['speech_bubbles']['speech_bubble_six']['sizes']['large'] ?>" alt="">
      <img class="how-it-works-7 how-it-works-bubble" src="<?php echo $guaranteedSales['speech_bubbles']['speech_bubble_seven']['sizes']['large'] ?>" alt="">
    </div>
  </div>
</secion>

<!-- <section class="v3-pricing">
  <div class="v3-pricing__inner container">
    <div class="v3-pricing__text-wrap">
      <p class="v3-how-it-works__guaranteed js-visibility reveal-fade"><img class="js-visibility reveal-fade" src="<?php echo $pricing['icon']['sizes']['large'] ?>" alt=""><?php echo $pricing['header'] ?></p>
      <p class="js-visibility reveal-fade  reveal-del-1"><?php echo $pricing['first_paragraph'] ?></p>
      <p class="js-visibility reveal-fade  reveal-del-2"><?php echo $pricing['second_paragraph'] ?></p>
    </div>
    <div class="v3-pricing__table-wrap">
      <p>Example Pricing</p>
      <table class="">
        <tr>
          <th></th>
          <th><?php echo $pricing['table']['table_header_one'] ?></th>
          <th><?php echo $pricing['table']['table_header_two'] ?></th>
        </tr>
        <tr class="js-pricing-row">
          <td ><?php echo $pricing['table']['item_one_description'] ?></td>
          <td><?php echo $pricing['table']['item_one_suppliers_price'] ?></td>
          <td><?php echo $pricing['table']['item_one_shelfs_price'] ?></td>
        </tr>
        <tr class="js-pricing-row">
          <td ><?php echo $pricing['table']['item_two_description'] ?></td>
          <td><?php echo $pricing['table']['item_two_suppliers_price'] ?></td>
          <td><?php echo $pricing['table']['item_two_shelfs_price'] ?></td>
        </tr>
        <tr class="js-pricing-row">
          <td ><?php echo $pricing['table']['item_three_description'] ?></td>
          <td><?php echo $pricing['table']['item_three_suppliers_price'] ?></td>
          <td><?php echo $pricing['table']['item_three_shelfs_price'] ?></td>
        </tr>
        <tr class="js-pricing-row">
          <td ><?php echo $pricing['table']['item_four_description'] ?></td>
          <td><?php echo $pricing['table']['item_four_suppliers_price'] ?></td>
          <td><?php echo $pricing['table']['item_four_shelfs_price'] ?></td>
        </tr>
      </table>
      <img class="js-visibility js-pricing-sticker" src="<?php echo $pricing['table']['table_sticker']['sizes']['large'] ?>" alt="">
    </div>
  </div>
  <div class="v3-pricing__images">
    <picture>
      <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-1.png" media="(min-width: 760px)">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-1-small.png" alt="">
    </picture>
    <picture>
      <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-2.png" media="(min-width: 760px)">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-2.png" alt="">
    </picture>
    <picture>
      <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-3.png" media="(min-width: 760px)">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-3.png" alt="">
    </picture>
  </div>
</section> -->

<section class="v3-forecasting">
  <div class="v3-forecasting__inner container">
    <div class="v3-forecasting__text-wrap">
      <p class="v3-how-it-works__guaranteed js-visibility reveal-fade"><img class="js-visibility reveal-fade" src="<?php echo $forecasting['icon']['sizes']['large'] ?>" alt=""> <?php echo $forecasting['header'] ?></p>
      <p class="js-visibility reveal-fade  reveal-del-1"><?php echo $forecasting['paragraph_one'] ?></p>
      <p class="js-visibility reveal-fade  reveal-del-2"><?php echo $forecasting['paragraph_two'] ?></p>
    </div>
    <div class="v3-forecasting__graph-wrap">

      <img src="<?php echo $forecasting['graph_image']['sizes']['large'] ?>" />

    </div>
  </div>
</section>

<section class="v3-reporting">
  <div class="v3-reporting__circle-white"></div>
  <div class="v3-reporting__inner container">
    <div class="v3-reporting__text-wrap">
    <p class="v3-how-it-works__guaranteed js-visibility reveal-fade"><img class="js-visibility reveal-fade" src="<?php echo $reporting['icon']['sizes']['large'] ?>" alt=""><?php echo $reporting['header'] ?></p>
      <p class="js-visibility reveal-fade  reveal-del-1"><?php echo $reporting['copy'] ?></p>

    </div>
  </div>
  <div class="v3-reporting__image-wrap">
     <img id="js-reporting-tablet" src="<?php echo $reporting['image']['sizes']['large'] ?>" alt="">
  </div>
</section>


<section class="process">
  <div class="process__inner container">
    <h2 class="js-visibility reveal-fade"><?php echo $process['title']; ?></h2>
    <ul class="process__list">
      <?php foreach($process['process'] as $single_process) : 
        $icon = $single_process['icon']; ?>
          <li class="process__item js-visibility">
            <div class="process__icon">
              <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>">
            </div>
            <?php
            echo '<h3>'. $single_process['title'] .'</h3>';
            echo '<p>'. $single_process['copy'] .'</p>';
            ?>
          </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="v3-vendors">
  <div class="v3-vendors__inner container">
    <div class="v3-vendors__text-wrap">
      <h2 class="js-visibility reveal-fade">
        <?php echo $vendors['header'] ?>
      </h2>
      <p class="js-visibility reveal-fade  reveal-del-1"><?php echo $vendors['paragraph_one'] ?></p>
      <p class="js-visibility reveal-fade  reveal-del-2"><?php echo $vendors['paragraph_two'] ?></p>
    </div>
    <div class="v3-vendors__logo-wrap">


  <?php
      while ( have_rows( 'vendors' ) ) : the_row();
        while ( have_rows( 'brands' ) ) : the_row();
          while ( have_rows( 'brand_icons' ) ) : the_row();
          $image = get_sub_field('image');
          ?>
            <div class="v3-vendors__logo-logo">
            <img src="<?php echo $image['url']; ?>" alt="">
            </div>
            <?php
          endwhile;
        endwhile;
      endwhile;
    ?>
    </div>
  </div>
</section>

<section class="v3-profit">
  <div class="v3-profit__inner container">
    <div class="v3-profit__text-wrap">
      <h1 class="js-visibility reveal-fade"><?php echo $banner['header'] ?></h1>
      <p class="js-visibility reveal-fade  reveal-del-1"><?php echo $banner['tag_line'] ?></p>
      <a class="btn btn--dark_bg js-show-demo" href="#"><?php echo $banner['button_copy']; ?></a>

       <!-- <a id="typeform-shelf" class="typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" style="" target="_blank"> See Your Profit Growth</a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script> -->
      <!-- <button class="btn js-popup  js-visibility reveal-fade reveal-del-2"><?php echo $banner['button_copy'] ?></button> -->
    </div>
  </div>
  <div class="v3-profit__bg">


    <!-- <div class="features__dotted-v3-footer dotted-circle">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>  -->
    <img  src="<?php echo $banner['background_image']['sizes']['large'] ?>" alt="">

  </div>
  <div class="features_dotted-footer ">
    <svg viewBox="0 0 100 100">
      <circle cx="50" cy="50" r="49"></circle>
    </svg>
  </div>

</section>

<!-- 
<section class="popup-how-it-works">
    <div class="popup__inner">

      <button class="popup__close supplier__close"></button>
      <h2>Want to become a Shelf Engine supplier?</h2>
      <div class="form">
        <?php echo do_shortcode('[contact-form-7 id="452" title="Become A Supplier"]'); ?>
      </div>
    </div>
  </section> -->

  <!-- <a class="typeform-share button" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" style="display:inline-block;text-decoration:none;background-color:#3A7685;color:white;cursor:pointer;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:50px;text-align:center;margin:0;height:50px;padding:0px 33px;border-radius:25px;max-width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:bold;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;" target="_blank">Launch me </a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script> -->


<?php get_footer(); ?>
