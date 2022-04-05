<?php /* Template Name: People V3*/ ?>


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

<div class="people-hero">
  <section class="people-hero__image">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/people-hero.png" alt="">
    <div class="people-hero__overlay">
      <div class="people-hero__overlay-section"></div>
      <div class="people-hero__overlay-section"></div>
      <div class="people-hero__overlay-section"></div>
      <div class="people-hero__overlay-section"></div>
      <div class="people-hero__overlay-section"></div>
    </div>
  </section>
</div>

<section class="people-profile-details">
  <div class="people-profile-details__inner container">  
  <div class="people-profile-details__white-circle"></div>
    <div class="people-profile-details__text-wrap">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-close.svg" alt="" class="people-profile-details__close-btn">
      <h4 class="people-profile-details__job-title ">Job Title</h4>
      <h1 class='people-profile-details__name '>Will McMinn</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
       <img class="people-profile-details__social" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social-people.png" alt="">
    </div>
    <div class="people-profile-details__image-wrap">
      <img class="people-profile-details__name" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-1.png" alt="">
      <div class="js-visibility reveal-fade is-visible">
        <div class="features__dotted-3 dotted-circle dotted-circle--reverse dotted-circle--people-profile">
          <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="people-meet-the-team">
  <div class="people-meet-the-team__inner container">
    <div class="people-meet-the-team__text-wrap">
      <h1 class="js-visibility reveal-fade js-visibility reveal-fade">Meet the Shelf Engine Team</h1>
      <p class="js-visibility reveal-fade reveal-del-1">See who’s transforming the food supply chain.</p>
    </div>
    <div class="people-meet-the-team__profiles-wrap">
      <div class="people-meet-the-team__profile-container">
        <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-1.png')">
          <div class="people-meet-the-team__image-container-overlay"></div>
        </div> 
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-1.png" alt="">               
        <p>Job Title 1</p>
        <p>Name 1</p>
      </div>
      <div class="people-meet-the-team__profile-container name-two">
        <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-2.png')">
          <div class="people-meet-the-team__image-container-overlay"></div>
        </div> 
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-2.png" alt="">               
        <p>Job Title 2</p>
        <p>Name 2</p>
      </div>
      <div class="people-meet-the-team__profile-container">
        <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-3.png')">
          <div class="people-meet-the-team__image-container-overlay"></div>
        </div> 
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-3.png" alt="">               
        <p>Job Title 3</p>
        <p>Name 3</p>
      </div>
      <div class="people-meet-the-team__profile-container">
        <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-4.png')">
          <div class="people-meet-the-team__image-container-overlay"></div>
        </div> 
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-4.png" alt="">               
        <p>Job Title 4</p>
        <p>Name 4</p>
      </div>
      <div class="people-meet-the-team__profile-container">
        <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-5.png')">
          <div class="people-meet-the-team__image-container-overlay"></div>
        </div> 
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-5.png" alt="">               
        <p>Job Title 5</p>
        <p>Name 5</p>
      </div>
      <div class="people-meet-the-team__profile-container">
        <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-6.png')">
          <div class="people-meet-the-team__image-container-overlay"></div>
        </div> 
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-6.png" alt="">               
        <p>Job Title 6</p>
        <p>Name 6</p>
      </div>
      <div class="people-meet-the-team__profile-container">
        <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-7.png')">
          <div class="people-meet-the-team__image-container-overlay"></div>
        </div> 
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-7.png" alt="">               
        <p>Job Title 7</p>
        <p>Name 7</p>
      </div>
      <div class="people-meet-the-team__profile-container">
        <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-8.png')">
          <div class="people-meet-the-team__image-container-overlay"></div>
        </div> 
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-8.png" alt="">               
        <p>Job Title 8</p>
        <p>Name 8</p>
      </div>
      <div class="people-meet-the-team__profile-container">
        <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-9.png')">
          <div class="people-meet-the-team__image-container-overlay"></div>
        </div> 
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-9.png" alt="">               
        <p>Job Title 9</p>
        <p>Name 9</p>
      </div>
    </div>
  </div>
</section>




<section class="join-shelf">
  <div class="join-shelf__inner container">
    <div class="join-shelf__text-wrap">
      <h1>Join Shelf</h1>
      <p>We’re looking for talented, industry game-changers to help us build a fitter food supply chain and healthier businesses.</p>
      <button class="btn js-visibility reveal-fade">See Jobs</button>
    </div>
    <!--<div class="join-shelf__bg-wrap">
      <img class="js-visibility reveal-fade reveal-del-1" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/people-hire.png" alt="">
    </div>-->
  </div>



</section>

<?php get_footer(); ?>