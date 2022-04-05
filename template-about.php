<?php /* Template Name: About Template*/ ?>


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
$principles = get_field('principles');
$principlesList = get_field('principles_list');
$timelineCopy = get_field('timeline_copy');

get_header(); ?>


<section class="about-hero">
  <div class="about-hero__inner container">
    <div class="about-hero__text-wrap">
      <h4 class="js-visibility reveal-fade"><?php echo $hero['title'] ?></h4>
      <h1 class="js-visibility reveal-fade reveal-del-1"><?php echo $hero['tag_line'] ?></h1>
      <p class="js-visibility reveal-fade reveal-del-2"><?php echo $hero['copy'] ?></p>
    </div>
    <div class="about-hero__image-wrap">
      <img src="<?php echo $hero['image']['sizes']['large'] ?>" alt="">
    </div>
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

<section class="about-principles">
  <div class="about-principles__inner container">
    <div class="about-principles__text-wrap">
      <h4 class="js-visibility reveal-fade "><?php echo $principles['header'] ?></h4>
      <h1 class="js-visibility reveal-fade reveal-del-1"><?php echo $principles['tag_line'] ?></h1>
      <p class="js-visibility reveal-fade reveal-del-2"><?php echo $principles['copy'] ?></p>
    </div>
    <div class="about-principles__leaf-wrap">
    <?php get_template_part( 'templates/components/_logo-svg-leaf' ); ?>
    </div>
  </div>
  <div class="about-principles-list__inner container">
      <h1><?php echo $principlesList['header'] ?></h1>
      <div class="about-principles-list__container">
      <?php
        while ( have_rows( 'principles_list' ) ) : the_row();   
          while ( have_rows( 'list' ) ) : the_row();          
            $image = get_sub_field('icon');  
            $header = get_sub_field('header');
            $copy = get_sub_field('copy');
            ?>  
            <div class="about-principles-list__item">
              <img src="<?php echo $image['sizes']['large'] ?>" alt="">
              <h4><?php echo $header ?></h4>
              <p> <?php echo $copy ?></p>
            </div>  
            <?php
          endwhile;
        endwhile;
      ?>  
      </div>
    </div>
  </div>
</section>



<section class="about-story">
  <div class="about-story__inner container">
    <div class="about-story__copy-wrap">
      <h4 class="js-visibility reveal-fade"><?php echo $timelineCopy['header'] ?></h4>
      <h1 class="js-visibility reveal-fade  "><?php echo $timelineCopy['tag_line'] ?></h1>
      <p class="js-visibility reveal-fade  reveal-del-1"><?php echo $timelineCopy['paragraph_one'] ?></p>       
      <p class="js-visibility reveal-fade reveal-del-2"><?php echo $timelineCopy['paragraph_two'] ?></p>       
      <p class="js-visibility reveal-fade reveal-del-3"><?php echo $timelineCopy['paragraph_three'] ?></p>       
      <p class="js-visibility reveal-fade reveal-del-4"><?php echo $timelineCopy['paragraph_four'] ?></p> 
    </div>
    <div class="about-story__timeline-wrap">
      <ul class="about-story__timeline-list">

      <?php
        while ( have_rows( 'timeline_animation' ) ) : the_row();   
            $date = get_sub_field('date');
            $event = get_sub_field('event');
            ?>            
            <li class="about-story__timeline-item">
              <div class="about-story__timeline-icon">
                <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
              </div>
              <h3><?php echo $date ?></h3>
              <p><?php echo $event ?></p>
            </li>
            <?php
        endwhile;
      ?> 
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon about-story__timeline-icon-last">
          </div>
        </li>
      </ul>
    </div> 
    <div class="about-story__image-wrap">
        <div class="about-story__white-circle"></div>
          <img src="<?php echo $timelineCopy['image']['sizes']['large'] ?>" alt="">
      </div> 
  </div>
</section>


<?php
$img = get_field('pre_footer_image', 'options');
$img_med = $img['sizes']['medium'];
$srcset = wp_get_attachment_image_srcset( $img['ID'], 'medium' );
if(!$srcset) $srcset = $img_med;
?>
<!--<section class="banner">
  <div class="banner__inner container">
    <div class="banner__copy-wrap js-visibility reveal-fade">
      <h2><?php the_field('pre_footer_title', 'options') ?></h2>
      <?php the_field('pre_footer_copy', 'options') ?>
      <a id="typeform-shelf" class="typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" style="" target="_blank"> See Your Profit Growth</a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>
       <button class="btn js-popup"><?php the_field('pre_footer_btn', 'options') ?></button>
    </div>
    <div class="banner__img-wrap js-visibility reveal-fade reveal-del-1">
      <img src="<?php echo $img_med ?>" srcset="<?php echo $srcset; ?>" sizes="(max-width: 767px) 450px," alt="<?php echo $img['alt'] ?>" loading="lazy">
      <div class="dotted-circle">
        <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
      </div>
    </div>
  </div>

</section>-->
<section class="join-shelf">
  <div class="join-shelf__inner container">
    <div class="join-shelf__text-wrap">
      <h1>Join Shelf</h1>
          <p>We’re looking for talented, industry game-changers to help us build a fitter food supply chain and healthier businesses.</p>
      <a href="https://www.shelfengine.com/careers/"><button class="btn js-visibility reveal-fade">See Open Jobs</button></a>
    </div>
    <div class="join-shelf__bg-wrap">
    <picture>
      <source srcset="https://www.shelfengine.com/wp-content/uploads/2021/04/sgt-peppers.jpg" media="(min-width: 760px)">
      <img class="js-visibility reveal-fade reveal-del-1" src="https://www.shelfengine.com/wp-content/uploads/2021/04/sgt-peppers.jpg" alt="">
    </picture>
      
    </div>
  </div>
</section>




<?php get_footer(); ?>
