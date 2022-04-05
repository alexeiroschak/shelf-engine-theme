<?php /* Template Name: How It Works V2*/ ?>


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
<section class="v3-hero" id="how-it-works">
  <div class="v3-hero__inner container">
    <div class="v3-hero__text-wrap">
      <h1>You don’t need another</h1>
      <div class="v3-hero__auto-type">
        <span class="typing v3-hero__typing"></span>
      </div>
      <p>We’re not an expensive bolt on software system that promises better orders. Shelf Engine intelligent forecasting uses machine learning and probabilistic models to generate the most accurate orders for your stores. So accurate, we guarantee your sales.
      </p>
      <button class="btn js-popup js-visibility reveal-fade">See Your Profit Growth</button>
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
      <h2 class="js-visibility reveal-fade">Here’s how it works...</h2>
      <p class="v3-how-it-works__guaranteed js-visibility reveal-fade reveal-del-1"><img class="js-visibility reveal-fade" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/how-it-works.png" alt=""> Guaranteed Sales</p>
      <p class="js-visibility reveal-fade  reveal-del-2">Call us what you want... Shelf Engine is set-up as a {scan based trade vendor} vendor at your store. This means we don’t charge you for what doesn’t sell—and you only pay for the items that do. </p>
    </div>
    <div class="v3-how-it-works__speech-bubbles-wrap">
      <img class="how-it-works-1 how-it-works-bubble" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/how-it-works-1-svg.svg" alt="">
      <img class="how-it-works-2 how-it-works-bubble" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/how-it-works-2-svg.svg" alt="">
      <img class="how-it-works-3 how-it-works-bubble" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/how-it-works-3-svg.svg" alt="">
      <img class="how-it-works-4 how-it-works-bubble" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/how-it-works-4-svg.svg" alt="">
      <img class="how-it-works-5 how-it-works-bubble" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/how-it-works-5-svg.svg" alt="">
      <img class="how-it-works-6 how-it-works-bubble" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/how-it-works-6-svg.svg" alt="">
      <img class="how-it-works-7 how-it-works-bubble" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/how-it-works-7-svg.svg" alt="">
    </div>
  </div>
</section>

<section class="v3-pricing">
  <div class="v3-pricing__inner container">
    <div class="v3-pricing__text-wrap">
      <p class="v3-how-it-works__guaranteed js-visibility reveal-fade"><img class="js-visibility reveal-fade" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing.png" alt="">Pricing</p>
      <p class="js-visibility reveal-fade  reveal-del-1">Shelf Engine applies a markup to each SKUs. Good news: This markup is less than your shrink, which means you start saving on day one.</p>
      <p class="js-visibility reveal-fade  reveal-del-2">How is it generated? The markup is based on: shelf life, gross margin, and other aspects related to the category and the SKU.</p>
    </div>
    <div class="v3-pricing__table-wrap">
      <p>Example Pricing</p>
      <table class="">
        <tr>
          <th></th>
          <th>Supplier's Price</th>
          <th>Shelf Engine's Price</th>
        </tr>
        <tr class="js-pricing-row">
          <td >Cut Pineapples</td>
          <td>$3.69</td>
          <td>$4.66</td>
        </tr>
        <tr class="js-pricing-row">
          <td>Chicken Sandwich</td>
          <td>$4.25</td>
          <td>$4.71</td>
        </tr>
        <tr class="js-pricing-row">
          <td>Baguette</td>
          <td>$1.25</td>
          <td>$1.52</td>
        </tr>
        <tr class="js-pricing-row">
          <td>Yogurt</td>
          <td>$1.83</td>
          <td>$1.92</td>
        </tr>
      </table>
      <img class="js-visibility js-pricing-sticker" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/img/how-it-works sticker-svg.svg" alt="">
    </div>
  </div>
  <div class="v3-pricing__images">
    <picture>
      <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-1.png" media="(min-width: 760px)">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-1-small.png" alt="Some picture">
    </picture>
    <picture>
      <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-2.png" media="(min-width: 760px)">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-2.png" alt="Some picture">
    </picture>
    <picture>
      <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-3.png" media="(min-width: 760px)">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pricing-bg-3.png" alt="Some picture">
    </picture>
  </div>
