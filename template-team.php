<?php
/*
 Template Name: Template Team
 */

$team_banner = get_field('team_banner');
$team_people = get_field('team_people');
$team_join_us = get_field('team_join_us');

get_header(); ?>

<div class="sh-team">
    <div class="sh-team__banner">
        <div class="sh-team__banner-decor sh-team__banner-decor_1"></div>
        <div class="sh-team__banner-decor sh-team__banner-decor_2"></div>
        <div class="sh-team__banner-decor sh-team__banner-decor_3"></div>

        <div class="container">
            <h1 class="sh-team__banner-title"><?php echo esc_html($team_banner['title']) ?></h1>
            <div class="sh-team__banner-subtitle"><?php echo esc_html($team_banner['subtitle']) ?></div>
        </div>

        <?php if (!empty($team_banner['images_line_top'])): ?>
            <div class="sh-team__banner-line-top">
                <div class="sh-team__banner-row">
                    <?php foreach ($team_banner['images_line_top'] as $image): ?>
                        <div class="sh-team__banner-col js-visibility reveal-fade">
                            <div class="sh-team__banner-img"
                                 style="background-image:url(<?php echo esc_url($image['sizes']['medium_large']) ?>)"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (!empty($team_banner['images_line_bottom'])): ?>
            <div class="sh-team__banner-line-bottom">
                <div class="sh-team__banner-row">
                    <?php foreach ($team_banner['images_line_bottom'] as $image): ?>
                        <div class="sh-team__banner-col js-visibility reveal-fade">
                            <div class="sh-team__banner-img"
                                 style="background-image:url(<?php echo esc_url($image['sizes']['medium_large']) ?>)"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="sh-team__leadership">
        <div class="sh-team__leadership-title"><?php esc_html_e('Leadership', 'sh'); ?></div>

        <?php if (!empty($team_people)): ?>
            <div class="sh-team__leadership-container">
                <div class="sh-team__leadership-row">
                    <?php foreach ($team_people as $team):
                        $image = get_field('employee_image', $team->ID);
                        ?>
                        <div class="sh-team__leadership-col">
                            <div class="sh-team__leadership-item js-visibility reveal-fade"
                                 data-remodal-target="<?php echo esc_attr('leadership-' . $team->ID) ?>">
                                <img src="<?php echo $image['sizes']['large'] ?>"
                                     alt="<?php echo esc_attr($team->post_title) ?>"
                                     class="sh-team__leadership-thumb">
                                <div class="sh-team__leadership-name"><?php echo $team->post_title ?></div>
                                <div
                                    class="sh-team__leadership-job-title"><?php the_field('employee_job_title', $team->ID); ?></div>
                            </div>

                            <div class="remodal sh-team-modal"
                                 data-remodal-id="<?php echo esc_attr('leadership-' . $team->ID) ?>"
                                 data-remodal-options="hashTracking: false">

                                <button data-remodal-action="close" class="sh-team-modal__close"></button>

                                <div class="sh-team-modal__bio">
                                    <div class="sh-team-modal__thumb">
                                        <img src="<?php echo $image['sizes']['large'] ?>"
                                             alt="<?php echo esc_attr($team->post_title) ?>">
                                        <div class="sh-team-modal__social">
                                            <?php
                                            $linkedin = get_field('employee_linkedin_url', $team->ID);
                                            $twitter = get_field('employee_twitter_url', $team->ID);
                                            if (!empty($linkedin)): ?>
                                                <a href="<?php echo esc_url($linkedin) ?>"
                                                   target="_blank"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.51562 16V5.48828H0.246094V16H3.51562ZM1.86328 4.08203C2.91797 4.08203 3.76172 3.20312 3.76172 2.14844C3.76172 1.12891 2.91797 0.285156 1.86328 0.285156C0.84375 0.285156 0 1.12891 0 2.14844C0 3.20312 0.84375 4.08203 1.86328 4.08203ZM15.7148 16H15.75V10.2344C15.75 7.42188 15.1172 5.24219 11.8125 5.24219C10.2305 5.24219 9.17578 6.12109 8.71875 6.92969H8.68359V5.48828H5.55469V16H8.82422V10.7969C8.82422 9.42578 9.07031 8.125 10.7578 8.125C12.4453 8.125 12.4805 9.67188 12.4805 10.9023V16H15.7148Z"/></svg></a>
                                            <?php endif;
                                            if (!empty($twitter)): ?>
                                                <a href="<?php echo esc_url($twitter) ?>"
                                                   target="_blank"><svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.1367 4.59375C16.8398 4.06641 17.4727 3.43359 17.9648 2.69531C17.332 2.97656 16.5938 3.1875 15.8555 3.25781C16.6289 2.80078 17.1914 2.09766 17.4727 1.21875C16.7695 1.64062 15.9609 1.95703 15.1523 2.13281C14.4492 1.39453 13.5 0.972656 12.4453 0.972656C10.4062 0.972656 8.75391 2.625 8.75391 4.66406C8.75391 4.94531 8.78906 5.22656 8.85938 5.50781C5.80078 5.33203 3.05859 3.85547 1.23047 1.64062C0.914062 2.16797 0.738281 2.80078 0.738281 3.50391C0.738281 4.76953 1.37109 5.89453 2.39062 6.5625C1.79297 6.52734 1.19531 6.38672 0.703125 6.10547V6.14062C0.703125 7.93359 1.96875 9.41016 3.65625 9.76172C3.375 9.83203 3.02344 9.90234 2.70703 9.90234C2.46094 9.90234 2.25 9.86719 2.00391 9.83203C2.46094 11.3086 3.83203 12.3633 5.44922 12.3984C4.18359 13.3828 2.60156 13.9805 0.878906 13.9805C0.5625 13.9805 0.28125 13.9453 0 13.9102C1.61719 14.9648 3.55078 15.5625 5.66016 15.5625C12.4453 15.5625 16.1367 9.97266 16.1367 5.08594C16.1367 4.91016 16.1367 4.76953 16.1367 4.59375Z"/></svg></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="sh-team-modal__content">
                                        <div class="sh-team-modal__name">
                                            <?php echo $team->post_title ?>
                                        </div>
                                        <div class="sh-team-modal__job-title">
                                            <?php the_field('employee_job_title', $team->ID) ?>
                                        </div>
                                        <div class="sh-team-modal__description">
                                            <?php the_field('employee_description', $team->ID); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <section class="sh-join">
        <div class="container">
            <div class="sh-about-page-row">
                <div class="sh-join-col">
                    <div class="sh-join__title"><?php echo esc_html($team_join_us['title']) ?></div>
                    <div class="sh-join__description"><?php echo wp_kses_post($team_join_us['description']) ?></div>
                    <?php
                    $target = (!empty($team_join_us['link']['target']) &&
                        $team_join_us['link']['target'] === '_blank') ? 'target="_blank"' : '';
                    echo '<a class="sh-about-page__principles-cta-btn" href="' . esc_url($team_join_us['link']['url']) . '" ' . $target . '>' . esc_html($team_join_us['link']['title']) . '</a>';
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
