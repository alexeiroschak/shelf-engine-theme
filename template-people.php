<?php /* Template Name: Template-People*/ ?>

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
 * @package shelf-engine
 */

$people = get_field('people');
$heroImage = get_field('hero_image');
$banner = get_field('banner');

get_header(); ?>

<!-- <div class="people-hero">
  <section class="people-hero__image">
    <img src="<?php echo $heroImage['sizes']['large'] ?>'" alt="">
    <div class="people-hero__overlay">
      <div class="people-hero__overlay-section"></div>
      <div class="people-hero__overlay-section"></div>
      <div class="people-hero__overlay-section"></div>
      <div class="people-hero__overlay-section"></div>
      <div class="people-hero__overlay-section"></div>
    </div>
  </section>
</div> -->

<section class="people-profile-details">
  <div class="people-profile-details__inner container">  
  <div class="people-profile-details__white-circle"></div>
    <div class="people-profile-details__text-wrap">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile-close.svg" alt="" class="people-profile-details__close-btn">
      <h4 class="people-profile-details__job-title ">Job Title</h4>
      <h1 class='people-profile-details__name '>Will McMinn</h1>
      <p class="people-profile-details__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
       <a class="people-profile-details__social-link" href="p"><img class="people-profile-details__social" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social-people.png" alt=""></a>
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

      <?php if( $people): ?>
        <?php foreach( $people as $post): // variable must be called $post (IMPORTANT) ?>
          <?php setup_postdata($post); ?>
            <?php $image = get_field('employee_image'); ?>

          <div class="people-meet-the-team__profile-container">
            <div class="people-meet-the-team__image-container" style="background-image:url('<?php echo $image['sizes']['large'] ?>'">
              <div class="people-meet-the-team__image-container-overlay"></div>
            </div> 
            <div class="people-meet-the-team__name-and-title">
              <p class="js-job-title"><?php the_field('employee_job_title'); ?></p>
              <p class="people-meet-the-team__name js-name"><?php the_field('employee_name'); ?></p> 
            </div>
            <div class="people-meet-the-team__hidden">
              <img src="<?php echo $image['sizes']['large'] ?>" alt="">              
              <p class="people-meet-the-team__description"><?php the_field('employee_description'); ?></p>
              <p class="people-meet-the-team__description"><?php the_field('employee_linkedin_url'); ?></p> 
            </div>          
                        
          </div>
            
            
          <?php endforeach; ?>
        <?php endif; ?>

    </div>
  </div>
</section>




<section class="join-shelf">
  <div class="join-shelf__inner container">
    <div class="join-shelf__text-wrap">
      <h1><?php echo $banner['banner_title']; ?></h1>
          <p><?php echo $banner['banner_copy']; ?></p>
      <a href="https://www.shelfengine.com/careers/"><button class="btn js-visibility reveal-fade"><?php echo $banner['banner_button_copy']; ?></button></a>
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