</section>

<section class="v3-forecasting">
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
  <div class="v3-forecasting__inner container">
    <div class="v3-forecasting__text-wrap">
      <p class="v3-how-it-works__guaranteed js-visibility reveal-fade"><img class="js-visibility reveal-fade" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/forecating.png" alt=""> Forecasting</p>
      <p class="js-visibility reveal-fade  reveal-del-1">Based on data ingested from your store daily and external data sets, Shelf Engine generates new probabilistic models for each unique SKU—for every store, every day. These models are translated into profit maximization models to create the perfect order.</p>
      <p class="js-visibility reveal-fade  reveal-del-2">The probabilistic models are fed by vector autoregressive multivariate time series models that use a massive array of data sets, along with machine learning based dependent models to catch every possible swing in the wild world of retail.</p>
    </div>
    <div class="v3-forecasting__graph-wrap">
    <object data="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg-graph" type="image/svg+xml">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/forecast-graph-svg.svg" />
    </object>
    </div>
  </div>
</section>

<section class="v3-vendors">
  <div class="v3-vendors__inner container">
    <div class="v3-vendors__text-wrap">
      <p class="v3-how-it-works__guaranteed js-visibility reveal-fade"><img class="js-visibility reveal-fade" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors.png" alt="">Vendors</p>
      <p class="js-visibility reveal-fade  reveal-del-1">Shelf Engine is already set-up with hundreds of vendors and distributors. We can also work with any of your current suppliers. Whether it’s DSD or self-distributed—we’ve got you covered.</p>
      <p class="js-visibility reveal-fade  reveal-del-2">Suppliers, click here to get set up with Shelf Engine.</p>
    </div>
    <div class="v3-vendors__logo-wrap">
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-1-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-2-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-3-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-4-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-5-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-6-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-7-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-8-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-9-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-1-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-7-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-8-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-9-svg.svg" alt="">
      </div>
      <div class="v3-vendors__logo-logo">
       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/vendors-1-svg.svg" alt="">
      </div>

    </div>
  </div>
</section>

<section class="v3-reporting">
  <div class="v3-reporting__circle-white"></div>
  <div class="v3-reporting__inner container">
    <div class="v3-reporting__text-wrap">
      <p class="v3-how-it-works__guaranteed js-visibility reveal-fade"><img class="js-visibility reveal-fade" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/reporting.png" alt=""> Reporting</p>
      <p class="js-visibility reveal-fade  reveal-del-1">Make more money and see it every week. Shelf Engine’s weekly reporting will show you exactly how much more gross profit you generated, in an easy-to-read format. No confusing dashboards or convoluted spreadsheets. Just savings where you can see it. </p>
    </div>
  </div>
  <div class="v3-reporting__image-wrap">
     <img id="js-reporting-tablet"src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/reporting-tablet.png" alt="">
  </div>
</section>

<section class="v3-profit">
  <div class="v3-profit__inner container">
    <div class="v3-profit__text-wrap">
      <h1 class="js-visibility reveal-fade">How much can Shelf Engine increase your profits?</h1>
      <p class="js-visibility reveal-fade  reveal-del-1">Get your data analyzed for free.</p>
      <!-- <button class="btn js-visibility reveal-fade reveal-del-2">See Your Profit Growth</button> -->
      <a class="btn js-show-demo  js-visibility reveal-fade reveal-del-2" href="#">See Your Profit Growth</a>

    </div>
  </div>
  <div class="v3-profit__bg">


    <!-- <div class="features__dotted-v3-footer dotted-circle">
      <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
    </div>  -->
    <img  src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profit-bg.png" alt="">

  </div>
  <div class="features_dotted-footer ">
    <svg viewBox="0 0 100 100">
      <circle cx="50" cy="50" r="49"></circle>
    </svg>
  </div>

</section>


<?php get_footer(); ?>
