<?php /* Template Name: About*/ ?>


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

get_header(); ?>


<section class="about-hero">
  <div class="about-hero__inner container">
    <div class="about-hero__text-wrap">
      <h4 class="js-visibility reveal-fade">Our Mission</h4>
      <h1 class="js-visibility reveal-fade reveal-del-1">Reduce food waste through automation</h1>
      <p class="js-visibility reveal-fade reveal-del-2">Shelf Engine is transforming how grocery stores buy highly perishables. Everyday, we help our customers significantly increase profits and drastically reduce food waste in thousands of retail stores around the country.</p>
    </div>
    <div class="about-hero__image-wrap">
      <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/about-hero.png" alt="">
    </div>
  </div>
</section>

<section class="about-principles">
  <div class="about-principles__inner container">
    <div class="about-principles__text-wrap">
      <h4 class="js-visibility reveal-fade ">Our Principles </h4>
      <h1 class="js-visibility reveal-fade reveal-del-1">We believe the ‘how’ matters as much as the ‘what’ we do</h1>
      <p class="js-visibility reveal-fade reveal-del-2">Shelf Engine is growing fast—and so is every member of our team. We are boldly driving our mission forward thanks to our engaged, high-performing, creative team who is committed to these shared principles.</p>
    </div>
    <div class="about-principles__leaf-wrap">
    <?php get_template_part( 'templates/components/_logo-svg-leaf' ); ?>
    </div>
  </div>
  <div class="about-principles-list__inner container">
      <h1>Shelf Engine Principles</h1>
      <div class="about-principles-list__container">
          <div class="about-principles-list__item">
            <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/principles-1.png" alt="">
            <h4>Make the first move</h4>
            <p>We're all leaders. Don't wait for someone else to do it, be bold and take the initiative to get things started.</p>
          </div>
          <div class="about-principles-list__item">
            <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/principles-2.png" alt="">
            <h4>Make better decisions</h4>
            <p>Repeated good decisions have a virtuous compounding effect. Treat decision making with care.</p>
          </div>
          <div class="about-principles-list__item">
            <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/principles-3.png" alt="">
            <h4>Be furiously curious</h4>
            <p>Investigate how and why things work the way they do.</p>
          </div>
          <div class="about-principles-list__item">
            <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/principles-4.png" alt="">
            <h4>Commit and deliver</h4>
            <p>Deliver the best results, fast.</p>
          </div>
          <div class="about-principles-list__item">
            <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/principles-5.png" alt="">
            <h4>Have empathy</h4>
            <p>Seek to understand your teammates and our customer. Reflect what you see, support one another, collaborate, and camaraderie will ensue.</p>
          </div>
          <div class="about-principles-list__item">
            <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/principles-6.png" alt="">
            <h4>Invent Solutions</h4>
            <p>The answer won’t always be obvious. The question isn’t can it work, but how.</p>
          </div>
          <div class="about-principles-list__item">
            <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/principles-7.png" alt="">
            <h4>Be authentic</h4>
            <p>Bring your authentic self to your work and all your interactions. Even when things are tough, be respectful.</p>
          </div>
      </div>
    </div>
  </div>
</section>

<section class="about-story">
  <div class="about-story__inner container">
    <div class="about-story__copy-wrap">
      <h4 class="js-visibility reveal-fade">Our Story</h4>
      <h1 class="js-visibility reveal-fade  ">How it all started</h1>
      <p class="js-visibility reveal-fade  reveal-del-1">There’s got to be a better way... Stefan had discovered the problem of food waste first hand while running Molly's, a grab & go food company he started in 2009. By 2014, Stefan had grown the company to over 400 regional retail locations. But ordering accurately proved to be challenging, as growing Molly’s food waste was at 28% and was eating into their bottom line.</p>       
      <p class="js-visibility reveal-fade reveal-del-2">Hungry for a better solution, Stefan talked to his friend (and co-founder) Bede Jordan about the problem. At the time, Bede was working at Microsoft as the HoloLens Principle Software Engineering Lead. With Stefan’s actuarial science background and Bede’s engineering brilliance, they were able to build a model and app to considerably improve perishable food forecasting.</p>       
      <p class="js-visibility reveal-fade reveal-del-3">The result? Cutting Molly’s food waste in half, down to 13%. In 2016, Stefan and Bede quit their day jobs to launch Shelf Engine—with the mission of transforming the food supply chain by helping grocery stores reduce waste and increase sales through intelligent forecasting. They were fortunate to have funding since day one, thanks to Initialized, Liquid2, and the Founders Co-op.</p>       
      <p class="js-visibility reveal-fade reveal-del-4">Today, Shelf Engine is managing orders for the best grocers in thousands of stores nationwide. Drastically increasing their customer’s profits by eliminating shrink and out-of-stocks.</p> 
    </div>
    <div class="about-story__timeline-wrap">
      <ul class="about-story__timeline-list">
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
           <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>January, 2014</h3>
         <p>Stefan and Bede came up with the idea of Shelf Engine</p>
         
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>October, 2016</h3>
          <p>Shelf Engine is incorporated</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>October, 2016</h3>
          <p>Raised $800k pre-seed round</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>October, 2016</h3>
          <p>Moved into first office… in a basement</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>February, 2017</h3>
          <p><a href="<?php  echo esc_url( get_site_url() ); ?>/team/#brian">First employee</a>  hired (he’s still here!)</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>March, 2017</h3>
          <p>First customer, Metier Cafe </p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>June, 2018</h3>
          <p>Joined YC S18 cohort</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>August, 2018</h3>
          <p>Raised $4.3mil seed round</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>October, 2018</h3>
          <p>First national client, Whole Foods</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>December, 2018</h3>
          <p>Team is 8 employees</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>February, 2020</h3>
          <p>Raised $12mill Series A </p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>February, 2020</h3>
          <p>Shelf field team launched</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>May, 2020</h3>
          <p>Moved to <a href="https://olsonkundig.com/projects/digital-kitchen-headquarters/">Olson Kundig designed office</a> in the Pacific Building</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon">
            <img class="about-story__timeline-dotted-line" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/story-dots.svg" alt="">
          </div>
          <h3>November, 2020</h3>
          <p>Team hits 100 employees</p>
        </li>
        <li class="about-story__timeline-item">
          <div class="about-story__timeline-icon about-story__timeline-icon-last">
          </div>
        </li>
      </ul>
    </div> 
    <div class="about-story__image-wrap">
        <div class="about-story__white-circle"></div>
          <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/about-founders.png" alt="">
      </div> 
  </div>
</section>


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
      <button class="btn js-popup"><?php the_field('pre_footer_btn', 'options') ?></button>
    </div>
    <div class="banner__img-wrap js-visibility reveal-fade reveal-del-1">
      <img src="<?php echo $img_med ?>" srcset="<?php echo $srcset; ?>" sizes="(max-width: 767px) 450px," alt="<?php echo $img['alt'] ?>" loading="lazy">
      <div class="dotted-circle">
        <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
      </div>
    </div>
  </div>
</section>



<?php get_footer(); ?>
